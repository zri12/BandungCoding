<?php

namespace App\Domain\Blog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model Blog — artikel/konten blog perusahaan.
 * Mendukung SEO meta fields, tags JSON, dan publish scheduling.
 */
class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'title_en',
        'slug',
        'excerpt',
        'excerpt_en',
        'content',
        'content_en',
        'image',
        'author',
        'category',
        'tags',
        'meta_title',
        'meta_title_en',
        'meta_description',
        'meta_description_en',
        'is_published',
        'published_at',
    ];

    protected $casts = [
        'tags'         => 'array',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    // ── Accessor Methods untuk Multi-Language Soporte ───

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
     * Dapatkan content dalam bahasa yang sesuai dengan locale saat ini
     */
    public function getContentAttribute($value)
    {
        $locale = app()->getLocale();
        if ($locale === 'en' && !empty($this->attributes['content_en'])) {
            return $this->attributes['content_en'];
        }
        return $value;
    }

    /**
     * Dapatkan meta_title dalam bahasa yang sesuai dengan locale saat ini
     */
    public function getMetaTitleAttribute($value)
    {
        $locale = app()->getLocale();
        if ($locale === 'en' && !empty($this->attributes['meta_title_en'])) {
            return $this->attributes['meta_title_en'];
        }
        return $value;
    }

    /**
     * Dapatkan meta_description dalam bahasa yang sesuai dengan locale saat ini
     */
    public function getMetaDescriptionAttribute($value)
    {
        $locale = app()->getLocale();
        if ($locale === 'en' && !empty($this->attributes['meta_description_en'])) {
            return $this->attributes['meta_description_en'];
        }
        return $value;
    }

    // ── Scopes ──────────────────────────────────────────

    /**
     * Scope: hanya blog yang sudah dipublish.
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true)
                     ->whereNotNull('published_at')
                     ->where('published_at', '<=', now());
    }

    /**
     * Scope: urutkan dari terbaru.
     */
    public function scopeLatest($query)
    {
        return $query->orderBy('published_at', 'desc');
    }

    /**
     * Scope: filter berdasarkan kategori.
     */
    public function scopeByCategory($query, string $category)
    {
        return $query->where('category', $category);
    }

    // ── Route Model Binding ─────────────────────────────

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
