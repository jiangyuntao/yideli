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

                // 2. 关联产品 (如果在 RelationManager 中可以隐藏此列)
                TextColumn::make('product.name') // 这里也会自动处理多语言 Accessor
                    ->label('产品')
                    ->limit(30)
                    ->hiddenOn('relationManager'), // 在关联管理中隐藏

                TextColumn::make('user.name') // 假设 User 模型有 name 字段
                    ->label('用户'),

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
