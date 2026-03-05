<?php

namespace App\Domain\Setting\Services;

use App\Domain\Setting\Models\Setting;
use Illuminate\Database\Eloquent\Collection;

/**
 * Service layer untuk domain Setting.
 * Mengelola konfigurasi dinamis perusahaan.
 */
class SettingService
{
    /**
     * Ambil nilai setting berdasarkan key.
     */
    public function get(string $key, $default = null): mixed
    {
        return Setting::getValue($key, $default);
    }

    /**
     * Set nilai setting.
     */
    public function set(string $key, string $value, string $group = 'general'): void
    {
        Setting::setValue($key, $value, $group);
    }

    /**
     * Ambil semua setting dalam satu group.
     */
    public function getByGroup(string $group): Collection
    {
        return Setting::byGroup($group)->get();
    }

    /**
     * Ambil semua setting sebagai key-value array.
     */
    public function getAllAsArray(): array
    {
        return Setting::all()->pluck('value', 'key')->toArray();
    }
}
