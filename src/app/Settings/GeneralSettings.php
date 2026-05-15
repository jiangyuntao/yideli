<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public ?array $site_name;
    public ?array $site_description;
    public ?array $site_keywords;
    public ?string $analytics_code;
    public ?string $google_event_code;
    public ?array $company_name;
    public ?string $contact_email;
    public ?array $contact_address;
    public ?string $contact_tel;
    public ?string $contact_phone;
    public ?string $contact_linkedin;
    public ?string $contact_whatsapp;
    public ?array $home_carousel; // 首页轮播图
    public bool $is_active; // 网站维护开关
    public bool $captcha_enabled; // 询盘验证码开关
    public ?array $faqs; // 常见问题

    public static function group(): string
    {
        return 'general';
    }
}
