<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
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
                                TextInput::make('name')
                                    ->label('产品名称')
                                    ->maxLength(255)
                                    // 仅中文必填
                                    ->translatable(true, null, [
                                        'zh' => 'required',
                                    ]),

                                TextInput::make('slug')
                                    ->label('美化URL')
                                    ->maxLength(255)
                                    ->translatable(),

                                Textarea::make('description')
                                    ->label('产品描述')
                                    ->rows(5)
                                    ->translatable(),

                                RichEditor::make('content')
                                    ->label('内容')
                                    ->columnSpanFull()
                                    // ->extraAttributes([
                                    //     'style' => 'min-height: 300px',
                                    // ])
                                    ->translatable(),
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
                                    ->multiple()
                                    ->reorderable()
                                    ->appendFiles()
                                    ->disk('public')
                                    ->directory('products')
                                    ->image()
                                    ->imageEditor()
                                    ->maxSize(1024 * 2) // 10MB
                                    ->acceptedFileTypes(['image/*']),

                                Toggle::make('is_visible')
                                    ->label('是否可见')
                                    ->inline(false)
                                    ->default(true),

                                TextInput::make('material')
                                    ->label('材质')
                                    ->maxLength(255)
                                    ->translatable(),

                                TagsInput::make('tags')
                                    ->label('标签')
                                    ->translatable(),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
