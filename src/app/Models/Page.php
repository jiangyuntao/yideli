<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Page extends Model
{
    use SoftDeletes;
    use HasTranslations;

    protected $guarded = [];

    public $translatable = ['title', 'content'];

    protected static function booted()
    {
        static::saved(function ($model) {
            // 防止死循环：只有当状态不是 'translating' 且不是 'completed' 时才触发
            // 或者你可以加一个额外的判断，比如只有当中文内容变动时才触发

            // 简单逻辑：只要是刚创建，或者状态被人工重置为 'pending'，就触发
            if ($model->wasRecentlyCreated || $model->translation_status === 'pending') {

                // 分发任务到队列
                \App\Jobs\AutoTranslateJob::dispatch($model);
            }
        });
    }
}
