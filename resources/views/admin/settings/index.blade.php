@extends('layouts.admin')

@section('content')
    <div class="space-y-6">
        <!-- Header Section -->
        <div>
            <h1 class="text-3xl font-bold text-slate-900">Pengaturan Website</h1>
            <p class="mt-2 text-slate-600">Kelola pengaturan profil perusahaan, media sosial, dan SEO global website Anda.</p>
        </div>

        @if ($errors->any())
            <div class="rounded-lg border border-rose-300 bg-rose-50 p-4">
                <div class="flex gap-3">
                    <svg class="h-5 w-5 flex-shrink-0 text-rose-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                    <div>
                        <h3 class="font-semibold text-rose-900">Ada kesalahan!</h3>
                        <ul class="mt-2 space-y-1 text-sm text-rose-800">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        @if (session('success'))
            <div class="rounded-lg border border-emerald-300 bg-emerald-50 p-4">
                <div class="flex gap-3">
                    <svg class="h-5 w-5 flex-shrink-0 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    <div>
                        <h3 class="font-semibold text-emerald-900">Berhasil!</h3>
                        <p class="mt-1 text-sm text-emerald-800">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <form action="{{ route('admin.pengaturan.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Logo Section -->
            <div class="rounded-xl border border-slate-200 bg-white shadow-sm transition-all hover:shadow-md">
                <div class="border-b border-slate-200 px-6 py-5">
                    <div class="flex items-center gap-3">
                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-gradient-to-br from-purple-500/20 to-pink-500/20">
                            <svg class="h-6 w-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-slate-900">Logo & Branding</h3>
                            <p class="text-sm text-slate-500">Kelola logo navbar dan favicon website</p>
                        </div>
                    </div>
                </div>
                
                <div class="p-6">
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <!-- Logo Navbar -->
                        <div>
                            <label class="mb-3 block text-sm font-semibold text-slate-700">Logo Navbar (Header)</label>
                            <div class="flex min-h-[120px] cursor-pointer flex-col items-center justify-center gap-3 rounded-xl border-2 border-dashed border-slate-300 bg-slate-50 p-4 text-center transition-colors hover:border-primary hover:bg-primary/5"
                                 onclick="openCropperForInput('logo_navbar',NaN,'prev_logo_navbar','ph_logo_navbar','lbl_logo_navbar','Logo Navbar — Bebas (PNG/SVG transparan)')">
                                <input id="logo_navbar" name="logo_navbar" type="file" accept="image/*" class="hidden">
                                <img id="prev_logo_navbar"
                                     src="{{ $settings['logo_navbar'] ? asset('storage/'.$settings['logo_navbar']) : '' }}"
                                     alt="Logo Navbar"
                                     style="max-height:64px; max-width:100%; object-fit:contain;"
                                     class="{{ $settings['logo_navbar'] ? '' : 'hidden' }}">
                                <div id="ph_logo_navbar" class="{{ $settings['logo_navbar'] ? 'hidden' : '' }}">
                                    <svg class="mx-auto h-10 w-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <p class="mt-2 text-sm font-medium text-slate-600">Upload logo navbar</p>
                                </div>
                                <p id="lbl_logo_navbar" class="text-xs text-slate-400">{{ $settings['logo_navbar'] ? 'Klik untuk mengganti' : 'PNG, SVG, JPG (Max 2MB)' }}</p>
                            </div>
                            <p class="mt-1.5 text-xs text-slate-400">Rekomendasi: background transparan, tinggi ±60px</p>
                        </div>

                        <!-- Logo Favicon -->
                        <div>
                            <label class="mb-3 block text-sm font-semibold text-slate-700">Favicon (Tab Browser)</label>
                            <div class="flex min-h-[120px] cursor-pointer flex-col items-center justify-center gap-3 rounded-xl border-2 border-dashed border-slate-300 bg-slate-50 p-4 text-center transition-colors hover:border-primary hover:bg-primary/5"
                                 onclick="openCropperForInput('logo_favicon',1,'prev_logo_favicon','ph_logo_favicon','lbl_logo_favicon','Favicon — 1:1 (64×64px)')">
                                <input id="logo_favicon" name="logo_favicon" type="file" accept="image/*" class="hidden">
                                <img id="prev_logo_favicon"
                                     src="{{ $settings['logo_favicon'] ? asset('storage/'.$settings['logo_favicon']) : '' }}"
                                     alt="Favicon"
                                     style="max-height:48px; max-width:48px; object-fit:contain;"
                                     class="{{ $settings['logo_favicon'] ? '' : 'hidden' }}">
                                <div id="ph_logo_favicon" class="{{ $settings['logo_favicon'] ? 'hidden' : '' }}">
                                    <svg class="mx-auto h-10 w-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <p class="mt-2 text-sm font-medium text-slate-600">Upload favicon</p>
                                </div>
                                <p id="lbl_logo_favicon" class="text-xs text-slate-400">{{ $settings['logo_favicon'] ? 'Klik untuk mengganti' : 'PNG, ICO, SVG (Max 2MB)' }}</p>
                            </div>
                            <p class="mt-1.5 text-xs text-slate-400">Rekomendasi: ukuran 32×32 atau 64×64 px</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profil Perusahaan Section -->
            <div class="rounded-xl border border-slate-200 bg-white shadow-sm transition-all hover:shadow-md">
                <div class="border-b border-slate-200 px-6 py-5">
                    <div class="flex items-center gap-3">
                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-gradient-to-br from-blue-500/20 to-primary/20">
                            <svg class="h-6 w-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5.581m0 0H9m5.581 0a2 2 0 100-4 2 2 0 000 4zM9 7h.01M9 3a1 1 0 100 2 1 1 0 000-2z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-slate-900">Profil Perusahaan</h3>
                            <p class="text-sm text-slate-500">Informasi dasar perusahaan Anda</p>
                        </div>
                    </div>
                </div>
                
                <div class="p-6">
                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                        <!-- Nama Perusahaan -->
                        <div>
                            <label for="company_name" class="mb-2 block text-sm font-semibold text-slate-700">Nama Perusahaan</label>
                            <div class="relative">
                                <svg class="absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5.581m0 0H9m5.581 0a2 2 0 100-4 2 2 0 000 4zM9 7h.01M9 3a1 1 0 100 2 1 1 0 000-2z" />
                                </svg>
                                <input id="company_name" name="company_name" type="text" value="{{ old('company_name', $settings['company_name'] ?? '') }}" class="w-full rounded-lg border border-slate-300 bg-slate-50 py-2.5 pl-10 pr-4 text-sm transition-colors focus:border-primary focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary/20" placeholder="Contoh: BandungCoding">
                            </div>
                        </div>

                        <!-- Tagline / Deskripsi Singkat -->
                        <div class="md:col-span-2">
                            <label for="company_tagline" class="mb-2 block text-sm font-semibold text-slate-700">Tagline Perusahaan</label>
                            <div class="relative">
                                <svg class="absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                </svg>
                                <input id="company_tagline" name="company_tagline" type="text" value="{{ old('company_tagline', $settings['company_tagline'] ?? '') }}" class="w-full rounded-lg border border-slate-300 bg-slate-50 py-2.5 pl-10 pr-4 text-sm transition-colors focus:border-primary focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary/20" placeholder="Contoh: Solusi Digital Terbaik untuk Bisnis Anda">
                            </div>
                        </div>

                        <!-- Email Perusahaan -->
                        <div>
                            <label for="company_email" class="mb-2 block text-sm font-semibold text-slate-700">Email Perusahaan</label>
                            <div class="relative">
                                <svg class="absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <input id="company_email" name="company_email" type="email" value="{{ old('company_email', $settings['company_email'] ?? '') }}" class="w-full rounded-lg border border-slate-300 bg-slate-50 py-2.5 pl-10 pr-4 text-sm transition-colors focus:border-primary focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary/20" placeholder="example@bandungcoding.com">
                            </div>
                        </div>

                        <!-- Telepon -->
                        <div>
                            <label for="company_phone" class="mb-2 block text-sm font-semibold text-slate-700">Telepon</label>
                            <div class="relative">
                                <svg class="absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 00.948.684l1.498 4.493a1 1 0 00.502.756l2.048 1.029a1 1 0 00.856 0l2.048-1.029a1 1 0 00.502-.756l1.498-4.493a1 1 0 00-.948-.684H19a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5z" />
                                </svg>
                                <input id="company_phone" name="company_phone" type="text" value="{{ old('company_phone', $settings['company_phone'] ?? '') }}" class="w-full rounded-lg border border-slate-300 bg-slate-50 py-2.5 pl-10 pr-4 text-sm transition-colors focus:border-primary focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary/20" placeholder="+62 XXX XXX XXXX">
                            </div>
                        </div>

                        <!-- WhatsApp -->
                        <div>
                            <label for="whatsapp_number" class="mb-2 block text-sm font-semibold text-slate-700">Nomor WhatsApp</label>
                            <div class="relative">
                                <svg class="absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.477 2 2 6.477 2 12c0 1.89.525 3.748 1.516 5.322L2.33 21.714c-.5 1.428.098 2.999 1.328 3.736 1.23.737 2.799.24 3.532-1.188l1.186-2.014A10 10 0 0 0 12 22a10 10 0 0 0 5.324-1.416l1.186 2.014c.733 1.428 2.302 1.925 3.532 1.188 1.23-.737 1.828-2.308 1.328-3.736l-1.186-4.392A9.972 9.972 0 0 0 22 12c0-5.523-4.477-10-10-10zm0 2a8 8 0 1 1 0 16 8 8 0 0 1 0-16z" />
                                </svg>
                                <input id="whatsapp_number" name="whatsapp_number" type="text" value="{{ old('whatsapp_number', $settings['whatsapp_number'] ?? '') }}" class="w-full rounded-lg border border-slate-300 bg-slate-50 py-2.5 pl-10 pr-4 text-sm transition-colors focus:border-primary focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary/20" placeholder="+62 XXX XXX XXXX">
                            </div>
                            <p class="mt-1 text-xs text-slate-500">Format: +62 812-xxxx-xxxx</p>
                        </div>

                        <!-- WhatsApp Link (Custom/Optional) -->
                        <div>
                            <label for="whatsapp_link" class="mb-2 block text-sm font-semibold text-slate-700">Link WhatsApp <span class="text-xs font-normal text-slate-500">(Opsional)</span></label>
                            <div class="relative">
                                <svg class="absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                </svg>
                                <input id="whatsapp_link" name="whatsapp_link" type="text" value="{{ old('whatsapp_link', $settings['whatsapp_link'] ?? '') }}" class="w-full rounded-lg border border-slate-300 bg-slate-50 py-2.5 pl-10 pr-4 text-sm transition-colors focus:border-primary focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary/20" placeholder="https://wa.me/628123456789">
                            </div>
                            <p class="mt-1 text-xs text-slate-500">Kosongkan untuk auto-generate dari nomor WhatsApp di atas</p>
                        </div>

                        <!-- Alamat -->
                        <div class="md:col-span-2">
                            <label for="company_address" class="mb-2 block text-sm font-semibold text-slate-700">Alamat</label>
                            <div class="relative">
                                <svg class="absolute left-3 top-3 h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <textarea id="company_address" name="company_address" rows="4" class="w-full rounded-lg border border-slate-300 bg-slate-50 py-2.5 pl-10 pr-4 text-sm transition-colors focus:border-primary focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary/20" placeholder="Jalan, kota, provinsi, kode pos">{{ old('company_address', $settings['company_address'] ?? '') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Social Media Section -->
            <div class="rounded-xl border border-slate-200 bg-white shadow-sm transition-all hover:shadow-md">
                <div class="border-b border-slate-200 px-6 py-5">
                    <div class="flex items-center gap-3">
                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-gradient-to-br from-pink-500/20 to-rose-500/20">
                            <svg class="h-6 w-6 text-rose-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-slate-900">Media Sosial</h3>
                            <p class="text-sm text-slate-500">URL profil media sosial Anda</p>
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                        <!-- Instagram -->
                        <div>
                            <label for="instagram_url" class="mb-2 block text-sm font-semibold text-slate-700">Instagram</label>
                            <div class="relative">
                                <svg class="absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.521 17.521h-11.042V6.479h11.042v11.042zm-5.521-9.093c-1.105 0-2 .895-2 2s.895 2 2 2 2-.895 2-2-.895-2-2-2z" />
                                </svg>
                                <input id="instagram_url" name="instagram_url" type="text" value="{{ old('instagram_url', $settings['instagram_url'] ?? '') }}" class="w-full rounded-lg border border-slate-300 bg-slate-50 py-2.5 pl-10 pr-4 text-sm transition-colors focus:border-primary focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary/20" placeholder="https://instagram.com/bandungcoding">
                            </div>
                        </div>

                        <!-- LinkedIn -->
                        <div>
                            <label for="linkedin_url" class="mb-2 block text-sm font-semibold text-slate-700">LinkedIn</label>
                            <div class="relative">
                                <svg class="absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                                </svg>
                                <input id="linkedin_url" name="linkedin_url" type="text" value="{{ old('linkedin_url', $settings['linkedin_url'] ?? '') }}" class="w-full rounded-lg border border-slate-300 bg-slate-50 py-2.5 pl-10 pr-4 text-sm transition-colors focus:border-primary focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary/20" placeholder="https://linkedin.com/company/bandungcoding">
                            </div>
                        </div>

                        <!-- Facebook -->
                        <div>
                            <label for="facebook_url" class="mb-2 block text-sm font-semibold text-slate-700">Facebook</label>
                            <div class="relative">
                                <svg class="absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                </svg>
                                <input id="facebook_url" name="facebook_url" type="text" value="{{ old('facebook_url', $settings['facebook_url'] ?? '') }}" class="w-full rounded-lg border border-slate-300 bg-slate-50 py-2.5 pl-10 pr-4 text-sm transition-colors focus:border-primary focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary/20" placeholder="https://facebook.com/bandungcoding">
                            </div>
                        </div>

                        <!-- TikTok -->
                        <div>
                            <label for="tiktok_url" class="mb-2 block text-sm font-semibold text-slate-700">TikTok</label>
                            <div class="relative">
                                <svg class="absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-5.2 1.74 2.89 2.89 0 012.31-4.64 2.93 2.93 0 01.88.13V9.4a6.84 6.84 0 00-1-.05A6.33 6.33 0 005 20.1a6.34 6.34 0 0010.86-4.43v-7a8.16 8.16 0 004.77 1.52v-3.4a4.85 4.85 0 01-1-.1z"/>
                                </svg>
                                <input id="tiktok_url" name="tiktok_url" type="text" value="{{ old('tiktok_url', $settings['tiktok_url'] ?? '') }}" class="w-full rounded-lg border border-slate-300 bg-slate-50 py-2.5 pl-10 pr-4 text-sm transition-colors focus:border-primary focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary/20" placeholder="https://tiktok.com/@bandungcoding">
                            </div>
                        </div>

                        <!-- Website -->
                        <div class="md:col-span-2">
                            <label for="website_url" class="mb-2 block text-sm font-semibold text-slate-700">Website / URL Resmi</label>
                            <div class="relative">
                                <svg class="absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 010 20M12 2a15.3 15.3 0 000 20"/>
                                </svg>
                                <input id="website_url" name="website_url" type="text" value="{{ old('website_url', $settings['website_url'] ?? '') }}" class="w-full rounded-lg border border-slate-300 bg-slate-50 py-2.5 pl-10 pr-4 text-sm transition-colors focus:border-primary focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary/20" placeholder="https://bandungcoding.com">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SEO Global Section -->
            <div class="rounded-xl border border-slate-200 bg-white shadow-sm transition-all hover:shadow-md">
                <div class="border-b border-slate-200 px-6 py-5">
                    <div class="flex items-center gap-3">
                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-gradient-to-br from-orange-500/20 to-amber-500/20">
                            <svg class="h-6 w-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-slate-900">SEO Global</h3>
                            <p class="text-sm text-slate-500">Pengaturan SEO default untuk seluruh website</p>
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    <div class="space-y-5">
                        <!-- Meta Title -->
                        <div>
                            <label for="seo_meta_title" class="mb-2 block text-sm font-semibold text-slate-700">Meta Title Default</label>
                            <div class="relative">
                                <svg class="absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                </svg>
                                <input id="seo_meta_title" name="seo_meta_title" type="text" maxlength="70" value="{{ old('seo_meta_title', $settings['seo_meta_title'] ?? '') }}" class="w-full rounded-lg border border-slate-300 bg-slate-50 py-2.5 pl-10 pr-4 text-sm transition-colors focus:border-primary focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary/20" placeholder="Contoh: BandungCoding - Platform Belajar Web Development Terpercaya">
                            </div>
                            <p class="mt-1 text-xs text-slate-500">Disarankan maksimal 70 karakter</p>
                        </div>

                        <!-- Meta Description -->
                        <div>
                            <label for="seo_meta_description" class="mb-2 block text-sm font-semibold text-slate-700">Meta Description Default</label>
                            <div class="relative">
                                <svg class="absolute left-3 top-3 h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <textarea id="seo_meta_description" name="seo_meta_description" rows="4" maxlength="160" class="w-full rounded-lg border border-slate-300 bg-slate-50 py-2.5 pl-10 pr-4 text-sm transition-colors focus:border-primary focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary/20" placeholder="Deskripsi singkat tentang website Anda untuk hasil pencarian Google. Maksimal 160 karakter.">{{ old('seo_meta_description', $settings['seo_meta_description'] ?? '') }}</textarea>
                            </div>
                            <p class="mt-1 text-xs text-slate-500">Disarankan maksimal 160 karakter</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end gap-3">
                <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center justify-center rounded-lg border border-slate-300 px-6 py-3 text-sm font-semibold text-slate-700 transition-all hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-slate-300/50">
                    Batal
                </a>
                <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-lg bg-gradient-to-r from-primary to-blue-600 px-8 py-3 text-sm font-semibold text-white shadow-lg transition-all hover:shadow-xl hover:scale-105 focus:outline-none focus:ring-2 focus:ring-primary/50">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                    </svg>
                    Simpan Pengaturan
                </button>
            </div>
        </form>
    </div>

@push('scripts')
<script>
function previewImage(input, previewId, placeholderId, labelId) {
    const file = input.files[0];
    if (!file) return;
    const preview = document.getElementById(previewId);
    const placeholder = document.getElementById(placeholderId);
    const label = document.getElementById(labelId);
    const reader = new FileReader();
    reader.onload = (e) => {
        if (preview) { preview.src = e.target.result; preview.classList.remove('hidden'); }
        if (placeholder) placeholder.classList.add('hidden');
        if (label) label.textContent = file.name.length > 30 ? file.name.substring(0, 30) + '…' : file.name;
    };
    reader.readAsDataURL(file);
}
</script>
@endpush
@endsection
