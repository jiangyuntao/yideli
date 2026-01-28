<?php

namespace App\Filament\Resources\Enquiries\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\TextSize;

class EnquiryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3)
                    ->schema([
                        // 左侧：主要内容 (占2列)
                        Section::make('详情')
                            ->columnSpan(2)
                            ->schema([
                                Grid::make(3)
                                    ->schema([
                                        TextEntry::make('meta_data.interest')
                                            ->label('意向领域')
                                            ->badge() // 核心：将数组显示为一个个徽章
                                            ->color('primary')
                                            ->separator(',') // 虽然用了 badge，但这有助于定义原始分割逻辑
                                            // 进阶：如果想把英文 value 翻译成中文显示
                                            ->formatStateUsing(fn(string $state): string => match ($state) {
                                                'oem' => 'OEM',
                                                'odm' => 'ODM',
                                                'notebook' => '笔记本',
                                                'diary' => '日记本',
                                                default => $state,
                                            }),
                                        TextEntry::make('ip_address')
                                            ->label('IP 地址')
                                            ->badge()
                                            ->color('gray'),
                                        TextEntry::make('created_at')
                                            ->label('创建时间')
                                            ->dateTime(),
                                    ]),

                                TextEntry::make('message')
                                    ->label('内容')
                                    ->markdown() // 支持换行显示
                                    ->prose(), // 更好的排版
                            ]),

                        // 右侧：元数据 (占1列)
                        Group::make()
                            ->columnSpan(1)
                            ->schema([
                                Section::make('发送者信息')
                                    ->schema([
                                        TextEntry::make('name')
                                            ->label('姓名')
                                            ->icon('heroicon-m-user'),
                                        TextEntry::make('email')
                                            ->label('Email')
                                            ->icon('heroicon-m-envelope')
                                            ->copyable(),
                                        TextEntry::make('meta_data.phone')
                                            ->label('电话')
                                            ->icon('heroicon-m-phone')
                                            ->copyable(),
                                        TextEntry::make('meta_data.company')
                                            ->label('公司')
                                            ->placeholder('未提供') // 如果是 null 显示占位符
                                            ->icon('heroicon-m-building-office'),
                                    ]),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
