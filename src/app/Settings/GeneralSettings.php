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
    public ?array $company_name;
    public ?string $contact_email;
    public ?array $contact_address;
    public ?string $contact_tel;
    public ?string $contact_phone;
    public ?string $contact_linkedin;
    public ?string $contact_whatsapp;
    public ?array $home_carousel; // 首页轮播图
    public bool $is_active; // 网站维护开关
    public ?array $faqs; // 常见问题

    public static function group(): string
    {
        return 'general';
    }
}
