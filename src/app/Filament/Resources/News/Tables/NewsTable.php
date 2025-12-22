<?php

namespace App\Filament\Resources\News\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class NewsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->columns([
                TextColumn::make('id')
                    ->label('ID'),
                // 1. 标题 (JSON 搜索)
                TextColumn::make('title')
                    ->label('标题')
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        $locale = app()->getLocale();
                        return $query->whereRaw("LOWER(JSON_UNQUOTE(JSON_EXTRACT(title, '$.\"{$locale}\"'))) LIKE ?", ["%" . strtolower($search) . "%"]);
                    })
                    ->limit(50),

                // 2. 状态 (虚拟字段，通过 published_at 判断)
                TextColumn::make('status')
                    ->label('状态')
                    ->badge()
                    ->getStateUsing(fn($record) => $record->published_at ? '发布' : '草稿')
                    ->color(fn(string $state): string => match ($state) {
                        '发布' => 'success',
                        '草稿' => 'gray',
                    }),

                // 3. 发布时间
                TextColumn::make('published_at')
                    ->label('发布时间')
                    ->dateTime('Y-m-d H:i')
                    ->placeholder('草稿'),

                // 4. 更新时间
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
