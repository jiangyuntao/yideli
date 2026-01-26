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
                Section::make('基础信息')
                    ->schema([
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

                        TextInput::make('slug')
                            ->label('美化URL')
                            ->helperText('用于构建页面的URL，如 https://example.com/lang/slug')
                            ->translatable(),

                        RichEditor::make('content')
                            ->label('正文内容')
                            ->translatable(),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
