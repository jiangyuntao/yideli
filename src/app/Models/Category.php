<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Bus;
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
            if ($model->isDirty('name') || $model->isDirty('description')) {
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

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }
}
