<?php

/**
 * Konfigurasi khusus project BandungCoding.
 * Sentralisasi data perusahaan — mudah diubah tanpa edit view.
 * Siap migrasi ke database-driven settings nanti (SaaS-ready).
 */

return [

    // ── Informasi Perusahaan ────────────────────────────
    'company' => [
        'name'    => env('COMPANY_NAME', 'BandungCoding'),
        'tagline' => 'tagline', // Use translation key instead
        'email'   => env('COMPANY_EMAIL', 'hello@bandungcoding.com'),
        'phone'   => env('COMPANY_PHONE', '+62 812-xxxx-xxxx'),
        'address' => env('COMPANY_ADDRESS', 'Bandung, Jawa Barat, Indonesia'),
        'year'    => env('COMPANY_YEAR', '2024'),
    ],

    // ── Media Sosial ────────────────────────────────────
    'social' => [
        'instagram' => env('SOCIAL_INSTAGRAM', '#'),
        'linkedin'  => env('SOCIAL_LINKEDIN', '#'),
        'facebook'  => env('SOCIAL_FACEBOOK', '#'),
        'tiktok'    => env('SOCIAL_TIKTOK', '#'),
        'website'   => env('SOCIAL_WEBSITE', '#'),
        'github'    => env('SOCIAL_GITHUB', '#'),
    ],

    // ── SEO Default ─────────────────────────────────────
    'seo' => [
        'title'       => env('SEO_TITLE', 'BandungCoding'),
        'description' => env('SEO_DESCRIPTION', ''),
        'keywords'    => env('SEO_KEYWORDS', 'bandungcoding, software house, bandung, web development, mobile app'),
        'og_image'    => env('SEO_OG_IMAGE', '/images/og-default.jpg'),
    ],

    // ── Admin Auth ───────────────────────────────────────
    'admin' => [
        'username' => env('ADMIN_USERNAME', 'BandungCoding'),
        'password' => env('ADMIN_PASSWORD', 'fazrifahmi123'),
    ],

    // ── Pengaturan Halaman ──────────────────────────────
    'pagination' => [
        'portfolio' => 9,
        'blog'      => 9,
        'contacts'  => 15,
    ],

];
