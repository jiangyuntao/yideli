<?php

namespace App\Filament\Resources\ProductAccessCodes;

use App\Filament\Resources\ProductAccessCodes\Pages\CreateProductAccessCode;
use App\Filament\Resources\ProductAccessCodes\Pages\EditProductAccessCode;
use App\Filament\Resources\ProductAccessCodes\Pages\ListProductAccessCodes;
use App\Filament\Resources\ProductAccessCodes\Pages\ViewProductAccessCode;
use App\Filament\Resources\ProductAccessCodes\Schemas\ProductAccessCodeForm;
use App\Filament\Resources\ProductAccessCodes\Schemas\ProductAccessCodeInfolist;
use App\Filament\Resources\ProductAccessCodes\Tables\ProductAccessCodesTable;
use App\Models\ProductAccessCode;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProductAccessCodeResource extends Resource
{
    protected static ?string $model = ProductAccessCode::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCodeBracketSquare;

    protected static ?string $recordTitleAttribute = 'code';

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationLabel = '产品访问码';
    protected static ?string $pluralModelLabel = '产品访问码';
    protected static ?string $modelLabel = '产品访问码';

    public static function form(Schema $schema): Schema
    {
        return ProductAccessCodeForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ProductAccessCodeInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProductAccessCodesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListProductAccessCodes::route('/'),
            'create' => CreateProductAccessCode::route('/create'),
            // 'view' => ViewProductAccessCode::route('/{record}'),
            'edit' => EditProductAccessCode::route('/{record}/edit'),
        ];
    }
}
