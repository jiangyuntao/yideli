<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('用户信息')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                // 1. 姓名
                                TextInput::make('name')
                                    ->label('用户名')
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('password')
                                    ->label('密码')
                                    ->password() // 隐藏输入内容
                                    ->revealable() // 允许点击小眼睛查看
                                    ->maxLength(255)
                                    // 规则 A：仅在“创建”操作时必填
                                    ->required(fn(string $operation): bool => $operation === 'create')
                                    // 规则 B：如果输入了内容，则进行 Hash 加密；没输入则忽略
                                    ->dehydrateStateUsing(fn(string $state): string => Hash::make($state))
                                    // 规则 C：仅当字段被填充（有内容）时才更新到数据库
                                    // 这样在编辑时留空，就不会把数据库里的旧密码覆盖为空值
                                    ->dehydrated(fn(?string $state): bool => filled($state)),
                            ]),
                        Grid::make(2)
                            ->schema([
                                TextInput::make('email')
                                    ->label('Email')
                                    ->email()
                                    ->required()
                                    ->maxLength(255)
                                    // 确保邮箱唯一，但在编辑时忽略当前用户
                                    ->unique(ignoreRecord: true),

                                Select::make('roles')
                                    ->label('角色')
                                    ->relationship('roles', 'name') // 自动处理 Spatie 的多对多关联
                                    ->multiple() // 允许分配多个角色
                                    ->preload(), // 下拉预加载，体验更好
                            ]),

                    ])
                    ->columnSpanFull(),
            ]);
    }
}
