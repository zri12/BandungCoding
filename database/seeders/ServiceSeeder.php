<?php

namespace Database\Seeders;

use App\Domain\Service\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

/**
 * Seeder untuk data layanan contoh.
 * Memberikan data awal yang representatif untuk company profile.
 */
class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title'       => 'Web Development',
                'slug'        => 'web-development',
                'excerpt'     => 'Pengembangan website modern dan responsif menggunakan teknologi terkini.',
                'description' => 'Kami mengembangkan website dengan arsitektur modern, performa tinggi, dan desain yang responsif. Mulai dari company profile, e-commerce, hingga web application kompleks.',
                'icon'        => 'globe',
                'is_active'   => true,
                'sort_order'  => 1,
            ],
            [
                'title'       => 'Mobile App Development',
                'slug'        => 'mobile-app-development',
                'excerpt'     => 'Aplikasi mobile native dan cross-platform untuk iOS dan Android.',
                'description' => 'Kami membangun aplikasi mobile yang intuitif dan performa tinggi menggunakan Flutter, React Native, atau native development.',
                'icon'        => 'device-mobile',
                'is_active'   => true,
                'sort_order'  => 2,
            ],
            [
                'title'       => 'UI/UX Design',
                'slug'        => 'ui-ux-design',
                'excerpt'     => 'Desain antarmuka yang user-friendly dan pengalaman pengguna yang optimal.',
                'description' => 'Tim desainer kami menciptakan antarmuka yang indah, intuitif, dan berfokus pada pengalaman pengguna terbaik.',
                'icon'        => 'palette',
                'is_active'   => true,
                'sort_order'  => 3,
            ],
            [
                'title'       => 'Custom Software',
                'slug'        => 'custom-software',
                'excerpt'     => 'Solusi software kustom sesuai kebutuhan bisnis Anda.',
                'description' => 'Kami merancang dan mengembangkan software kustom yang disesuaikan dengan proses bisnis dan kebutuhan spesifik perusahaan Anda.',
                'icon'        => 'code',
                'is_active'   => true,
                'sort_order'  => 4,
            ],
            [
                'title'       => 'IT Consulting',
                'slug'        => 'it-consulting',
                'excerpt'     => 'Konsultasi teknologi untuk transformasi digital bisnis Anda.',
                'description' => 'Kami membantu perusahaan dalam merencanakan dan mengimplementasikan strategi teknologi yang tepat untuk pertumbuhan bisnis.',
                'icon'        => 'light-bulb',
                'is_active'   => true,
                'sort_order'  => 5,
            ],
            [
                'title'       => 'DevOps & Cloud',
                'slug'        => 'devops-cloud',
                'excerpt'     => 'Infrastruktur cloud dan otomasi deployment untuk skalabilitas.',
                'description' => 'Kami menyediakan layanan DevOps, CI/CD pipeline, dan manajemen infrastruktur cloud untuk memastikan aplikasi Anda selalu tersedia dan scalable.',
                'icon'        => 'cloud',
                'is_active'   => true,
                'sort_order'  => 6,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
