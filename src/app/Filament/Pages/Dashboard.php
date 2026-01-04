<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as PagesDashboard;

class Dashboard extends PagesDashboard
{
    protected static ?int $navigationSort = 0;
    protected static ?string $navigationLabel = '控制台';
}
