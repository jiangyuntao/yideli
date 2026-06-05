<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use SoftDeletes;
    use HasTranslations;

    protected $guarded = [];

    public $translatable = ['name', 'slug', 'description'];

    protected static function booted()
    {
        static::saving(function ($model) {
            $model->fillMissingSlugTranslations('name');
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

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }
}
