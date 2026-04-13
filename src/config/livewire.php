<?php

return [
    'temporary_file_upload' => [
        // Use the public disk for Livewire temp uploads so Filament image uploads
        // don't depend on storage/app/private permissions in production.
        'disk' => env('LIVEWIRE_UPLOAD_DISK', 'public'),
        'directory' => env('LIVEWIRE_UPLOAD_DIRECTORY', 'livewire-tmp'),
    ],
];
