<?php

namespace Database\Seeders;

use App\Domain\Blog\Models\Blog;
use Illuminate\Database\Seeder;

/**
 * Seeder untuk data blog contoh.
 */
class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $blogs = [
            [
                'title'            => 'Mengapa Bisnis Anda Butuh Website di Era Digital',
                'slug'             => 'mengapa-bisnis-butuh-website',
                'excerpt'          => 'Di era digital, website bukan lagi pilihan tetapi kebutuhan. Pelajari mengapa bisnis Anda harus hadir secara online.',
                'content'          => '<p>Di era digital saat ini, kehadiran online menjadi faktor penting dalam kesuksesan bisnis. Website adalah representasi digital dari perusahaan Anda yang bekerja 24/7.</p><p>Beberapa alasan mengapa website penting untuk bisnis Anda:</p><ul><li>Meningkatkan kredibilitas dan profesionalitas</li><li>Memperluas jangkauan pasar</li><li>Memudahkan pelanggan menemukan informasi</li><li>Meningkatkan efisiensi operasional</li></ul>',
                'author'           => 'Tim BandungCoding',
                'category'         => 'Digital Marketing',
                'tags'             => ['website', 'bisnis digital', 'online presence'],
                'meta_title'       => 'Mengapa Bisnis Butuh Website | BandungCoding Blog',
                'meta_description' => 'Pelajari pentingnya website untuk bisnis di era digital dan bagaimana kehadiran online dapat meningkatkan pertumbuhan perusahaan Anda.',
                'is_published'     => true,
                'published_at'     => now()->subDays(5),
            ],
            [
                'title'            => 'Tren Teknologi 2026: Apa yang Perlu Anda Ketahui',
                'slug'             => 'tren-teknologi-2026',
                'excerpt'          => 'Eksplorasi tren teknologi terbaru yang akan membentuk masa depan industri digital.',
                'content'          => '<p>Tahun 2026 membawa banyak perubahan dalam dunia teknologi. Dari AI generatif hingga komputasi quantum, berikut tren yang perlu Anda perhatikan.</p>',
                'author'           => 'Tim BandungCoding',
                'category'         => 'Teknologi',
                'tags'             => ['teknologi', 'tren 2026', 'AI', 'inovasi'],
                'is_published'     => true,
                'published_at'     => now()->subDays(12),
            ],
            [
                'title'            => 'Best Practices dalam Pengembangan Aplikasi Mobile',
                'slug'             => 'best-practices-mobile-development',
                'excerpt'          => 'Tips dan praktik terbaik dalam membangun aplikasi mobile yang berkualitas dan user-friendly.',
                'content'          => '<p>Membangun aplikasi mobile yang sukses membutuhkan lebih dari sekadar coding. Dibutuhkan perencanaan yang matang, desain yang intuitif, dan performa yang optimal.</p>',
                'author'           => 'Tim BandungCoding',
                'category'         => 'Development',
                'tags'             => ['mobile', 'app development', 'best practices'],
                'is_published'     => true,
                'published_at'     => now()->subDays(20),
            ],
        ];

        foreach ($blogs as $blog) {
            Blog::create($blog);
        }
    }
}
