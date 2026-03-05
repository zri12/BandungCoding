<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

/**
 * Database Seeder utama.
 * Menjalankan semua seeder domain secara berurutan.
 */
class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->call([
            SettingSeeder::class,
            ServiceSeeder::class,
            PortfolioSeeder::class,
            BlogSeeder::class,
            ClientSeeder::class,
        ]);
    }
}
