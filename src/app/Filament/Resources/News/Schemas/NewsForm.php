<?php

namespace App\Filament\Resources\News\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\App;
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

                                TextInput::make('slug')
                                    ->label('美化URL')
                                    ->maxLength(255)
                                    ->translatable(),

                                Textarea::make('excerpt')
                                    ->label('简介')
                                    ->rows(5)
                                    ->translatable(),

                                RichEditor::make('content')
                                    ->label('内容')
                                    ->columnSpanFull()
                                    ->fileAttachmentsDisk('public')
                                    ->fileAttachmentsDirectory('news')
                                    ->translatable(),
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
                                    ->maxSize(1024 * 10) // 10MB
                                    ->acceptedFileTypes(['image/*']),

                                DateTimePicker::make('published_at')
                                    ->label('发布时间')
                                    ->helperText('留空则保存为草稿')
                                    ->native(false) // 使用漂亮的 JS日期选择器
                                    ->seconds(false) // 通常新闻不需要精确到秒
                                    ->default(now()),

                                TextInput::make('author')
                                    ->label('作者'),

                                TagsInput::make('tags')
                                    ->label('标签')
                                    ->translatable(),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
