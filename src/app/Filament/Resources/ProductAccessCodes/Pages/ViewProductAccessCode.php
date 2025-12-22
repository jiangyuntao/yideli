<?php

namespace App\Filament\Resources\ProductAccessCodes\Pages;

use App\Filament\Resources\ProductAccessCodes\ProductAccessCodeResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewProductAccessCode extends ViewRecord
{
    protected static string $resource = ProductAccessCodeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
