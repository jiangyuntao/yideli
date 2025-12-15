<?php

namespace App\Filament\Resources\Contents\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class ContentForm
{
    public static function configure(Schema $schema): Schema
    {
        // return $schema
        //     ->components([
        //         TextInput::make('type')
        //             ->required(),
        //         TextInput::make('status')
        //             ->required()
        //             ->default('draft'),
        //         TextInput::make('author_id')
        //             ->required()
        //             ->numeric(),
        //         DateTimePicker::make('publish_at'),
        //     ]);
        return $schema
            ->components([
                Select::make('type')
                    ->options([
                        'article' => '文章',
                        'page' => '页面',
                    ])
                    ->required(),

                Select::make('status')
                    ->options([
                        'draft' => '草稿',
                        'published' => '已发布',
                    ])
                    ->required()
                    ->default('draft'),

                DateTimePicker::make('publish_at')
                    ->label('发布时间'),

                Select::make('taxonomies')
                    ->relationship('taxonomies', 'label')
                    ->multiple()
                    ->preload()
                    ->label('分类'),
            ]);
    }
}
