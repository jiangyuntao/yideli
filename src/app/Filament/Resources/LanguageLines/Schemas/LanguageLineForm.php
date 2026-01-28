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
                            ->helperText('为避免误删，编辑时不可修改分组')
                            ->required()
                            ->datalist(['menu', 'buttons', 'validation', 'footer'])
                            ->readonly(fn (string $operation) => $operation === 'edit'),

                        TextInput::make('key')
                            ->label('键名')
                            ->placeholder('例如: contact_us')
                            ->helperText('为避免误删，编辑时不可修改键名')
                            ->required()
                            ->readonly(fn (string $operation) => $operation === 'edit'),

                        Textarea::make('text')
                            ->label('翻译')
                            ->rows(5)
                            ->translatable()
                    ])

                    ->columnSpanFull()
            ]);
    }
}
