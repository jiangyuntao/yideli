<?php

namespace App\Filament\Resources\Enquiries\Schemas;

use Filament\Infolists\Components\KeyValueEntry;
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
                                TextEntry::make('subject')
                                    ->label('主题')
                                    ->weight('bold')
                                    ->size(TextSize::Large),

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
                                        TextEntry::make('ip_address')
                                            ->label('IP 地址')
                                            ->badge()
                                            ->color('gray'),
                                        TextEntry::make('created_at')
                                            ->label('创建时间')
                                            ->dateTime(),
                                    ]),

                                Section::make('元数据')
                                    ->schema([
                                        // 如果 meta_data 是简单的键值对
                                        KeyValueEntry::make('meta_data')
                                            ->label('元数据'),
                                    ])
                                    ->visible(fn($record) => !empty($record->meta_data)),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
