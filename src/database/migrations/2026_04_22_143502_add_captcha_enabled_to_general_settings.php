<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        if ($this->migrator->exists('general.captcha_enabled')) {
            return;
        }

        $this->migrator->add('general.captcha_enabled', true);
    }

    public function down(): void
    {
        if (!$this->migrator->exists('general.captcha_enabled')) {
            return;
        }

        $this->migrator->delete('general.captcha_enabled');
    }
};
