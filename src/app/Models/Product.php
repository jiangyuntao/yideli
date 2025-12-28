<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use SoftDeletes;
    use HasTranslations;

    protected $guarded = [];

    protected $casts = [
        'name' => 'array', // 关键
        'content' => 'array',
        'specifications' => 'array',
        'is_visible' => 'boolean',
    ];

    public $translatable = ['name', 'slug', 'content', 'specifications'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function accessCodes(): BelongsToMany
    {
        return $this->belongsToMany(ProductAccessCode::class, 'product_access_code_product');
    }
}
