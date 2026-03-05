<?php

namespace App\Domain\Client\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Model Client — mengelola data klien/partner perusahaan.
 * Digunakan untuk showcase klien di halaman website.
 */
class Client extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'logo',
        'website',
        'email',
        'phone',
        'is_featured',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];

    // ── Mutators ────────────────────────────────────────

    /**
     * Buat slug otomatis saat set name.
     */
    protected static function booted()
    {
        static::creating(function ($model) {
            if (!$model->slug) {
                $model->slug = Str::slug($model->name);
            }
        });

        static::updating(function ($model) {
            if ($model->isDirty('name')) {
                $model->slug = Str::slug($model->name);
            }
        });
    }

    // ── Scopes ──────────────────────────────────────────

    /**
     * Filter klien yang featured.
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Filter klien yang aktif/non-featured.
     */
    public function scopeActive($query)
    {
        return $query->where('is_featured', false);
    }
}
