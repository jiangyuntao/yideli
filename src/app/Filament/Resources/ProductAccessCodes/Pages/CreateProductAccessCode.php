<?php

namespace App\Filament\Resources\ProductAccessCodes\Pages;

use App\Filament\Resources\ProductAccessCodes\ProductAccessCodeResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProductAccessCode extends CreateRecord
{
    protected static string $resource = ProductAccessCodeResource::class;
}
