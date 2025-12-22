<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

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
                            ->columnSpan(2)
                            ->schema([
                                // 1. 产品名称
                                TextInput::make('name')
                                    ->label('产品名称')
                                    ->maxLength(255)
                                    // 仅中文必填
                                    ->translatable(true, null, [
                                        'zh' => 'required',
                                    ]),

                                // 2. Slug
                                TextInput::make('slug')
                                    ->label('美化URL')
                                    ->maxLength(255)
                                    ->translatable(true, null, [
                                        'zh' => 'required',
                                    ]),

                                // 3. 详情内容
                                RichEditor::make('content')
                                    ->label('内容')
                                    ->columnSpanFull()
                                    ->extraAttributes([
                                        'style' => 'min-height: 300px',
                                    ])
                                    ->translatable(),
                            ]),

                        // --- 右侧：设置与属性 (占 1 列) ---
                        Section::make('设置与属性')
                            ->columnSpan(1)
                            ->schema([
                                // 4. 分类选择 (新增)
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

                                // 5. 可见性
                                Toggle::make('is_visible')
                                    ->label('是否可见')
                                    ->default(true),

                                // 6. 规格参数
                                KeyValue::make('specifications')
                                    ->label('规格参数')
                                    ->keyLabel('参数')
                                    ->valueLabel('值')
                                    ->reorderable()
                                    ->translatable(),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
