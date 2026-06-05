<?php

namespace App\Filament\Resources\Pages\Schemas;

use App\Services\ProductFormTranslationService;
use Filament\Actions\Action;
use Filament\Forms\Components\Field;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\FusedGroup;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('基础信息')
                    ->description('多语言内容可手动填写；每个字段都可单独点击“翻译”补全其他语言。')
                    ->schema([
                        static::makeTranslatableField(
                            TextInput::make('title')
                                ->label('标题')
                                ->helperText('可按语言手动填写；也可点击“翻译”补全其他语言')
                                ->maxLength(255),
                            localeSpecificRules: [
                                'zh' => 'required',
                            ],
                            sourceField: 'title',
                        ),

                        static::makeTranslatableField(
                            TextInput::make('slug')
                                ->label('美化URL')
                                ->helperText('可按语言手动填写；留空时系统会根据对应语言的标题自动生成，也可点击“翻译”立即生成')
                                ->maxLength(255),
                            sourceField: 'title',
                        ),

                        static::makeTranslatableField(
                            RichEditor::make('content')
                                ->label('正文内容')
                                ->helperText('可按语言手动填写；也可点击“翻译”补全其他语言'),
                            sourceField: 'title',
                        ),

                        TextInput::make('sort_order')
                            ->label('排序')
                            ->numeric()
                            ->default(0)
                            ->helperText('数值越小，排序越靠前。'),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    protected static function makeTranslatableField(
        Field $field,
        ?array $localeSpecificRules = null,
        string $sourceField = 'title',
    ): FusedGroup {
        $name = $field->getName();

        return FusedGroup::make([
            $field
                ->hiddenLabel()
                ->translatable(true, null, $localeSpecificRules),
        ])
            ->label($field->getLabel())
            ->afterLabel([
                Action::make("translate_{$name}")
                    ->label('翻译')
                    ->icon('heroicon-o-language')
                    ->color('success')
                    ->action(function (Get $get, Set $set, ProductFormTranslationService $translationService) use ($name, $sourceField): void {
                        $result = $translationService->translateField(
                            field: $name,
                            translations: $get($name),
                            slugTranslations: $get('slug'),
                            sourceTranslations: $get($sourceField),
                        );

                        $set($name, $result['value']);

                        foreach ($result['extra'] as $extraField => $extraValue) {
                            $set($extraField, $extraValue);
                        }

                        if ($result['updated_count'] === 0) {
                            Notification::make()
                                ->title('没有可补全的翻译内容')
                                ->warning()
                                ->send();

                            return;
                        }

                        Notification::make()
                            ->title('翻译已回填')
                            ->body("本次更新 {$result['updated_count']} 项内容")
                            ->success()
                            ->send();
                    }),
            ]);
    }
}
