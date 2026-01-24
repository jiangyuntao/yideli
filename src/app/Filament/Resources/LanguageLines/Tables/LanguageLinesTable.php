<?php

namespace App\Filament\Resources\LanguageLines\Tables;

use App\Services\YoudaoTranslate;
use Filament\Actions\Action;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
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
                    BulkAction::make('batch_translate')
                        ->label('批量 AI 翻译')
                        ->icon('heroicon-o-sparkles')
                        ->color('success')
                        ->action(function ($records, YoudaoTranslate $translator) {
                            foreach ($records as $record) {
                                static::processTranslation($record, $translator);
                            }
                            Notification::make()->title('批量翻译完成')->success()->send();
                        }),
                ]),
            ]);
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
                    usleep(100000);
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
