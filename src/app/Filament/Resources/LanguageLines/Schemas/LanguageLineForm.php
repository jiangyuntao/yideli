<?php

namespace App\Filament\Resources\LanguageLines\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class LanguageLineForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('翻译')
                    ->schema([
                        TextInput::make('group')
                            ->label('分组')
                            ->placeholder('例如: menu, buttons, home_page')
                            ->required()
                            ->datalist(['menu', 'buttons', 'validation', 'footer']), // 常用提示

                        TextInput::make('key')
                            ->label('键名')
                            ->placeholder('例如: contact_us')
                            ->required(),

                        Textarea::make('text')
                            ->label('翻译')
                            ->rows(5)
                            ->translatable()
                    ])

                    ->columnSpanFull()
            ]);
    }
}
