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

    /** In-memory cache: key → value. Loaded all at once on first access. */
    private static array $cache = [];
    private static bool  $loaded = false;

    // ── Helper Methods ──────────────────────────────────

    /**
     * Load semua settings sekaligus (1 DB query) lalu cache di static array.
     */
    private static function loadAll(): void
    {
        if (self::$loaded) {
            return;
        }
        foreach (static::all(['key', 'value']) as $row) {
            self::$cache[$row->key] = $row->value;
        }
        self::$loaded = true;
    }

    /**
     * Ambil nilai setting berdasarkan key (dari static cache, 1 DB query total).
     */
    public static function getValue(string $key, $default = null): mixed
    {
        self::loadAll();
        return array_key_exists($key, self::$cache)
            ? self::$cache[$key]
            : $default;
    }

    /**
     * Set nilai setting berdasarkan key (update DB + invalidate cache).
     */
    public static function setValue(string $key, string $value, string $group = 'general'): void
    {
        static::updateOrCreate(
            ['key' => $key],
            ['value' => $value, 'group' => $group]
        );
        // Invalidate agar request berikutnya reload dari DB
        self::$cache[$key] = $value;
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
