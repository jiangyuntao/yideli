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
}
