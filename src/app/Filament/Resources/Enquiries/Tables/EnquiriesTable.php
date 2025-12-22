<?php

namespace App\Filament\Resources\Enquiries\Tables;

use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class EnquiriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->columns([
                TextColumn::make('id')
                    ->label('ID'),

                // 状态 (直接在列表切换已读/未读)
                ToggleColumn::make('is_read')
                    ->label('已读'),

                // 姓名
                TextColumn::make('name')
                    ->label('姓名')
                    ->searchable(),

                // 邮箱 (可复制)
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->copyable()
                    ->icon('heroicon-m-envelope'),

                // 主题
                TextColumn::make('主题')
                    ->limit(30)
                    ->searchable(),

                // 来源 IP
                TextColumn::make('ip_address')
                    ->label('IP')
                    ->toggleable(isToggledHiddenByDefault: true),

                // 时间
                TextColumn::make('created_at')
                    ->label('创建时间')
                    ->dateTime('Y-m-d H:i'),
            ])
            ->filters([
                TernaryFilter::make('is_read')
                    ->label('状态')
                    ->placeholder('按状态查看')
                    ->trueLabel('已读')
                    ->falseLabel('未读'),
            ])
            ->recordActions([
                ViewAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    // 批量标记为已读
                    BulkAction::make('mark_as_read')
                        ->label('Mark as Read')
                        ->icon('heroicon-o-check')
                        ->action(fn($records) => $records->each->update(['is_read' => true])),
                ]),
            ]);
    }
}
