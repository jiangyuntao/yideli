<?php

namespace App\Filament\Resources\Contents\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ContentsTable
{
    public static function configure(Table $table): Table
    {
        // return $table
        //     ->columns([
        //         TextColumn::make('type')
        //             ->searchable(),
        //         TextColumn::make('status')
        //             ->searchable(),
        //         TextColumn::make('author_id')
        //             ->numeric()
        //             ->sortable(),
        //         TextColumn::make('publish_at')
        //             ->dateTime()
        //             ->sortable(),
        //         TextColumn::make('created_at')
        //             ->dateTime()
        //             ->sortable()
        //             ->toggleable(isToggledHiddenByDefault: true),
        //         TextColumn::make('updated_at')
        //             ->dateTime()
        //             ->sortable()
        //             ->toggleable(isToggledHiddenByDefault: true),
        //     ])
        //     ->filters([
        //         //
        //     ])
        //     ->recordActions([
        //         EditAction::make(),
        //     ])
        //     ->toolbarActions([
        //         BulkActionGroup::make([
        //             DeleteBulkAction::make(),
        //         ]),
        //     ]);
        return $table
            ->columns([
                TextColumn::make('id')
                    ->sortable(),

                TextColumn::make('type')
                    ->label('类型'),

                TextColumn::make('status_label')
                    ->label('状态')
                    ->badge(),

                TextColumn::make('translations_count')
                    ->counts('translations')
                    ->label('语言数'),

                TextColumn::make('updated_at')
                    ->label('更新时间')
                    ->dateTime(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'draft' => '草稿',
                        'published' => '已发布',
                    ]),
            ])
            ->defaultSort('updated_at', 'desc');
    }
}
