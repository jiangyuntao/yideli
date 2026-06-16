<?php

namespace App\Filament\Resources\ProductTags\Schemas;

use App\Exceptions\TranslationException;
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
use Illuminate\Support\Facades\Log;
use Illuminate\Support\HtmlString;
use Outerweb\FilamentTranslatableFields\Filament\Plugins\FilamentTranslatableFieldsPlugin;
use Throwable;

class ProductTagForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('标签信息')
                    ->description('标签名称支持多语言；点击“翻译”统一补全其他语言。')
                    ->headerActions([
                        static::makeTranslateAllAction(),
                    ])
                    ->schema([
                        static::makeTranslatableField(
                            TextInput::make('name')
                                ->label('标签名称')
                                ->validationAttribute('标签名称（简体中文）')
                                ->helperText('可按语言手动填写；也可点击上方“翻译”补全其他语言')
                                ->maxLength(255),
                            localeSpecificRules: [
                                'zh' => 'required',
                            ],
                            markRequiredLocale: 'zh',
                        ),
                    ]),
            ]);
    }

    protected static function makeTranslatableField(
        Field $field,
        ?array $localeSpecificRules = null,
        ?string $markRequiredLocale = null,
    ): FusedGroup {
        return FusedGroup::make([
            $field
                ->hiddenLabel()
                ->translatable(
                    true,
                    static::getTranslatableLocaleLabels($markRequiredLocale),
                    $localeSpecificRules,
                ),
        ])
            ->label($field->getLabel());
    }

    protected static function getTranslatableLocaleLabels(?string $markRequiredLocale = null): array
    {
        $labels = FilamentTranslatableFieldsPlugin::get()->getSupportedLocales();

        if ($markRequiredLocale === null || ! array_key_exists($markRequiredLocale, $labels)) {
            return $labels;
        }

        $labels[$markRequiredLocale] = static::makeRequiredLabel((string) $labels[$markRequiredLocale]);

        return $labels;
    }

    protected static function makeRequiredLabel(string $label): HtmlString
    {
        return new HtmlString(sprintf(
            '%s<sup class="fi-fo-field-label-required-mark" style="color: red;">*</sup>',
            e($label),
        ));
    }

    protected static function makeTranslateAllAction(): Action
    {
        return Action::make('translate_product_tag_fields')
            ->label('翻译')
            ->icon('heroicon-o-language')
            ->color('success')
            ->action(function (Get $get, Set $set, ProductFormTranslationService $translationService): void {
                try {
                    $result = $translationService->translateField(
                        field: 'name',
                        translations: $get('name'),
                        sourceTranslations: $get('name'),
                    );

                    $set('name', $result['value']);

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
                } catch (TranslationException $exception) {
                    Notification::make()
                        ->title('翻译失败')
                        ->body($exception->getMessage())
                        ->danger()
                        ->send();
                } catch (Throwable $exception) {
                    Log::error('Product tag bulk translation failed.', [
                        'field' => 'name',
                        'exception' => $exception,
                    ]);

                    Notification::make()
                        ->title('翻译失败')
                        ->body('翻译服务暂时不可用，请稍后重试。')
                        ->danger()
                        ->send();
                }
            });
    }
}
