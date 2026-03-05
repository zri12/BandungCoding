<?php

namespace Database\Seeders;

use App\Domain\Setting\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

/**
 * Seeder untuk mengisi data pengaturan website default.
 * Data ini dapat diubah dari admin panel.
 */
class SettingSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $settings = [
            // Profil Perusahaan
            [
                'key' => 'company_name',
                'value' => 'BandungCoding',
                'group' => 'company',
            ],
            [
                'key' => 'company_email',
                'value' => 'hello@bandungcoding.com',
                'group' => 'company',
            ],
            [
                'key' => 'company_phone',
                'value' => '+62 812-xxxx-xxxx',
                'group' => 'company',
            ],
            [
                'key' => 'whatsapp_number',
                'value' => '+62 812-xxxx-xxxx',
                'group' => 'company',
            ],
            [
                'key' => 'whatsapp_link',
                'value' => '',
                'group' => 'company',
            ],
            [
                'key' => 'company_address',
                'value' => 'Bandung, Jawa Barat, Indonesia',
                'group' => 'company',
            ],

            // Media Sosial
            [
                'key' => 'instagram_url',
                'value' => 'https://instagram.com/bandungcoding',
                'group' => 'social',
            ],
            [
                'key' => 'linkedin_url',
                'value' => 'https://linkedin.com/company/bandungcoding',
                'group' => 'social',
            ],
            [
                'key' => 'facebook_url',
                'value' => 'https://facebook.com/bandungcoding',
                'group' => 'social',
            ],

            // SEO
            [
                'key' => 'seo_meta_title',
                'value' => 'BandungCoding — Solusi IT Profesional',
                'group' => 'seo',
            ],
            [
                'key' => 'seo_meta_description',
                'value' => 'BandungCoding adalah perusahaan IT di Bandung yang menyediakan layanan pengembangan software, website, dan aplikasi mobile.',
                'group' => 'seo',
            ],
        ];

        // Gunakan updateOrCreate untuk menghindari duplikasi
        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
