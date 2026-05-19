<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        if ($this->migrator->exists('general.home_category_images')) {
            return;
        }

        $this->migrator->add('general.home_category_images', []);
    }

    public function down(): void
    {
        if (!$this->migrator->exists('general.home_category_images')) {
            return;
        }

        $this->migrator->delete('general.home_category_images');
    }
};
