<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Bus;
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
        return $this->belongsTo(NewsCategory::class);
    }
}
