<?php

namespace Database\Seeders;

use App\Domain\Portfolio\Models\Portfolio;
use Illuminate\Database\Seeder;

/**
 * Seeder untuk data portfolio contoh.
 */
class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        $portfolios = [
            [
                'title'        => 'E-Commerce Platform',
                'slug'         => 'e-commerce-platform',
                'excerpt'      => 'Platform e-commerce modern dengan fitur lengkap untuk UMKM.',
                'description'  => 'Membangun platform e-commerce full-featured dengan payment gateway, inventory management, dan analytics dashboard.',
                'client'       => 'PT Maju Jaya',
                'category'     => 'Web Application',
                'tech_stack'   => ['Laravel', 'Vue.js', 'MySQL', 'Redis'],
                'is_featured'  => true,
                'published_at' => now()->subDays(10),
            ],
            [
                'title'        => 'Mobile Banking App',
                'slug'         => 'mobile-banking-app',
                'excerpt'      => 'Aplikasi mobile banking dengan keamanan tinggi dan UX yang intuitif.',
                'description'  => 'Mengembangkan aplikasi mobile banking dengan fitur transfer, pembayaran, dan monitoring keuangan real-time.',
                'client'       => 'FinCorp Indonesia',
                'category'     => 'Mobile App',
                'tech_stack'   => ['Flutter', 'Node.js', 'PostgreSQL', 'Firebase'],
                'is_featured'  => true,
                'published_at' => now()->subDays(20),
            ],
            [
                'title'        => 'Company Dashboard',
                'slug'         => 'company-dashboard',
                'excerpt'      => 'Dashboard analitik untuk monitoring KPI dan performa perusahaan.',
                'description'  => 'Membangun dashboard real-time dengan data visualization, reporting otomatis, dan alert system.',
                'client'       => 'Global Tech Corp',
                'category'     => 'Web Application',
                'tech_stack'   => ['React', 'Laravel', 'D3.js', 'PostgreSQL'],
                'is_featured'  => true,
                'published_at' => now()->subDays(30),
            ],
        ];

        foreach ($portfolios as $portfolio) {
            Portfolio::create($portfolio);
        }
    }
}
