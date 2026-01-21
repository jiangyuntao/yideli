<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductAccessCode extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'expires_at' => 'datetime', // 自动转换为 Carbon 对象
        'usage_limit' => 'integer',
        'used_count' => 'integer',
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_access_code_product');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
