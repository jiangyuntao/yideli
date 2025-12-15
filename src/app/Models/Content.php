<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Builder;

class Content extends Model
{
    protected $fillable = [
        'type',
        'status',
        'author_id',
        'publish_at',
    ];

    protected $casts = [
        'publish_at' => 'datetime',
    ];

    /* ================= Relations ================= */

    public function translations(): HasMany
    {
        return $this->hasMany(ContentTranslation::class)
            ->orderBy('locale');
    }

    /**
     * Filament 列表中显示“已有语言数”
     */
    public function publishedTranslations(): HasMany
    {
        return $this->translations()->where('status', 'published');
    }

    public function taxonomies(): BelongsToMany
    {
        return $this->belongsToMany(Taxonomy::class)
            ->withTimestamps();
    }

    /* ================= Scopes ================= */

    public function scopeVisible(Builder $query): Builder
    {
        return $query
            ->where('status', 'published')
            ->where(
                fn($q) =>
                $q->whereNull('publish_at')
                    ->orWhere('publish_at', '<=', now())
            );
    }

    /* ================= Attributes ================= */

    /**
     * Filament Table 用：内容状态标签
     */
    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'published' => '已发布',
            default => '草稿',
        };
    }
}
