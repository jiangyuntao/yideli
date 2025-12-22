<?php

namespace App\Filament\Pages;

use BackedEnum;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;

class Setting extends Page
{
    protected string $view = 'filament.pages.setting';

    protected static string | BackedEnum | null $navigationIcon = Heroicon::OutlinedCog6Tooth;
    protected static ?int $navigationSort = 9;

    protected static ?string $navigationLabel = '系统设置';
    protected static ?string $pluralModelLabel = '系统设置';
    protected static ?string $modelLabel = '系统设置';
}
