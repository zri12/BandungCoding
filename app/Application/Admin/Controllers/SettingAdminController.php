<?php

namespace App\Application\Admin\Controllers;

use App\Domain\Setting\Services\SettingService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SettingAdminController extends Controller
{
    public function __construct(
        protected SettingService $settingService
    ) {}

    public function index()
    {
        $settings = $this->settingService->getAllAsArray();

        // Fallback ke config jika setting belum ada
        $defaults = [
            'company_name' => config('bandungcoding.company.name'),
            'company_tagline' => config('bandungcoding.company.tagline'),
            'company_email' => config('bandungcoding.company.email'),
            'company_phone' => config('bandungcoding.company.phone'),
            'company_address' => config('bandungcoding.company.address'),
            'whatsapp_number' => config('bandungcoding.company.phone'), // Default ke phone
            'instagram_url' => config('bandungcoding.social.instagram'),
            'linkedin_url' => config('bandungcoding.social.linkedin'),
            'facebook_url' => config('bandungcoding.social.facebook'),
            'tiktok_url'   => config('bandungcoding.social.tiktok'),
            'website_url'  => config('bandungcoding.social.website'),
            'seo_meta_title' => config('bandungcoding.seo.title'),
            'seo_meta_description' => config('bandungcoding.seo.description'),
            'logo_navbar' => null,
            'logo_favicon' => null,
        ];

        // Merge settings dengan defaults
        $mergedSettings = array_merge($defaults, $settings);

        return view('admin.settings.index', [
            'pageTitle' => 'Pengaturan Website',
            'pageSubtitle' => 'Kelola pengaturan umum dan tampilan website.',
            'settings' => $mergedSettings,
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'company_name' => ['nullable', 'string', 'max:255'],
            'company_tagline' => ['nullable', 'string', 'max:500'],
            'company_email' => ['nullable', 'email', 'max:255'],
            'company_phone' => ['nullable', 'string', 'max:50'],
            'company_address' => ['nullable', 'string', 'max:1000'],
            'whatsapp_number' => ['nullable', 'string', 'max:50'],
            'instagram_url' => ['nullable', 'string', 'max:255'],
            'linkedin_url'  => ['nullable', 'string', 'max:255'],
            'facebook_url'  => ['nullable', 'string', 'max:255'],
            'tiktok_url'    => ['nullable', 'string', 'max:255'],
            'website_url'   => ['nullable', 'string', 'max:255'],
            'seo_meta_title' => ['nullable', 'string', 'max:255'],
            'seo_meta_description' => ['nullable', 'string', 'max:1000'],
            'logo_navbar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'logo_favicon' => ['nullable', 'image', 'mimes:jpeg,png,jpg,ico,gif,svg', 'max:2048'],
        ]);

        // Handle logo_navbar upload — simpan sebagai base64 agar bekerja di Vercel serverless
        if ($request->hasFile('logo_navbar')) {
            $file = $request->file('logo_navbar');
            $mimeType = $file->getMimeType();
            $base64   = base64_encode(file_get_contents($file->getRealPath()));
            $data['logo_navbar'] = 'data:' . $mimeType . ';base64,' . $base64;
        } else {
            unset($data['logo_navbar']);
        }

        // Handle logo_favicon upload — simpan sebagai base64
        if ($request->hasFile('logo_favicon')) {
            $file = $request->file('logo_favicon');
            $mimeType = $file->getMimeType();
            $base64   = base64_encode(file_get_contents($file->getRealPath()));
            $data['logo_favicon'] = 'data:' . $mimeType . ';base64,' . $base64;
        } else {
            unset($data['logo_favicon']);
        }

        foreach ($data as $key => $value) {
            if ($value !== null) {
                $this->settingService->set($key, trim((string) $value), 'company');
            }
        }

        return redirect()
            ->route('admin.pengaturan.index')
            ->with('success', 'Pengaturan website berhasil disimpan.');
    }
}
