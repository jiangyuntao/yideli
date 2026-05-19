<?php

namespace App\Filament\Pages;

use App\Settings\GeneralSettings;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Storage;

class Setting extends SettingsPage
{
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?int $navigationSort = 11;
    protected static ?string $navigationLabel = '系统设置';
    protected static ?string $title = '系统设置';

    protected static string $settings = GeneralSettings::class;

    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Tabs::make('tabs')
                    ->columnSpanFull()
                    ->tabs([
                        Tab::make('基础信息')
                            ->schema([
                                TextInput::make('site_name')
                                    ->label('网站名称')
                                    ->translatable(),

                                Textarea::make('site_description')
                                    ->label('网站描述')
                                    ->rows(3)
                                    ->helperText('用于 SEO Meta Description')
                                    ->translatable(),

                                TextInput::make('site_keywords')
                                    ->label('SEO 关键词')
                                    ->placeholder('笔记本, 销售, 服务')
                                    ->translatable(),

                                Toggle::make('is_active')
                                    ->label('网站开启状态')
                                    ->helperText('关闭后前台将显示维护中')
                                    ->default(true),

                                Toggle::make('captcha_enabled')
                                    ->label('前台询盘验证码')
                                    ->helperText('关闭后首页与询盘页将不显示验证码，并跳过验证码校验')
                                    ->default(true),
                            ]),

                        Tab::make('统计代码')
                            ->schema([
                                Textarea::make('analytics_code')
                                    ->label('Google安装代码')
                                    ->rows(12)
                                    ->helperText('支持粘贴 Google 安装脚本或 HTML 代码，将在前台全站页面的 head 中输出。')
                                    ->placeholder("<script>\n  // Google install snippet\n</script>")
                                    ->columnSpanFull(),

                                Textarea::make('google_event_code')
                                    ->label('Google事件代码')
                                    ->rows(12)
                                    ->helperText('支持粘贴 Google 事件脚本或 HTML 代码，仅在表单提交成功后的 success 页面输出。')
                                    ->placeholder("<script>\n  // Google event snippet\n</script>")
                                    ->columnSpanFull(),
                            ]),

                        Tab::make('外观与联系')
                            ->schema([
                                TextInput::make('company_name')
                                    ->label('公司名称')
                                    ->translatable(),
                                TextInput::make('contact_address')
                                    ->label('地址')
                                    ->translatable(),
                                TextInput::make('contact_email')
                                    ->label('联系邮箱')
                                    ->email(),
                                TextInput::make('contact_tel')
                                    ->label('联系座机'),
                                TextInput::make('contact_phone')
                                    ->label('联系手机'),
                                TextInput::make('contact_linkedin')
                                    ->label('LinkedIn 账号'),
                                TextInput::make('contact_whatsapp')
                                    ->label('WhatsApp 账号'),
                            ]),

                        Tab::make('首页 Hero 设置')
                            ->schema([
                                Grid::make(2)
                                    ->statePath('home_carousel')
                                    ->schema([
                                        FileUpload::make('image')
                                            ->label('PC端图片')
                                            ->helperText('建议大小：PC 端2400 x 1000')
                                            ->image()
                                            ->imageEditor()
                                            ->maxSize(1024 * 10) // 10MB
                                            ->acceptedFileTypes(['image/*'])
                                            ->directory('carousel') // 图片存放在 storage/app/public/carousel
                                            ->disk('public')
                                            ->required()
                                            ->columnSpan(1),

                                        FileUpload::make('image_mobile')
                                            ->label('移动端图片')
                                            ->helperText('建议大小：移动端 1080 x 1920；不上传则默认使用 PC 端图片')
                                            ->image()
                                            ->imageEditor()
                                            ->maxSize(1024 * 10) // 10MB
                                            ->acceptedFileTypes(['image/*'])
                                            ->directory('carousel') // 图片存放在 storage/app/public/carousel
                                            ->disk('public')
                                            ->columnSpan(1),
                                    ]),

                                Grid::make(2)
                                    ->statePath('home_category_images')
                                    ->schema([
                                        FileUpload::make('image_1')
                                            ->label('分类图 1')
                                            ->helperText('对应首页 Hero 下方第 1 个商品分类图')
                                            ->image()
                                            ->imageEditor()
                                            ->maxSize(1024 * 10)
                                            ->acceptedFileTypes(['image/*'])
                                            ->directory('home-categories')
                                            ->disk('public')
                                            ->columnSpan(1),

                                        FileUpload::make('image_2')
                                            ->label('分类图 2')
                                            ->helperText('对应首页 Hero 下方第 2 个商品分类图')
                                            ->image()
                                            ->imageEditor()
                                            ->maxSize(1024 * 10)
                                            ->acceptedFileTypes(['image/*'])
                                            ->directory('home-categories')
                                            ->disk('public')
                                            ->columnSpan(1),

                                        FileUpload::make('image_3')
                                            ->label('分类图 3')
                                            ->helperText('对应首页 Hero 下方第 3 个商品分类图')
                                            ->image()
                                            ->imageEditor()
                                            ->maxSize(1024 * 10)
                                            ->acceptedFileTypes(['image/*'])
                                            ->directory('home-categories')
                                            ->disk('public')
                                            ->columnSpan(1),

                                        FileUpload::make('image_4')
                                            ->label('分类图 4')
                                            ->helperText('对应首页 Hero 下方第 4 个商品分类图')
                                            ->image()
                                            ->imageEditor()
                                            ->maxSize(1024 * 10)
                                            ->acceptedFileTypes(['image/*'])
                                            ->directory('home-categories')
                                            ->disk('public')
                                            ->columnSpan(1),
                                    ]),
                            ]),

                        Tab::make('FAQ')
                            ->schema([
                                Repeater::make('faqs')
                                    ->label('常见问题')
                                    ->schema([
                                        TextInput::make('question')
                                            ->label('问题')
                                            ->translatable(),
                                        Textarea::make('answer')
                                            ->label('答案')
                                            ->rows(5)
                                            ->translatable(),
                                    ])
                            ],)
                    ]),
            ]);
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['home_carousel'] = $this->normalizeHeroSettings($data['home_carousel'] ?? null);
        $data['home_category_images'] = $this->normalizeHomeCategoryImages($data['home_category_images'] ?? null);

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['home_carousel'] = $this->normalizeHeroSettings($data['home_carousel'] ?? null);
        $data['home_category_images'] = $this->normalizeHomeCategoryImages($data['home_category_images'] ?? null);

        return $data;
    }

    protected function normalizeHeroSettings(mixed $heroSettings): array
    {
        if (! is_array($heroSettings)) {
            return [];
        }

        if (array_is_list($heroSettings)) {
            $heroSettings = $heroSettings[0] ?? [];
        }

        if (! is_array($heroSettings)) {
            return [];
        }

        $heroSettings['image'] = $this->normalizeHeroImagePath($heroSettings['image'] ?? null);
        $heroSettings['image_mobile'] = $this->normalizeHeroImagePath($heroSettings['image_mobile'] ?? null);

        return $heroSettings;
    }

    protected function normalizeHomeCategoryImages(mixed $images): array
    {
        if (! is_array($images)) {
            return [];
        }

        return [
            'image_1' => $this->normalizeHeroImagePath($images['image_1'] ?? null),
            'image_2' => $this->normalizeHeroImagePath($images['image_2'] ?? null),
            'image_3' => $this->normalizeHeroImagePath($images['image_3'] ?? null),
            'image_4' => $this->normalizeHeroImagePath($images['image_4'] ?? null),
        ];
    }

    protected function normalizeHeroImagePath(mixed $path): ?string
    {
        if (! is_string($path) || $path === '') {
            return null;
        }

        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://') || str_starts_with($path, '/')) {
            return null;
        }

        return Storage::disk('public')->exists($path) ? $path : null;
    }
}
