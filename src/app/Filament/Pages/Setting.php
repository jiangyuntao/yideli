<?php

namespace App\Filament\Pages;

use App\Settings\GeneralSettings;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
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
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
