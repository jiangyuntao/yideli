<?php

namespace App\Filament\Resources\ProductAccessCodes\Schemas;

use Filament\Actions\Action;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProductAccessCodeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3)
                    ->schema([
                        // --- 左侧：核心配置 (占 2 列) ---
                        Section::make('基础信息')
                            ->columnSpan(2)
                            ->schema([
                                // 1. 关联产品
                                // 如果是在 ProductRelationManager 中使用，这个字段会自动隐藏
                                Select::make('product_id')
                                    ->label('产品')
                                    ->relationship('product', 'name') // 这里的 name 如果是 JSON，需要你的 Model 有 Accessor 或者配置
                                    ->getOptionLabelFromRecordUsing(fn($record) => $record->name) // 确保多语言名称正常显示
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->hiddenOn('relationManager'), // 关键配置

                                // 2. 访问码 (Code)
                                TextInput::make('code')
                                    ->label('访问码')
                                    ->required()
                                    ->maxLength(50)
                                    ->unique(ignoreRecord: true)
                                    // 默认生成随机码
                                    ->default(fn() => Str::upper(Str::random(8)))
                                    // 添加一个按钮手动重新生成
                                    ->suffixAction(
                                        Action::make('regenerate')
                                            ->icon('heroicon-m-arrow-path')
                                            ->action(fn(Set $set) => $set('code', Str::upper(Str::random(8))))
                                    ),

                                // 3. 备注
                                Textarea::make('note')
                                    ->label('备注')
                                    ->placeholder('例如：为客户 X 发放测试用')
                                    ->rows(3)
                                    ->columnSpanFull(),
                            ]),

                        // --- 右侧：限制与归属 (占 1 列) ---
                        Section::make('设置')
                            ->columnSpan(1)
                            ->schema([
                                Select::make('user_id')
                                    ->label('用户')
                                    ->relationship('user', 'name') // 关联 User 模型
                                    ->searchable() // 允许搜索名字
                                    ->preload() // 如果用户少于50个，自动加载下拉表
                                    ->required()
                                    // 默认选中当前操作员(管理员)，但允许修改
                                    ->helperText('选择用户，该用户将关联到这个访问码。'),
                                // 4. 过期时间
                                DateTimePicker::make('expires_at')
                                    ->label('过期时间')
                                    ->required()
                                    ->native(false)
                                    ->default(now()->addDays(7)), // 默认 7 天后过期

                                // 5. 使用次数限制
                                TextInput::make('usage_limit')
                                    ->label('次数限制')
                                    ->numeric()
                                    ->default(1)
                                    ->helperText('0 表示无次数限制'),

                                // 6. 已使用次数 (仅编辑时显示，只读)
                                TextInput::make('used_count')
                                    ->label('已使用次数')
                                    ->disabled()
                                    ->dehydrated(false) // 不重复保存
                                    ->visible(fn(string $operation) => $operation === 'edit'),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
