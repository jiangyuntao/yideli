<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        // 格式: $this->migrator->add('组名.属性名', 默认值);
        $this->migrator->add('general.site_name', 'My Awesome Site');
        $this->migrator->add('general.is_active', true);

        // 其他可为空的字段不需要显式 add，或者设为 null
        $this->migrator->add('general.site_logo', null);
        $this->migrator->add('general.site_favicon', null);
        $this->migrator->add('general.site_description', null);
        $this->migrator->add('general.site_keywords', null);
        $this->migrator->add('general.contact_email', null);
        $this->migrator->add('general.icp_beian', null);
    }
};
