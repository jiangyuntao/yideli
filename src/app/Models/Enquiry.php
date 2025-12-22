<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enquiry extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'is_read' => 'boolean',
        'meta_data' => 'array', // 自动转为数组
    ];
}
