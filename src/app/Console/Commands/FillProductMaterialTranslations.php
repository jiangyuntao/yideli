<?php

namespace App\Console\Commands;

use App\Models\Product;
use App\Services\YoudaoTranslate;
use Illuminate\Console\Command;

class FillProductMaterialTranslations extends Command
{
    protected $signature = 'products:fill-material-translations
        {--product-id= : Only process a single product ID}
        {--dry-run : Preview missing translations without saving}';

    protected $description = 'Fill missing translated material values for products';

    protected array $targetLocales = ['en', 'fr', 'es', 'ru', 'ar'];

    public function handle(YoudaoTranslate $translator): int
    {
        $productId = $this->option('product-id');
        $dryRun = (bool) $this->option('dry-run');

        $query = Product::query()->orderBy('id');

        if ($productId !== null) {
            $query->whereKey($productId);
        }

        $products = $query->get();

        if ($products->isEmpty()) {
            $this->warn('No products found.');

            return self::SUCCESS;
        }

        $updatedProducts = 0;
        $filledTranslations = 0;

        foreach ($products as $product) {
            $sourceLocale = $this->resolveSourceLocale($product);

            if ($sourceLocale === null) {
                $this->line("Skipping product #{$product->id}: no material source text.");
                continue;
            }

            $sourceText = trim((string) $product->getTranslation('material', $sourceLocale, false));

            if ($sourceText === '') {
                $this->line("Skipping product #{$product->id}: empty source material.");
                continue;
            }

            $hasChanges = false;

            foreach ($this->targetLocales as $locale) {
                if ($locale === $sourceLocale) {
                    continue;
                }

                $existing = $product->getTranslation('material', $locale, false);

                if (filled($existing)) {
                    continue;
                }

                $translated = $translator->translate($sourceText, $sourceLocale === 'zh' ? 'zh-CHS' : $sourceLocale, $locale);

                if (! is_string($translated) || trim($translated) === '') {
                    $this->warn("Failed translating product #{$product->id} material to {$locale}.");
                    continue;
                }

                $translated = trim($translated);
                $filledTranslations++;
                $hasChanges = true;

                $this->line("Product #{$product->id}: {$sourceLocale} -> {$locale} | {$sourceText} => {$translated}");

                if (! $dryRun) {
                    $product->setTranslation('material', $locale, $translated);
                }

                sleep(1);
            }

            if ($hasChanges) {
                $updatedProducts++;

                if (! $dryRun) {
                    $product->saveQuietly();
                }
            }
        }

        $mode = $dryRun ? 'Dry run complete' : 'Done';
        $this->info("{$mode}. Updated products: {$updatedProducts}; filled translations: {$filledTranslations}.");

        return self::SUCCESS;
    }

    protected function resolveSourceLocale(Product $product): ?string
    {
        $candidateLocales = ['zh', 'en', 'fr', 'es', 'ru', 'ar'];

        foreach ($candidateLocales as $locale) {
            $value = $product->getTranslation('material', $locale, false);

            if (filled($value)) {
                return $locale;
            }
        }

        return null;
    }
}
