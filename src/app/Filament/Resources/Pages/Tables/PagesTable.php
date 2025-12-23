<?php

namespace App\Filament\Resources\Pages\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class PagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->columns([
                TextColumn::make('id')
                    ->label('ID'),
                TextColumn::make('title')
                    ->label('标题')
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        $locale = app()->getLocale();
                        return $query->whereRaw("LOWER(JSON_UNQUOTE(JSON_EXTRACT(title, '$.\"{$locale}\"'))) LIKE ?", ["%" . strtolower($search) . "%"]);
                    }),

                TextColumn::make('slug')
                    ->label('美化URL')
                    ->copyable()
                    ->searchable(),

                TextColumn::make('created_at')
                    ->label('创建时间')
                    ->dateTime('Y-m-d H:i'),
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
