<?php

namespace App\Domain\Contact\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Model Contact — menyimpan pesan dari form kontak.
 * Mendukung tracking status baca dan balasan.
 */
class Contact extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'is_read',
        'replied_at',
    ];

    protected $casts = [
        'is_read'    => 'boolean',
        'replied_at' => 'datetime',
    ];

    // ── Scopes ──────────────────────────────────────────

    /**
     * Scope: pesan yang belum dibaca.
     */
    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }

    /**
     * Scope: urutkan dari terbaru.
     */
    public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}
