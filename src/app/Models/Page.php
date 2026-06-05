<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

class Page extends Model
{
    use SoftDeletes;
    use HasTranslations;

    protected $guarded = [];

    public $translatable = ['title', 'slug', 'content'];

    protected static function booted()
    {
        static::creating(function ($model) {
            if (blank($model->sort_order)) {
                $model->sort_order = ((int) static::query()->max('sort_order')) + 1;
            }
        });

        static::saving(function ($model) {
            $model->fillMissingSlugTranslations('title');
        });
    }

    protected function fillMissingSlugTranslations(string $sourceField): void
    {
        foreach (['zh', 'en', 'fr', 'es', 'ru', 'ar'] as $locale) {
            $slug = $this->getTranslation('slug', $locale, false);
            $source = $this->getTranslation($sourceField, $locale, false);

            if (filled($slug) || ! is_string($source) || trim($source) === '') {
                continue;
            }

            $generatedSlug = Str::slug($source, '-', $locale);

            if ($generatedSlug !== '') {
                $this->setTranslation('slug', $locale, $generatedSlug);
            }
        }
    }
}
