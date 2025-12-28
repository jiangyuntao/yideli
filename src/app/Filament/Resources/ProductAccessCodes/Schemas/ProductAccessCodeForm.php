<?php

namespace App\Filament\Resources\ProductAccessCodes\Schemas;

use Filament\Actions\Action;
use Filament\Forms\Components\CheckboxList;
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
                                CheckboxList::make('products')
                                    ->label('关联产品')
                                    ->relationship('products', 'name') // 关联关系

                                    // 1. 开启全选 / 反选功能
                                    ->bulkToggleable()

                                    // 2. 开启搜索（产品多的时候很有用）
                                    ->searchable()

                                    // 3. 布局优化：分成2列显示，避免列表太长
                                    ->columns(2)

                                    // 4. 关键：解析你的 JSON 数据结构
                                    // 你的数据是: {"ar_SA": null, "zh_CN": "测试产品"}
                                    ->getOptionLabelFromRecordUsing(function ($record) {
                                        // 优先取 zh_CN
                                        if (!empty($record->name['zh_CN'])) {
                                            return $record->name['zh_CN'];
                                        }

                                        // 其次取 en_US (如果有)
                                        if (!empty($record->name['en_US'])) {
                                            return $record->name['en_US'];
                                        }

                                        // 兜底：取第一个非空的值
                                        $firstName = collect($record->name)->filter()->first();

                                        return $firstName ?? '未命名产品';
                                    })

                                    // 让组件占满整行
                                    ->columnSpanFull(),
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
