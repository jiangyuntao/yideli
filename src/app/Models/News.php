<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

class News extends Model
{
    use SoftDeletes;
    use HasTranslations;

    protected $guarded = [];

    protected $casts = [
        'is_featured' => 'boolean',
        'published_at' => 'datetime',
        'tags' => 'array', // 自动转为数组
    ];

    // 定义多语言字段
    public $translatable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'tags',
        'seo_title',
        'seo_description',
        'seo_keywords',
    ];

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

    public function category()
    {
        return $this->belongsTo(NewsCategory::class);
    }
}
