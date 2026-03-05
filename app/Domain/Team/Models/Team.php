<?php

namespace App\Domain\Team\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Model Team — mengelola data tim/anggota perusahaan.
 * Digunakan untuk menampilkan profil tim di halaman website.
 */
class Team extends Model
{
    protected $fillable = [
        'name',
        'role',
        'initial',
        'accent',
        'bio',
        'email',
        'phone',
        'linkedin',
        'instagram',
        'tiktok',
        'portfolio',
        'photo',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    // ── Scopes ──────────────────────────────────────────

    /**
     * Scope untuk hanya menampilkan anggota tim yang aktif.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope untuk mengurutkan berdasarkan kolom order.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order')->orderBy('created_at');
    }

    // ── Accessors ───────────────────────────────────────

    /**
     * Get full photo URL atau placeholder jika kosong.
     */
    public function getPhotoUrlAttribute()
    {
        if ($this->photo) {
            return asset('storage/' . $this->photo);
        }
        return null;
    }

    /**
     * Get accent class untuk gradient background.
     */
    public function getAccentClassAttribute()
    {
        return $this->accent ?: 'from-blue-500 to-indigo-600';
    }
}
