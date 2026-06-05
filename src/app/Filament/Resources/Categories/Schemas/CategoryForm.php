<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Builder;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3) // 将布局分为 3 列
                    ->schema([
                        // --- 左侧：主要内容区域 (占 2 列) ---
                        Section::make('基础信息')
                            ->columnSpan(2)
                            ->schema([
                                TextInput::make('name')
                                    ->label('分类名称')
                                    ->helperText('填写简体中文分类名称后，会自动翻译其他语言')
                                    ->maxLength(255)
                                    ->translatable(true, null, [
                                        'zh_CN' => 'required',
                                    ]),

                                TextInput::make('slug')
                                    ->label('美化URL')
                                    ->helperText('会根据各语言分类名称自动生成')
                                    ->maxLength(255)
                                    // 注意：多语言字段的 unique 验证通常需要自定义规则，这里先不做严格唯一限制以免报错
                                    ->translatable(),

                                Textarea::make('description')
                                    ->label('描述')
                                    ->helperText('填写简体中文分类描述后，会自动翻译其他语言')
                                    ->rows(4)
                                    ->translatable(),
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

                                FileUpload::make('cover_image')
                                    ->label('封面图')
                                    ->disk('public')
                                    ->directory('category-images')
                                    ->image()
                                    ->maxSize(1024 * 2) // 2MB
                                    ->helperText('建议上传 400x500px 的图片；首页 Hero 下方分类卡片也会优先使用这张图。'),

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
}
