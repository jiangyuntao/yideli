<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class ProductTag extends Model
{
    use HasTranslations;
    use SoftDeletes;

    protected $guarded = [];

    public array $translatable = ['name'];

    protected static function booted(): void
    {
        static::creating(function (self $tag): void {
            if (blank($tag->sort_order)) {
                $tag->sort_order = ((int) static::query()->max('sort_order')) + 1;
            }
        });
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_tag_product')
            ->withTimestamps();
    }
}
