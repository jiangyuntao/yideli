<?php

namespace App\Filament\Resources\ProductAccessCodes\Pages;

use App\Filament\Resources\ProductAccessCodes\ProductAccessCodeResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditProductAccessCode extends EditRecord
{
    protected static string $resource = ProductAccessCodeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
