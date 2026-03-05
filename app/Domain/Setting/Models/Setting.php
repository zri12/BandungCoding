<?php

namespace App\Domain\Setting\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Model Setting — key-value store untuk konfigurasi dinamis.
 * Digunakan untuk setting company profile yang bisa diubah dari admin.
 * Siap multi-tenant untuk SaaS.
 */
class Setting extends Model
{
    protected $fillable = [
        'key',
        'value',
        'group',
    ];

    public $timestamps = false;

    // ── Helper Methods ──────────────────────────────────

    /**
     * Ambil nilai setting berdasarkan key.
     */
    public static function getValue(string $key, $default = null): mixed
    {
        $setting = static::where('key', $key)->first();

        return $setting ? $setting->value : $default;
    }

    /**
     * Set nilai setting berdasarkan key.
     */
    public static function setValue(string $key, string $value, string $group = 'general'): void
    {
        static::updateOrCreate(
            ['key' => $key],
            ['value' => $value, 'group' => $group]
        );
    }

    // ── Scopes ──────────────────────────────────────────

    /**
     * Scope: filter berdasarkan group.
     */
    public function scopeByGroup($query, string $group)
    {
        return $query->where('group', $group);
    }
}
