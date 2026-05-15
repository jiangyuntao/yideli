<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        if ($this->migrator->exists('general.google_event_code')) {
            return;
        }

        $this->migrator->add('general.google_event_code', null);
    }

    public function down(): void
    {
        if (!$this->migrator->exists('general.google_event_code')) {
            return;
        }

        $this->migrator->delete('general.google_event_code');
    }
};
