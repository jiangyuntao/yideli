<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class ContentTranslation extends Model
{
    protected $fillable = [
        'content_id',
        'locale',
        'title',
        'slug',
        'excerpt',
        'body',
        'seo_title',
        'seo_description',
        'status',
    ];

    /* ================= Relations ================= */

    public function content(): BelongsTo
    {
        return $this->belongsTo(Content::class);
    }

    /* ================= Scopes ================= */

    public function scopeLocale(Builder $query, string $locale): Builder
    {
        return $query->where('locale', $locale);
    }

    public function scopeVisible(Builder $query): Builder
    {
        return $query->where('status', 'published');
    }

    /* ================= Attributes ================= */

    /**
     * Filament Table 状态 badge
     */
    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'published' => '已发布',
            default => '草稿',
        };
    }
}
