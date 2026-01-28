<?php

namespace App\Filament\Resources\Enquiries\Tables;

use App\Models\Enquiry;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
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
                TextColumn::make('meta_data.interest')
                    ->label('意向领域')
                    ->badge() // 核心：将数组显示为多个徽章
                    ->separator(',') // 某些情况下有助于正确分割
                    ->color('info') // 设置徽章颜色，如 primary, danger, success, info, gray
                    // 进阶：汉化显示（将数据库存的英文 key 转为中文）
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'oem' => 'OEM',
                        'odm' => 'ODM',
                        'notebook' => '笔记本',
                        'diary' => '日记本',
                        default => $state, // 未知的值直接显示
                    })
                    ->searchable(query: function ($query, string $search) {
                        // 允许搜索 JSON 数组内容 (MySQL 语法示例)
                        return $query->whereJsonContains('meta_data->interest', $search);
                    }),
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
