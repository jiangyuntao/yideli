<?php

namespace App\Filament\Resources\News\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class NewsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('sort_order')
            ->reorderable('sort_order')
            ->columns([
                TextColumn::make('id')
                    ->label('ID'),

                TextColumn::make('sort_order')
                    ->label('排序')
                    ->sortable(),

                TextColumn::make('title')
                    ->label('标题')
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        $locale = app()->getLocale();
                        return $query->whereRaw("LOWER(JSON_UNQUOTE(JSON_EXTRACT(title, '$.\"{$locale}\"'))) LIKE ?", ["%" . strtolower($search) . "%"]);
                    })
                    ->limit(50),

                TextColumn::make('category.name')
                    ->label('分类')
                    ->searchable(),

                ImageColumn::make('cover_image')
                    ->label('封面图')
                    ->disk('public')
                    ->imageHeight(50),

                TextColumn::make('status')
                    ->label('状态')
                    ->badge()
                    ->getStateUsing(fn($record) => $record->published_at ? '发布' : '草稿')
                    ->color(fn(string $state): string => match ($state) {
                        '发布' => 'success',
                        '草稿' => 'gray',
                    }),

                TextColumn::make('published_at')
                    ->label('发布时间')
                    ->dateTime('Y-m-d H:i')
                    ->placeholder('草稿'),

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
