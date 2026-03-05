<?php

namespace App\Domain\Portfolio\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model Portfolio — merepresentasikan proyek/karya yang pernah dikerjakan.
 * Mendukung tech_stack JSON, featured flag, dan SEO slug.
 */
class Portfolio extends Model
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
        'client',
        'image',
        'thumbnail',
        'mobile_image',
        'gallery_image_1',
        'gallery_image_2',
        'gallery_image_3',
        'gallery_image_4',
        'gallery_image_5',
        'category',
        'challenge',
        'challenge_en',
        'solution',
        'solution_en',
        'result_metrics',
        'tech_stack',
        'url',
        'is_featured',
        'published_at',
    ];

    protected $casts = [
        'tech_stack'      => 'array',
        'result_metrics'  => 'array',
        'is_featured'     => 'boolean',
        'published_at'    => 'datetime',
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

    /**
     * Dapatkan challenge dalam bahasa yang sesuai dengan locale saat ini
     */
    public function getChallengeAttribute($value)
    {
        $locale = app()->getLocale();
        if ($locale === 'en' && !empty($this->attributes['challenge_en'])) {
            return $this->attributes['challenge_en'];
        }
        return $value;
    }

    /**
     * Dapatkan solution dalam bahasa yang sesuai dengan locale saat ini
     */
    public function getSolutionAttribute($value)
    {
        $locale = app()->getLocale();
        if ($locale === 'en' && !empty($this->attributes['solution_en'])) {
            return $this->attributes['solution_en'];
        }
        return $value;
    }

    // ── Scopes ──────────────────────────────────────────

    /**
     * Scope: hanya portfolio yang sudah dipublish.
     */
    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at')
                     ->where('published_at', '<=', now());
    }

    /**
     * Scope: hanya portfolio yang featured.
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope: urutkan dari terbaru.
     */
    public function scopeLatest($query)
    {
        return $query->orderBy('published_at', 'desc');
    }

    // ── Route Model Binding ─────────────────────────────

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
