<?php

namespace App\Filament\Resources\ProductTags\Schemas;

use App\Services\ProductFormTranslationService;
use Filament\Actions\Action;
use Filament\Forms\Components\Field;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\FusedGroup;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;

class ProductTagForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('标签信息')
                    ->description('标签名称支持多语言，列表可拖拽排序。')
                    ->schema([
                        static::makeTranslatableField(
                            TextInput::make('name')
                                ->label('标签名称')
                                ->helperText('可按语言手动填写；也可点击“翻译”补全其他语言')
                                ->maxLength(255),
                            localeSpecificRules: [
                                'zh' => 'required',
                            ],
                        ),
                    ]),
            ]);
    }

    protected static function makeTranslatableField(Field $field, ?array $localeSpecificRules = null): FusedGroup
    {
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
                    ->action(function (Get $get, Set $set, ProductFormTranslationService $translationService) use ($name): void {
                        $result = $translationService->translateField(
                            field: $name,
                            translations: $get($name),
                            sourceTranslations: $get($name),
                        );

                        $set($name, $result['value']);

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
