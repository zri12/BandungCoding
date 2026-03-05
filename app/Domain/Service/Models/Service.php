<?php

namespace App\Domain\Service\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model Service — merepresentasikan layanan yang ditawarkan perusahaan.
 * Mendukung slug untuk SEO-friendly URL dan sortable ordering.
 */
class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'title_en',
        'slug',
        'excerpt',
        'excerpt_en',
        'description',
        'description_en',
        'icon',
        'image',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    // ── Accessor Methods untuk Multi-Language Support ───

    /**
     * Dapatkan title dalam bahasa yang sesuai dengan locale saat ini
     */
    public function getTitleAttribute($value)
    {
        $locale = app()->getLocale();
        if ($locale === 'en' && !empty($this->attributes['title_en'])) {
            return $this->attributes['title_en'];
        }
        return $value;
    }

    /**
     * Dapatkan excerpt dalam bahasa yang sesuai dengan locale saat ini
     */
    public function getExcerptAttribute($value)
    {
        $locale = app()->getLocale();
        if ($locale === 'en' && !empty($this->attributes['excerpt_en'])) {
            return $this->attributes['excerpt_en'];
        }
        return $value;
    }

    /**
     * Dapatkan description dalam bahasa yang sesuai dengan locale saat ini
     */
    public function getDescriptionAttribute($value)
    {
        $locale = app()->getLocale();
        if ($locale === 'en' && !empty($this->attributes['description_en'])) {
            return $this->attributes['description_en'];
        }
        return $value;
    }

    // ── Scopes ──────────────────────────────────────────

    /**
     * Scope: hanya ambil layanan yang aktif.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope: urutkan berdasarkan sort_order.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc');
    }

    // ── Route Model Binding ─────────────────────────────

    /**
     * Gunakan slug untuk route model binding.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
