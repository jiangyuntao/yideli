<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->columns([
                TextColumn::make('id')
                    ->label('ID'),
                TextColumn::make('name')
                    ->label('用户名')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),
                TextColumn::make('roles.name') // 使用点语法直接访问关联模型的 name 字段
                    ->label('角色')
                    ->badge() // 开启徽章样式 (像标签一样显示)
                    ->separator(',') // 如果没有开启 badge，多个角色会用这个分隔；开启 badge 后这行其实是可选的，但在导出数据时有用
                    // 可选：给不同角色设置不同颜色
                    ->color(fn(string $state): string => match ($state) {
                        '超级管理员' => 'danger',  // 超级管理员显示红色
                        '管理员'  => 'success', // 普通面板用户显示绿色
                        default       => 'primary', // 其他角色显示主色调
                    })
                    ->searchable(), // 允许通过角色名称搜索用户
                TextColumn::make('created_at')
                    ->label('创建时间')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('更新时间')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
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
