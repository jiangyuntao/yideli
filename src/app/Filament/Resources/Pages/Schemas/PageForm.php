<?php

namespace App\Filament\Resources\Pages\Schemas;

use Filament\Forms\Components\Builder;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3)
                    ->schema([
                        // --- 左侧：主要内容区域 (占 2 列) ---
                        Section::make('页面内容')
                            ->columnSpan(2)
                            ->schema([
                                // 1. 标题 (多语言)
                                TextInput::make('title')
                                    ->label('标题')
                                    ->maxLength(255)
                                    // 自动Slug生成逻辑：输入标题时自动填充 Key
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function ($state, callable $set, $operation) {
                                        // 仅在创建时自动生成，防止编辑时破坏现有链接
                                        if ($operation === 'create') {
                                            $set('key', Str::slug($state, '-')); // 使用下划线风格，如 about_us
                                        }
                                    })
                                    // 仅中文必填
                                    ->translatable(true, null, [
                                        'zh' => 'required',
                                    ]),

                                // Builder 内容构建器
                                Builder::make('content')
                                    ->label('页面内容')
                                    ->blocks([
                                        // --- 1. Hero 顶部大图 ---
                                        Builder\Block::make('hero')
                                            ->label('顶部大图 (Hero)')
                                            ->schema([
                                                TextInput::make('heading')->label('主标题'),
                                                TextInput::make('subheading')->label('副标题'),
                                                FileUpload::make('image')
                                                    ->label('背景图')
                                                    ->image()
                                                    ->directory('pages')
                                                    ->required(),
                                            ]),

                                        // --- 2. 图文混排 (本次优化的核心) ---
                                        Builder\Block::make('image_text')
                                            ->label('图文混排')
                                            ->schema([
                                                Select::make('layout')
                                                    ->label('布局方向')
                                                    ->options([
                                                        'left_image' => '左图右文',
                                                        'right_image' => '右图左文',
                                                    ])
                                                    ->default('left_image')
                                                    ->selectablePlaceholder(false)
                                                    ->columnSpanFull(),

                                                FileUpload::make('image')
                                                    ->label('配图')
                                                    ->image()
                                                    ->directory('pages')
                                                    ->required()
                                                    ->columnSpanFull(),

                                                RichEditor::make('text')
                                                    ->label('文字内容')
                                                    ->required()
                                                    ->columnSpanFull(),
                                            ])
                                            ->columns(2),

                                        // --- 3. 统计数据 ---
                                        Builder\Block::make('stats')
                                            ->label('统计数据栏')
                                            ->schema([
                                                Repeater::make('items')
                                                    ->label('数据项')
                                                    ->schema([
                                                        TextInput::make('number')->label('数值')->required(),
                                                        TextInput::make('label')->label('标签')->required(),
                                                    ])
                                                    ->grid(4)
                                            ]),

                                        // --- 4. 纯文本 ---
                                        Builder\Block::make('text_content')
                                            ->label('纯文本段落')
                                            ->schema([
                                                TextInput::make('heading')->label('段落标题 (可选)'),
                                                RichEditor::make('content')->label('正文内容'),
                                            ]),
                                    ])
                                    ->columnSpanFull(),
                            ]),

                        // --- 右侧：系统设置 (占 1 列) ---
                        Section::make('设置')
                            ->columnSpan(1)
                            ->schema([
                                // 3. Key (唯一标识符)
                                TextInput::make('slug')
                                    ->label('美化URL')
                                    ->helperText('用于构建页面的URL，如 https://example.com/your-slug')
                                    ->required()
                                    ->maxLength(100)
                                    // 唯一性验证，编辑时忽略自己
                                    ->unique(ignoreRecord: true),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
