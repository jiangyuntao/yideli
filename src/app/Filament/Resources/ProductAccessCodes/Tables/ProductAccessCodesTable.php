<?php

namespace App\Filament\Resources\ProductAccessCodes\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProductAccessCodesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->columns([
                TextColumn::make('id')
                    ->label('ID'),
                // 1. 访问码 (可复制)
                TextColumn::make('code')
                    ->label('访问码')
                    ->weight('bold')
                    ->copyable() // 允许一键复制
                    ->copyMessage('访问码复制成功!')
                    ->searchable(),

                TextColumn::make('products.name')
                    ->label('适用产品')
                    ->badge() // 使用徽章样式
                    ->separator(',') // 如果不用 badge，可以用逗号分隔
                    ->limitList(3) // 如果关联太多，只显示前3个，剩下的显示 "+X more"
                    // 同样，处理 JSON 多语言显示问题：
                    ->formatStateUsing(function ($state) {
                        // $state 可能是具体的 name 值，取决于 Filament 如何解析 JSON
                        // 如果这里拿到的是数组或对象，需要取出当前语言
                        if (is_array($state) || is_object($state)) {
                            return $state['zh'] ?? $state['en'] ?? '未知';
                        }
                        return $state;
                    }),
                // 3. 状态 (虚拟计算列)
                TextColumn::make('status')
                    ->label('状态')
                    ->badge()
                    ->getStateUsing(function ($record) {
                        if ($record->expires_at < now()) {
                            return '过期';
                        }
                        if (!is_null($record->usage_limit) && $record->used_count >= $record->usage_limit) {
                            return '用尽';
                        }
                        return '可用';
                    })
                    ->color(fn(string $state): string => match ($state) {
                        '可用' => 'success',
                        '过期' => 'danger',
                        '用尽' => 'warning',
                    }),

                // 4. 使用情况 (显示 5 / 10)
                TextColumn::make('usage')
                    ->label('用量')
                    ->getStateUsing(
                        fn($record) =>
                        $record->used_count . ' / ' . ($record->usage_limit ?? '∞')
                    ),

                // 5. 过期时间
                TextColumn::make('expires_at')
                    ->label('过期时间')
                    ->dateTime('Y-m-d')
                    ->color(fn($record) => $record->expires_at < now() ? 'danger' : 'gray'),

                // 6. 备注
                TextColumn::make('note')
                    ->label('备注')
                    ->limit(20)
                    ->tooltip(fn($state) => $state),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
