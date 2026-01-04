<?php

namespace App\Filament\Pages;

use App\Settings\GeneralSettings;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class Setting extends SettingsPage
{
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?int $navigationSort = 10;
    protected static ?string $navigationLabel = '系统设置';
    protected static ?string $title = '系统设置';

    protected static string $settings = GeneralSettings::class;

    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Grid::make(3) // 整体 3 列布局
                    ->schema([
                        // --- 左侧：主要设置 ---
                        Section::make('基础信息')
                            ->columnSpan(2)
                            ->schema([
                                TextInput::make('site_name')
                                    ->label('网站名称')
                                    ->required(),

                                Textarea::make('site_description')
                                    ->label('网站描述')
                                    ->rows(3)
                                    ->helperText('用于 SEO Meta Description'),

                                TextInput::make('site_keywords')
                                    ->label('SEO 关键词')
                                    ->placeholder('笔记本, 销售, 服务'),

                                Toggle::make('is_active')
                                    ->label('网站开启状态')
                                    ->helperText('关闭后前台将显示维护中')
                                    ->default(true),
                            ]),

                        // --- 右侧：图片与联系 ---
                        Section::make('外观与联系')
                            ->columnSpan(1)
                            ->schema([
                                FileUpload::make('site_logo')
                                    ->label('网站 Logo')
                                    ->image()
                                    ->directory('settings') // 图片存放在 storage/app/public/settings
                                    ->visibility('public'), // 确保公开可见

                                FileUpload::make('site_favicon')
                                    ->label('浏览器图标 (Favicon)')
                                    ->image()
                                    ->directory('settings')
                                    ->visibility('public'),

                                TextInput::make('contact_email')
                                    ->label('联系邮箱')
                                    ->email(),
                                TextInput::make('contact_address')
                                    ->label('地址'),
                                TextInput::make('contact_phone')
                                    ->label('联系电话')
                                    ->tel(),
                                TextInput::make('contact_linkedin')
                                    ->label('LinkedIn 账号'),
                                TextInput::make('contact_whatsapp')
                                    ->label('WhatsApp 账号'),
                            ]),
                    ])
                    ->columnSpanFull(),

                Section::make('轮播图设置')
                    ->columnSpan(2)
                    ->schema([
                        Repeater::make('home_carousel') // 存入数据库的字段名
                            ->label('首页轮播图配置')
                            ->schema([
                                // 1. 上传图片
                                FileUpload::make('image')
                                    ->label('轮播图片')
                                    ->image()
                                    ->directory('carousel') // 图片存放在 storage/app/public/carousel
                                    ->disk('public')
                                    ->required()
                                    ->columnSpanFull(),

                                // 2. 标题（可选）
                                TextInput::make('title')
                                    ->label('显示标题')
                                    ->columnSpan(2),

                                // 5. 外部链接输入框 (仅当类型为 url 时显示)
                                TextInput::make('custom_url')
                                    ->label('输入链接地址')
                                    ->placeholder('https://...')
                                    ->required()
                                    ->columnSpan(1),

                                Select::make('in_new_windows')
                                    ->label('是否在新窗口打开')
                                    ->options([
                                        '1' => '是',
                                        '0' => '否',
                                    ])
                                    ->default('0')
                                    ->native(false)
                                    ->columnSpan(1),
                            ])
                            ->columns(2) // 布局为两列
                            ->grid(1) // 列表显示模式
                            ->itemLabel(fn(array $state): ?string => $state['title'] ?? null) // 折叠时显示标题
                            ->collapsible(),
                    ]),
            ]);
    }
}
