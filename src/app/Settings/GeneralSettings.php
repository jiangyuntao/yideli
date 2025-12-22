<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $site_name;
    public ?string $site_logo;
    public ?string $site_favicon;
    public ?string $site_description;
    public ?string $site_keywords;
    public ?string $contact_email;
    public ?string $icp_beian; // ICP备案号
    public bool $is_active; // 网站维护开关

    public static function group(): string
    {
        return 'general';
    }
}
