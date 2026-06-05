<?php

namespace App\Filament\Resources\News\Schemas;

use App\Services\ProductFormTranslationService;
use Filament\Actions\Action;
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
                            ->description('多语言内容可手动填写；每个字段都可单独点击“翻译”补全其他语言。')
                            ->columnSpan(2)
                            ->schema([
                                static::makeTranslatableField(
                                    TextInput::make('title')
                                        ->label('标题')
                                        ->helperText('可按语言手动填写；也可点击“翻译”补全其他语言')
                                        ->maxLength(255),
                                    localeSpecificRules: [
                                        'zh' => 'required',
                                    ],
                                    sourceField: 'title',
                                ),

                                static::makeTranslatableField(
                                    TextInput::make('slug')
                                        ->label('美化URL')
                                        ->helperText('可按语言手动填写；留空时系统会根据对应语言的标题自动生成，也可点击“翻译”立即生成')
                                        ->maxLength(255),
                                    sourceField: 'title',
                                ),

                                static::makeTranslatableField(
                                    Textarea::make('excerpt')
                                        ->label('简介')
                                        ->helperText('可按语言手动填写；也可点击“翻译”补全其他语言')
                                        ->rows(5),
                                    sourceField: 'title',
                                ),

                                static::makeTranslatableField(
                                    RichEditor::make('content')
                                        ->label('内容')
                                        ->helperText('可按语言手动填写；也可点击“翻译”补全其他语言')
                                        ->columnSpanFull()
                                        ->fileAttachmentsDisk('public')
                                        ->fileAttachmentsDirectory('news'),
                                    sourceField: 'title',
                                )
                                    ->columnSpanFull(),
                            ]),

                        // --- 右侧：发布设置 (占 1 列) ---
                        Section::make('设置')
                            ->columnSpan(1)
                            ->schema([
                                Select::make('category_id')
                                    ->label('分类')
                                    ->relationship('category', 'name')
                                    ->searchable()
                                    ->preload()
                                    // 核心：处理分类名称是多语言 JSON 的情况
                                    // 假设 Category Model 使用了 HasTranslations Trait，这里会自动显示当前语言名称
                                    ->getOptionLabelFromRecordUsing(
                                        fn($record) =>
                                        $record->parent
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
                                    ->label('作者'),

                                TextInput::make('sort_order')
                                    ->label('排序')
                                    ->numeric()
                                    ->default(0)
                                    ->helperText('数值越小，排序越靠前。'),

                                static::makeTranslatableField(
                                    TagsInput::make('tags')
                                        ->label('标签')
                                        ->helperText('可按语言手动填写；也可点击“翻译”补全其他语言'),
                                    sourceField: 'title',
                                ),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    protected static function makeTranslatableField(
        Field $field,
        ?array $localeSpecificRules = null,
        string $sourceField = 'title',
    ): FusedGroup {
        $name = $field->getName();

        return FusedGroup::make([
            $field
                ->hiddenLabel()
                ->translatable(true, null, $localeSpecificRules),
        ])
            ->label($field->getLabel())
            ->afterLabel([
                Action::make("translate_{$name}")
                    ->label('翻译')
                    ->icon('heroicon-o-language')
                    ->color('success')
                    ->action(function (Get $get, Set $set, ProductFormTranslationService $translationService) use ($name, $sourceField): void {
                        $result = $translationService->translateField(
                            field: $name,
                            translations: $get($name),
                            slugTranslations: $get('slug'),
                            sourceTranslations: $get($sourceField),
                        );

                        $set($name, $result['value']);

                        foreach ($result['extra'] as $extraField => $extraValue) {
                            $set($extraField, $extraValue);
                        }

                        if ($result['updated_count'] === 0) {
                            Notification::make()
                                ->title('没有可补全的翻译内容')
                                ->warning()
                                ->send();

                            return;
                        }

                        Notification::make()
                            ->title('翻译已回填')
                            ->body("本次更新 {$result['updated_count']} 项内容")
                            ->success()
                            ->send();
                    }),
            ]);
    }
}
