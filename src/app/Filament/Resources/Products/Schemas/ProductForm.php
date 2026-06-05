<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Services\ProductFormTranslationService;
use Filament\Actions\Action;
use Filament\Forms\Components\Field;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\FusedGroup;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3)
                    ->schema([
                        // --- 左侧：核心内容区域 (占 2 列) ---
                        Section::make('基础信息')
                            ->description('每个多语言字段都可单独点击“翻译”补全其他语言。')
                            ->columnSpan(2)
                            ->schema([
                                static::makeTranslatableField(
                                    TextInput::make('name')
                                        ->label('产品名称')
                                        ->maxLength(255),
                                    localeSpecificRules: [
                                        'zh' => 'required',
                                    ],
                                ),

                                static::makeTranslatableField(
                                    TextInput::make('slug')
                                        ->label('美化URL')
                                        ->maxLength(255),
                                ),

                                static::makeTranslatableField(
                                    Textarea::make('description')
                                        ->label('产品描述')
                                        ->rows(5),
                                ),

                                static::makeTranslatableField(
                                    RichEditor::make('content')
                                        ->label('内容'),
                                )
                                    ->columnSpanFull(),
                            ]),

                        // --- 右侧：设置与属性 (占 1 列) ---
                        Section::make('设置与属性')
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

                                TextInput::make('code')
                                    ->label('产品编码')
                                    ->maxLength(255),

                                FileUpload::make('images')
                                    ->label('图片')
                                    ->helperText('建议上传2M以内图片')
                                    ->multiple()
                                    ->reorderable()
                                    ->appendFiles()
                                    ->disk('public')
                                    ->directory('products')
                                    ->image()
                                    ->imageEditor()
                                    ->maxSize(1024 * 2) // 2MB
                                    ->acceptedFileTypes(['image/*']),

                                Toggle::make('is_visible')
                                    ->label('是否可见')
                                    ->inline(false)
                                    ->default(true),

                                static::makeTranslatableField(
                                    TextInput::make('material')
                                        ->label('材质')
                                        ->maxLength(255),
                                ),

                                static::makeTranslatableField(
                                    TextInput::make('size')
                                        ->label('Size')
                                        ->maxLength(255),
                                ),

                                Section::make('Inner pages')
                                    ->schema([
                                        static::makeTranslatableField(
                                            Textarea::make('inner_page_color')
                                                ->label('Color')
                                                ->rows(2),
                                        ),

                                        static::makeTranslatableField(
                                            Textarea::make('inner_page_paper_weight')
                                                ->label('Paper weight')
                                                ->rows(2),
                                        ),

                                        static::makeTranslatableField(
                                            TextInput::make('inner_page_sheet_count')
                                                ->label('Sheet count')
                                                ->maxLength(255),
                                        ),
                                    ]),

                                static::makeTranslatableField(
                                    TextInput::make('moq')
                                        ->label('MOQ')
                                        ->maxLength(255),
                                ),

                                static::makeTranslatableField(
                                    TextInput::make('lead_time')
                                        ->label('Lead Time')
                                        ->maxLength(255),
                                ),

                                static::makeTranslatableField(
                                    TagsInput::make('tags')
                                        ->label('标签'),
                                ),

                                Select::make('flags')
                                    ->label('标记')
                                    ->options([
                                        'new' => '最新',
                                        'best_seller' => '热销',
                                    ])
                                    ->multiple()
                                    ->default([])
                                    ->dehydrateStateUsing(
                                        fn(mixed $state): array => array_values(array_filter((array) $state))
                                    )
                                    ->native(false),
                                Select::make('relatedProducts') // 对应模型中的关联方法名
                                    ->label('关联商品')
                                    ->relationship('relatedProducts', 'title') // 关联名, 显示字段(如 title)
                                    ->multiple() // 允许多选
                                    ->searchable() // 可搜索
                                    ->preload() // 如果数据量不大，预加载所有选项
                                    // 关键优化：在列表中排除当前商品自己（避免死循环）
                                    ->getOptionLabelFromRecordUsing(fn(Model $record) => "{$record->name} (ID: {$record->id})")
                                    ->relationship(
                                        name: 'relatedProducts',
                                        titleAttribute: 'title',
                                        modifyQueryUsing: fn(Builder $query, $get) => $query->where('id', '!=', $get('id')),
                                    ),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    protected static function makeTranslatableField(Field $field, ?array $localeSpecificRules = null): FusedGroup
    {
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
                    ->action(function (Get $get, Set $set, ProductFormTranslationService $translationService) use ($name): void {
                        $result = $translationService->translateField(
                            field: $name,
                            translations: $get($name),
                            nameTranslations: $get('name'),
                            slugTranslations: $get('slug'),
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
