<?php

namespace App\Filament\Resources\NewsCategories\Schemas;

use App\Services\ProductFormTranslationService;
use Filament\Actions\Action;
use Filament\Forms\Components\Field;
use Filament\Forms\Components\Select;
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

class NewsCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3) // 将布局分为 3 列
                    ->schema([
                        // --- 左侧：主要内容区域 (占 2 列) ---
                        Section::make('基础信息')
                            ->description('多语言内容可手动填写；每个字段都可单独点击“翻译”补全其他语言。')
                            ->columnSpan(2)
                            ->schema([
                                static::makeTranslatableField(
                                    TextInput::make('name')
                                        ->label('分类名称')
                                        ->helperText('可按语言手动填写；也可点击“翻译”补全其他语言')
                                        ->maxLength(255),
                                    localeSpecificRules: [
                                        'zh' => 'required',
                                    ],
                                ),

                                static::makeTranslatableField(
                                    TextInput::make('slug')
                                        ->label('美化URL')
                                        ->helperText('可按语言手动填写；留空时系统会根据对应语言的分类名称自动生成，也可点击“翻译”立即生成')
                                        ->maxLength(255),
                                ),

                                static::makeTranslatableField(
                                    Textarea::make('description')
                                        ->label('描述')
                                        ->helperText('可按语言手动填写；也可点击“翻译”补全其他语言')
                                        ->rows(4),
                                ),
                            ]),

                        // --- 右侧：设置区域 (占 1 列) ---
                        Section::make('设置')
                            ->columnSpan(1)
                            ->schema([
                                Select::make('parent_id')
                                    ->label('上级分类')
                                    ->relationship('parent', 'name')
                                    ->searchable()
                                    ->preload()
                                    // 核心逻辑：防止选择自己作为父级 (死循环保护)
                                    ->relationship(
                                        name: 'parent',
                                        titleAttribute: 'name',
                                        modifyQueryUsing: fn(Builder $query, $record) =>
                                        $record ? $query->where('id', '!=', $record->id) : $query
                                    )
                                    // 优化显示：因为 name 是 JSON，用 Accessor 获取当前语言的字符串
                                    ->getOptionLabelFromRecordUsing(fn($record) => $record->name),

                                TextInput::make('sort_order')
                                    ->label('排序')
                                    ->numeric()
                                    ->default(0)
                                    ->helperText('数值越小，排序越靠前。'),

                                Toggle::make('is_visible')
                                    ->label('是否可见')
                                    ->default(true),
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
                            slugTranslations: $get('slug'),
                            sourceTranslations: $get('name'),
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
