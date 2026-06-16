<?php

namespace App\Filament\Resources\News\Schemas;

use App\Exceptions\TranslationException;
use App\Services\ProductFormTranslationService;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Field;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\FusedGroup;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\HtmlString;
use Outerweb\FilamentTranslatableFields\Filament\Plugins\FilamentTranslatableFieldsPlugin;
use Throwable;

class NewsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3)
                    ->schema([
                        // --- 左侧：内容区域 (占 2 列) ---
                        Section::make('新闻内容')
                            ->description('多语言内容可手动填写；点击“翻译”统一补全所有新闻字段。')
                            ->headerActions([
                                static::makeTranslateAllAction(),
                            ])
                            ->columnSpan(2)
                            ->schema([
                                static::makeTranslatableField(
                                    TextInput::make('title')
                                        ->label('标题')
                                        ->validationAttribute('标题（简体中文）')
                                        ->helperText('可按语言手动填写；也可点击上方“翻译”补全其他语言')
                                        ->maxLength(255),
                                    localeSpecificRules: [
                                        'zh' => 'required',
                                    ],
                                    markRequiredLocale: 'zh',
                                ),

                                static::makeTranslatableField(
                                    TextInput::make('slug')
                                        ->label('美化URL')
                                        ->helperText('可按语言手动填写；留空时系统会根据对应语言的标题自动生成，也可点击上方“翻译”立即生成')
                                        ->maxLength(255),
                                ),

                                static::makeTranslatableField(
                                    Textarea::make('excerpt')
                                        ->label('简介')
                                        ->helperText('可按语言手动填写；也可点击上方“翻译”补全其他语言')
                                        ->rows(5),
                                ),

                                static::makeTranslatableField(
                                    RichEditor::make('content')
                                        ->label('内容')
                                        ->helperText('可按语言手动填写；也可点击上方“翻译”补全其他语言')
                                        ->columnSpanFull()
                                        ->fileAttachmentsDisk('public')
                                        ->fileAttachmentsDirectory('news'),
                                )
                                    ->columnSpanFull(),
                            ]),

                        // --- 右侧：发布设置 (占 1 列) ---
                        Section::make('设置')
                            ->columnSpan(1)
                            ->schema([
                                Select::make('category_id')
                                    ->label('分类')
                                    ->validationAttribute('分类')
                                    ->relationship('category', 'name')
                                    ->required()
                                    ->searchable()
                                    ->preload()
                                    // 核心：处理分类名称是多语言 JSON 的情况
                                    // 假设 Category Model 使用了 HasTranslations Trait，这里会自动显示当前语言名称
                                    ->getOptionLabelFromRecordUsing(
                                        fn ($record) => $record->parent
                                            ? "{$record->parent->name} > {$record->name}" // 显示父子层级
                                            : $record->name
                                    ),

                                Radio::make('is_featured')
                                    ->label('是否精选')
                                    ->helperText('新闻首页顶部显示最新精选')
                                    ->options([
                                        '1' => '是',
                                        '0' => '否',
                                    ])
                                    ->default('0')
                                    ->inline(),

                                FileUpload::make('cover_image')
                                    ->label('封面图')
                                    ->helperText('建议上传2M以内图片')
                                    ->disk('public')
                                    ->directory('products')
                                    ->image()
                                    ->imageEditor()
                                    ->maxSize(1024 * 2) // 2MB
                                    ->acceptedFileTypes(['image/*']),

                                DateTimePicker::make('published_at')
                                    ->label('发布时间')
                                    ->helperText('留空则保存为草稿')
                                    ->native(false) // 使用漂亮的 JS日期选择器
                                    ->seconds(false) // 通常新闻不需要精确到秒
                                    ->default(now()),

                                TextInput::make('author')
                                    ->label('作者')
                                    ->default(fn () => Filament::auth()->user()?->name),

                                TextInput::make('sort_order')
                                    ->label('排序')
                                    ->numeric()
                                    ->default(0)
                                    ->helperText('数值越小，排序越靠前。'),

                                static::makeTranslatableField(
                                    TagsInput::make('tags')
                                        ->label('标签')
                                        ->helperText('可按语言手动填写；也可点击“新闻内容”中的“翻译”补全其他语言'),
                                ),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    protected static function makeTranslatableField(
        Field $field,
        ?array $localeSpecificRules = null,
        ?string $markRequiredLocale = null,
    ): FusedGroup {
        return FusedGroup::make([
            $field
                ->hiddenLabel()
                ->translatable(
                    true,
                    static::getTranslatableLocaleLabels($markRequiredLocale),
                    $localeSpecificRules,
                ),
        ])
            ->label($field->getLabel());
    }

    protected static function getTranslatableLocaleLabels(?string $markRequiredLocale = null): array
    {
        $labels = FilamentTranslatableFieldsPlugin::get()->getSupportedLocales();

        if ($markRequiredLocale === null || ! array_key_exists($markRequiredLocale, $labels)) {
            return $labels;
        }

        $labels[$markRequiredLocale] = static::makeRequiredLabel((string) $labels[$markRequiredLocale]);

        return $labels;
    }

    protected static function makeRequiredLabel(string $label): HtmlString
    {
        return new HtmlString(sprintf(
            '%s<sup class="fi-fo-field-label-required-mark" style="color: red;">*</sup>',
            e($label),
        ));
    }

    protected static function makeTranslateAllAction(): Action
    {
        return Action::make('translate_news_fields')
            ->label('翻译')
            ->icon('heroicon-o-language')
            ->color('success')
            ->action(function (Get $get, Set $set, ProductFormTranslationService $translationService): void {
                try {
                    $updatedCount = 0;
                    $fields = ['title', 'slug', 'excerpt', 'content', 'tags'];

                    foreach ($fields as $field) {
                        $result = $translationService->translateField(
                            field: $field,
                            translations: $get($field),
                            slugTranslations: $get('slug'),
                            sourceTranslations: $get('title'),
                        );

                        $set($field, $result['value']);
                        $updatedCount += $result['updated_count'];

                        foreach ($result['extra'] as $extraField => $extraValue) {
                            $set($extraField, $extraValue);
                        }
                    }

                    if ($updatedCount === 0) {
                        Notification::make()
                            ->title('没有可补全的翻译内容')
                            ->warning()
                            ->send();

                        return;
                    }

                    Notification::make()
                        ->title('翻译已回填')
                        ->body("本次更新 {$updatedCount} 项内容")
                        ->success()
                        ->send();
                } catch (TranslationException $exception) {
                    Notification::make()
                        ->title('翻译失败')
                        ->body($exception->getMessage())
                        ->danger()
                        ->send();
                } catch (Throwable $exception) {
                    Log::error('News bulk translation failed.', [
                        'fields' => ['title', 'slug', 'excerpt', 'content', 'tags'],
                        'exception' => $exception,
                    ]);

                    Notification::make()
                        ->title('翻译失败')
                        ->body('翻译服务暂时不可用，请稍后重试。')
                        ->danger()
                        ->send();
                }
            });
    }
}
