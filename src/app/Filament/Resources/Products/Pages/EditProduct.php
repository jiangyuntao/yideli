<?php

namespace App\Filament\Resources\Products\Pages;

use App\Filament\Resources\Products\ProductResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['images'] = $this->normalizeImagesState($data['images'] ?? []);

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['images'] = $this->normalizeImagesState($data['images'] ?? []);

        return $data;
    }

    protected function normalizeImagesState(mixed $images): array
    {
        if (is_string($images)) {
            $decoded = json_decode($images, true);

            if (json_last_error() === JSON_ERROR_NONE) {
                $images = $decoded;
            } else {
                $images = array_map('trim', explode(',', $images));
            }
        }

        if (! is_array($images)) {
            return [];
        }

        return array_values(array_filter($images, function (mixed $path): bool {
            if (! is_string($path) || $path === '') {
                return false;
            }

            if (str_starts_with($path, 'livewire-tmp/')) {
                return false;
            }

            return Storage::disk('public')->exists($path);
        }));
    }
}
