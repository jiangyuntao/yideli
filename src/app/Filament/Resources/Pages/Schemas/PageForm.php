<?php

namespace App\Filament\Resources\Pages\Schemas;

use Filament\Forms\Components\RichEditor;
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

                                // 2. 富文本内容 (多语言)
                                RichEditor::make('content')
                                    ->label('内容')
                                    // ->extraAttributes([
                                    //     'style' => 'min-height: 300px;'
                                    // ])
                                    ->columnSpanFull() // 占满整行
                                    ->fileAttachmentsDisk('public') // 图片上传磁盘
                                    ->fileAttachmentsDirectory('pages') // 图片存放目录
                                    ->translatable(),
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
