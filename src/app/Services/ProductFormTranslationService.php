<?php

namespace App\Services;

use Illuminate\Support\Str;

class ProductFormTranslationService
{
    public const SUPPORTED_LOCALES = ['zh', 'en', 'ru', 'es', 'fr', 'ar'];

    public const TRANSLATABLE_FIELDS = [
        'name',
        'title',
        'description',
        'excerpt',
        'content',
        'material',
        'size',
        'inner_page_color',
        'inner_page_paper_weight',
        'inner_page_sheet_count',
        'moq',
        'lead_time',
        'tags',
        'seo_title',
        'seo_description',
        'seo_keywords',
    ];

    public function __construct(
        protected YoudaoTranslate $translator,
    ) {}

    public function translateField(
        string $field,
        mixed $translations,
        ?array $nameTranslations = null,
        ?array $slugTranslations = null,
        bool $overwrite = false,
        ?array $sourceTranslations = null,
    ): array {
        if ($field === 'slug') {
            [$data, $updatedCount] = $this->fillSlugTranslations([
                'name' => is_array($sourceTranslations)
                    ? $sourceTranslations
                    : (is_array($nameTranslations) ? $nameTranslations : []),
                'slug' => is_array($translations) ? $translations : [],
            ], $overwrite);

            return [
                'value' => $data['slug'] ?? [],
                'extra' => [],
                'updated_count' => $updatedCount,
            ];
        }

        if (! is_array($translations)) {
            return [
                'value' => $translations,
                'extra' => [],
                'updated_count' => 0,
            ];
        }

        [$translatedTranslations, $updatedCount] = $this->translateTranslations($translations, $overwrite);
        $extra = [];

        if (in_array($field, ['name', 'title'], true)) {
            [$data, $slugUpdates] = $this->fillSlugTranslations([
                'name' => $translatedTranslations,
                'slug' => is_array($slugTranslations) ? $slugTranslations : [],
            ], $overwrite);

            $extra['slug'] = $data['slug'] ?? [];
            $updatedCount += $slugUpdates;
        }

        return [
            'value' => $translatedTranslations,
            'extra' => $extra,
            'updated_count' => $updatedCount,
        ];
    }

    public function translate(array $data, bool $overwrite = false): array
    {
        $updatedCount = 0;

        foreach (self::TRANSLATABLE_FIELDS as $field) {
            $translations = $data[$field] ?? null;

            $result = $this->translateField(
                field: $field,
                translations: $translations,
                nameTranslations: $data['name'] ?? null,
                slugTranslations: $data['slug'] ?? null,
                overwrite: $overwrite,
            );

            $data[$field] = $result['value'];
            $updatedCount += $result['updated_count'];

            foreach ($result['extra'] as $extraField => $extraValue) {
                $data[$extraField] = $extraValue;
            }
        }

        return [
            'data' => $data,
            'updated_count' => $updatedCount,
        ];
    }

    protected function translateTranslations(array $translations, bool $overwrite): array
    {
        $updatedCount = 0;
        $sourceLocale = $this->resolveSourceLocale($translations);

        if ($sourceLocale === null) {
            return [$translations, $updatedCount];
        }

        $sourceValue = $translations[$sourceLocale] ?? null;

        foreach (self::SUPPORTED_LOCALES as $targetLocale) {
            if ($targetLocale === $sourceLocale) {
                continue;
            }

            $existingValue = $translations[$targetLocale] ?? null;

            if (! $overwrite && $this->hasContent($existingValue)) {
                continue;
            }

            $translatedValue = $this->translateValue($sourceValue, $sourceLocale, $targetLocale);

            if (! $this->hasContent($translatedValue) || $translatedValue === $existingValue) {
                continue;
            }

            $translations[$targetLocale] = $translatedValue;
            $updatedCount++;
        }

        return [$translations, $updatedCount];
    }

    protected function fillSlugTranslations(array $data, bool $overwrite): array
    {
        $nameTranslations = $data['name'] ?? null;
        $slugTranslations = $data['slug'] ?? [];
        $updatedCount = 0;

        if (! is_array($nameTranslations)) {
            return [$data, $updatedCount];
        }

        if (! is_array($slugTranslations)) {
            $slugTranslations = [];
        }

        foreach (self::SUPPORTED_LOCALES as $locale) {
            $name = $nameTranslations[$locale] ?? null;
            $existingSlug = $slugTranslations[$locale] ?? null;

            if (! is_string($name) || trim($name) === '') {
                continue;
            }

            if (! $overwrite && $this->hasContent($existingSlug)) {
                continue;
            }

            $slug = Str::slug($name, '-', $locale);

            if ($slug === '' || $slug === $existingSlug) {
                continue;
            }

            $slugTranslations[$locale] = $slug;
            $updatedCount++;
        }

        $data['slug'] = $slugTranslations;

        return [$data, $updatedCount];
    }

    protected function translateValue(mixed $value, string $sourceLocale, string $targetLocale): mixed
    {
        if (is_string($value)) {
            $translated = $this->translator->translate(
                $value,
                $this->mapLocale($sourceLocale),
                $this->mapLocale($targetLocale),
            );

            return is_string($translated) ? trim($translated) : $value;
        }

        if (! is_array($value)) {
            return $value;
        }

        $translated = [];

        foreach ($value as $key => $item) {
            if (! is_string($item) || trim($item) === '') {
                $translated[$key] = $item;

                continue;
            }

            $translatedItem = $this->translator->translate(
                $item,
                $this->mapLocale($sourceLocale),
                $this->mapLocale($targetLocale),
            );

            $translated[$key] = is_string($translatedItem) ? trim($translatedItem) : $item;
        }

        return $translated;
    }

    protected function resolveSourceLocale(array $translations): ?string
    {
        foreach (self::SUPPORTED_LOCALES as $locale) {
            if ($this->hasContent($translations[$locale] ?? null)) {
                return $locale;
            }
        }

        return null;
    }

    protected function hasContent(mixed $value): bool
    {
        if (is_string($value)) {
            return trim($value) !== '';
        }

        if (! is_array($value)) {
            return false;
        }

        foreach ($value as $item) {
            if ($this->hasContent($item)) {
                return true;
            }
        }

        return false;
    }

    protected function mapLocale(string $locale): string
    {
        return $locale === 'zh' ? 'zh-CHS' : $locale;
    }
}
