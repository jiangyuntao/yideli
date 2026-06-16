<?php

namespace App\Filament\Resources\Pages\Schemas;

use App\Exceptions\TranslationException;
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
use Illuminate\Support\Facades\Log;
use Illuminate\Support\HtmlString;
use Outerweb\FilamentTranslatableFields\Filament\Plugins\FilamentTranslatableFieldsPlugin;
use Throwable;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('基础信息')
                    ->description('多语言内容可手动填写；点击“翻译”统一补全页面字段。')
                    ->headerActions([
                        static::makeTranslateAllAction(),
                    ])
                    ->schema([
                        static::makeTranslatableField(
                            TextInput::make('title')
                                ->label('标题')
                                ->validationAttribute('标题（简体中文）')
                                ->helperText('可按语言手动填写；也可点击上方“翻译”补全其他语言')
                                ->maxLength(255),
                            localeSpecificRules: [
                                'zh' => 'required',
                            ],
                            markRequiredLocale: 'zh',
                        ),

                        static::makeTranslatableField(
                            TextInput::make('slug')
                                ->label('美化URL')
                                ->helperText('可按语言手动填写；留空时系统会根据对应语言的标题自动生成，也可点击上方“翻译”立即生成')
                                ->maxLength(255),
                        ),

                        static::makeTranslatableField(
                            RichEditor::make('content')
                                ->label('正文内容')
                                ->helperText('可按语言手动填写；也可点击上方“翻译”补全其他语言'),
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
        return Action::make('translate_page_fields')
            ->label('翻译')
            ->icon('heroicon-o-language')
            ->color('success')
            ->action(function (Get $get, Set $set, ProductFormTranslationService $translationService): void {
                try {
                    $updatedCount = 0;
                    $fields = ['title', 'slug', 'content'];

                    foreach ($fields as $field) {
                        $result = $translationService->translateField(
                            field: $field,
                            translations: $get($field),
                            slugTranslations: $get('slug'),
                            sourceTranslations: $get('title'),
                        );

                        $set($field, $result['value']);
                        $updatedCount += $result['updated_count'];

                        foreach ($result['extra'] as $extraField => $extraValue) {
                            $set($extraField, $extraValue);
                        }
                    }

                    if ($updatedCount === 0) {
                        Notification::make()
                            ->title('没有可补全的翻译内容')
                            ->warning()
                            ->send();

                        return;
                    }

                    Notification::make()
                        ->title('翻译已回填')
                        ->body("本次更新 {$updatedCount} 项内容")
                        ->success()
                        ->send();
                } catch (TranslationException $exception) {
                    Notification::make()
                        ->title('翻译失败')
                        ->body($exception->getMessage())
                        ->danger()
                        ->send();
                } catch (Throwable $exception) {
                    Log::error('Page bulk translation failed.', [
                        'fields' => ['title', 'slug', 'content'],
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
