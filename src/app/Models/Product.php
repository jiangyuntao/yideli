<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Bus;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use SoftDeletes;
    use HasTranslations;

    protected $guarded = [];

    protected $casts = [
        'images' => 'array',
        'is_visible' => 'boolean',
    ];

    public $translatable = ['name', 'slug', 'description', 'content', 'specifications', 'material', 'size', 'inner_pages', 'moq', 'lead_time', 'tags'];

    protected static function booted()
    {
        static::saving(function ($model) {
            if ($model->isDirty($model->translatable)) {
                $model->translation_status = 'pending';
            }

            if ($model->wasRecentlyCreated || $model->translation_status === 'pending') {

                // 分发任务到队列
                Bus::chain([
                    new \App\Jobs\AutoTranslateJob($model),
                    new \App\Jobs\AutoFillSlug($model),
                ])->dispatch();
            }
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function relatedProducts()
    {
        return $this->belongsToMany(
            Product::class,
            'product_related', // 中间表名
            'product_id',      // 当前模型外键
            'related_product_id' // 关联模型外键
        );
    }

    public function accessCodes(): BelongsToMany
    {
        return $this->belongsToMany(ProductAccessCode::class, 'product_access_code_product');
    }

    public function coverImage(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->images[0] ?? null,
        );
    }

    protected function routeSlug(): Attribute
    {
        return Attribute::make(
            get: function () {
                $currentLocale = App::currentLocale();

                return $this->getTranslation('slug', $currentLocale, false)
                    ?: $this->getTranslation('slug', 'en', false)
                    ?: (string) $this->getKey();
            },
        );
    }
}
