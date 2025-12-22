<?php

namespace App\Filament\Resources\ProductAccessCodes\Pages;

use App\Filament\Resources\ProductAccessCodes\ProductAccessCodeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProductAccessCodes extends ListRecords
{
    protected static string $resource = ProductAccessCodeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
