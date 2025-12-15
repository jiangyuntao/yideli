<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Taxonomy extends Model
{
    protected $fillable = [
        'type',
        'parent_id',
        'sort',
    ];

    /* ================= Relations ================= */

    public function translations(): HasMany
    {
        return $this->hasMany(TaxonomyTranslation::class)
            ->orderBy('locale');
    }

    public function contents(): BelongsToMany
    {
        return $this->belongsToMany(Content::class);
    }

    /* ================= Attributes ================= */

    /**
     * Filament Select 显示名称
     */
    public function getLabelAttribute(): string
    {
        return $this->translations
            ->firstWhere('locale', app()->getLocale())
            ?->name
            ?? '[未翻译]';
    }
}
