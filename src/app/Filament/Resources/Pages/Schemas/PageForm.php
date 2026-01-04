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
                            ->helperText('用于构建页面的URL，如 https://example.com/your-slug')
                            ->required()
                            ->maxLength(100)
                            // 唯一性验证，编辑时忽略自己
                            ->unique(ignoreRecord: true),
                    ])
                    ->columnSpanFull(),

                Section::make('页面构建')
                    ->schema([
                        // Builder 内容构建器
                        Builder::make('content')
                            ->label('内容')
                            ->blocks([
                                Builder\Block::make('image_text')
                                    ->label('图文混排')
                                    ->schema([
                                        Grid::make(3)
                                            ->schema([
                                                Select::make('layout')
                                                    ->label('布局方向')
                                                    ->options([
                                                        'left_image' => '左图右文',
                                                        'right_image' => '右图左文',
                                                    ])
                                                    ->default('left_image')
                                                    ->native(false),
                                                Select::make('ratio')
                                                    ->label('左右比例')
                                                    ->options([
                                                        '1:2' => '1:2',
                                                        '1:1' => '1:1',
                                                        '2:1' => '2:1',
                                                    ])
                                                    ->default('1:1')
                                                    ->native(false),
                                                Select::make('image_sort')
                                                    ->label('图片排序')
                                                    ->options([
                                                        'up_down' => '从上到下',
                                                        'left_right' => '从左到右',
                                                    ])
                                                    ->default('up_down')
                                                    ->native(false),
                                            ])
                                            ->columnSpanFull(),

                                        FileUpload::make('images')
                                            ->label('配图')
                                            ->helperText('支持多张图片，建议图片数量为1、2、4、6、9')
                                            ->image()
                                            ->multiple()
                                            ->directory('pages')
                                            ->required()
                                            ->columnSpanFull(),

                                        RichEditor::make('text')
                                            ->label('文字内容')
                                            ->required()
                                            ->columnSpanFull(),
                                    ])
                                    ->columns(2),

                                Builder\Block::make('text_content')
                                    ->label('富文本')
                                    ->schema([
                                        RichEditor::make('content')->label('正文内容'),
                                    ]),
                                ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
