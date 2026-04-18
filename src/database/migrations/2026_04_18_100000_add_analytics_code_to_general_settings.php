<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        if ($this->migrator->exists('general.analytics_code')) {
            return;
        }

        $this->migrator->add('general.analytics_code', null);
    }

    public function down(): void
    {
        if (!$this->migrator->exists('general.analytics_code')) {
            return;
        }

        $this->migrator->delete('general.analytics_code');
    }
};
