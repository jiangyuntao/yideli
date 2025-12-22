<?php

namespace App\Filament\Resources\News\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

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
                            ->columnSpan(2)
                            ->schema([
                                // 1. 标题
                                TextInput::make('title')
                                    ->label('标题')
                                    ->maxLength(255)
                                    // 自动生成 Slug (仅创建时)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function ($state, callable $set, $operation) {
                                        if ($operation === 'create') {
                                            $set('slug', Str::slug($state));
                                        }
                                    })
                                    // Outerweb v3 语法: 仅中文必填
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

                                // 3. 正文
                                RichEditor::make('content')
                                    ->label('Content')
                                    ->extraAttributes([
                                        'style' => 'height: 300px;'
                                    ])
                                    ->columnSpanFull()
                                    ->fileAttachmentsDisk('public')
                                    ->fileAttachmentsDirectory('news')
                                    ->translatable(),
                            ]),

                        // --- 右侧：发布设置 (占 1 列) ---
                        Section::make('设置')
                            ->columnSpan(1)
                            ->schema([
                                // 4. 发布时间
                                DateTimePicker::make('published_at')
                                    ->label('发布时间')
                                    ->helperText('留空则保存为草稿')
                                    ->native(false) // 使用漂亮的 JS日期选择器
                                    ->seconds(false) // 通常新闻不需要精确到秒
                                    ->default(now()),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
