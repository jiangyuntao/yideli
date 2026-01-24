<?php

namespace App\Filament\Resources\LanguageLines\Schemas;

use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class LanguageLineForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('翻译')
                    ->schema([
                        TextInput::make('group')
                            ->label('分组')
                            ->placeholder('例如: menu, buttons, home_page')
                            ->required()
                            ->datalist(['menu', 'buttons', 'validation', 'footer']), // 常用提示

                        TextInput::make('key')
                            ->label('键名')
                            ->placeholder('例如: contact_us')
                            ->required(),

                        // 这里使用 KeyValue 组件来显示所有语言的翻译
                        // 但为了方便录入，我们主要关注中文，后面加按钮自动翻译
                        KeyValue::make('text')
                            ->label('多语言内容')
                            ->helperText('填入中文后，保存并在列表页点击“AI 翻译”即可生成其他语言。')
                            ->keyLabel('语言代码 (zh, en...)')
                            ->valueLabel('翻译内容')
                            ->default(['zh' => '']) // 默认给个中文坑位
                            ->required(),
                    ])
                    ->columnSpanFull()
            ]);
    }
}
