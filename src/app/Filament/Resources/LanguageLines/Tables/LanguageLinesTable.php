<?php

namespace App\Filament\Resources\LanguageLines\Tables;

use App\Services\YoudaoTranslate;
use Filament\Actions\Action;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;
use Filament\Support\Enums\Width;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;
use League\Csv\Reader;
use Spatie\TranslationLoader\LanguageLine;

class LanguageLinesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('group')->searchable()->label('分组'),
                TextColumn::make('key')->searchable()->label('键名'),
                TextColumn::make('text.zh')->label('中文原文')->limit(30),
                TextColumn::make('text.en')->label('英文预览')->limit(30),
            ])
            ->filters([
                SelectFilter::make('group')->options(
                    fn() => LanguageLine::query()->pluck('group', 'group')->toArray()
                ),
            ])
            ->recordActions([
                EditAction::make(),
                Action::make('translate')
                    ->label('AI 补全翻译')
                    ->icon('heroicon-o-sparkles')
                    ->color('success')
                    ->action(function (LanguageLine $record, YoudaoTranslate $translator) {
                        static::processTranslation($record, $translator);
                        Notification::make()->title('翻译完成')->success()->send();
                    }),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    // 找到原有批量翻译的BulkAction
                    BulkAction::make('batch_translate')
                        ->label('批量 AI 翻译')
                        ->icon('heroicon-o-sparkles')
                        ->color('success')
                        // 替换原来的action闭包为以下代码
                        ->action(function ($records) {
                            // 分发异步Job，将翻译记录集合传给Job
                            \App\Jobs\BatchTranslateLanguageLines::dispatch($records);

                            // 立即给用户发送「任务启动」的提示，无需等待执行完成
                            Notification::make()
                                ->title('批量翻译任务已启动')
                                ->info()
                                ->body('翻译任务已加入异步队列，完成后将自动发送通知，你可继续操作其他功能')
                                ->send();
                        }),
                ]),
            ])
            ->headerActions([
                Action::make('batch_import')
                    ->label('批量导入翻译')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->color('primary')
                    ->modalHeading('批量导入翻译')
                    ->modalWidth(Width::ThreeExtraLarge)
                    ->modalContent(fn() => view('filament.resources.language-lines.batch-import-modal'))
                    ->modalSubmitActionLabel('开始导入')
                    ->form([
                        FileUpload::make('csv_file')
                            ->label('CSV 文件')
                            ->helperText('请选择包含翻译数据的 CSV 文件。第一行为表头，应包含: group, key, zh')
                            ->acceptedFileTypes(['text/csv', 'text/plain', 'application/vnd.ms-excel'])
                            ->maxSize(10240) // 10MB
                            ->required()
                            ->disk('local')
                            ->directory('temp-translations')
                            ->visibility('private'),
                    ])
                    ->action(function (array $data) {
                        $file = $data['csv_file'];
                        $results = static::importTranslationsFromCsv($file);

                        if ($results['success_count'] > 0) {
                            Notification::make()
                                ->title("成功导入 {$results['success_count']} 条翻译")
                                ->body($results['error_count'] > 0
                                    ? "其中 {$results['error_count']} 条记录存在错误"
                                    : '')
                                ->success()
                                ->send();
                        }

                        if ($results['error_count'] > 0) {
                            Notification::make()
                                ->title("导入过程中遇到 {$results['error_count']} 个错误")
                                ->danger()
                                ->send();
                        }

                        // 清理临时文件
                        Storage::delete($file);
                    }),
            ]);
    }

    public static function importTranslationsFromCsv(string $filePath): array
    {
        $reader = Reader::createFromPath(storage_path('app/private/' . $filePath), 'r');
        $reader->setHeaderOffset(0); // 第一行作为表头

        $headers = [
            'group',
            'key',
            'zh'
        ];

        $records = $reader->getRecords();

        $successCount = 0;
        $errorCount = 0;
        $errors = [];

        foreach ($records as $index => $record) {
            try {
                // 验证必需字段
                if (empty($record['group']) || empty($record['key']) || empty($record['zh'])) {
                    $errors[] = "第 " . ($index + 2) . " 行缺少必要字段(group、key 或 zh)";
                    $errorCount++;
                    continue;
                }

                // 准备语言数据，只包含中文
                $textData = [
                    'zh' => trim($record['zh'])
                ];

                // 查找或创建 LanguageLine 记录
                $languageLine = LanguageLine::firstOrCreate(
                    [
                        'group' => $record['group'],
                        'key' => $record['key'],
                    ],
                    [
                        'text' => $textData,
                    ]
                );

                // 如果是更新现有记录，则只更新中文翻译
                if (!$languageLine->wasRecentlyCreated) {
                    $existingText = $languageLine->text ?? [];
                    $existingText['zh'] = trim($record['zh']);
                    $languageLine->update(['text' => $existingText]);
                } else {
                    $languageLine->fill(['text' => $textData])->save();
                }

                $languageLine->flushGroupCache(); // 刷新缓存
                $successCount++;
            } catch (\Exception $e) {
                $errors[] = "第 " . ($index + 2) . " 行导入失败: " . $e->getMessage();
                $errorCount++;
            }
        }

        return [
            'success_count' => $successCount,
            'error_count' => $errorCount,
            'errors' => $errors,
        ];
    }

    public static function processTranslation(LanguageLine $record, YoudaoTranslate $translator)
    {
        // 1. 获取现有数据
        $text = $record->text;

        // 2. 确保有中文源
        if (empty($text['zh'])) {
            return;
        }
        $sourceText = $text['zh'];

        // 3. 定义需要的目标语言 (除中文外)
        $targets = ['en', 'fr', 'es', 'ru', 'ar'];

        $updated = false;
        foreach ($targets as $locale) {
            // 如果该语言为空，或者为了强制更新（视需求而定，这里假设只补全空的）
            if (empty($text[$locale])) {
                $translated = $translator->translate($sourceText, 'zh-CHS', $locale);
                if ($translated) {
                    $text[$locale] = $translated;
                    $updated = true;
                    // 稍微停顿防 API 限制
                    sleep(1);
                }
            }
        }

        // 4. 保存并刷新缓存
        if ($updated) {
            $record->text = $text;
            $record->save();
            // Spatie Translation Loader 会缓存翻译，必须刷新
            $record->flushGroupCache();
        }
    }
}
