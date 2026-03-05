@extends('layouts.admin')

@section('content')
    <div class="space-y-6">
        <!-- Header Section -->
        <div>
            <h1 class="text-3xl font-bold text-slate-900">Edit Anggota Tim</h1>
            <p class="mt-2 text-slate-600">Perbarui informasi anggota tim Anda.</p>
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

        <form action="{{ route('admin.tim.update', $team) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Basic Information -->
            <div class="rounded-xl border border-slate-200 bg-white shadow-sm">
                <div class="border-b border-slate-200 px-6 py-5">
                    <div class="flex items-center gap-3">
                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-gradient-to-br from-blue-500/20 to-primary/20">
                            <svg class="h-6 w-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-slate-900">Informasi Anggota Tim</h3>
                            <p class="text-sm text-slate-500">Data dasar profil anggota tim</p>
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                        <!-- Nama -->
                        <div>
                            <label for="name" class="mb-2 block text-sm font-semibold text-slate-700">Nama Lengkap *</label>
                            <div class="relative">
                                <svg class="absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <input id="name" name="name" type="text" value="{{ old('name', $team->name) }}" required class="w-full rounded-lg border border-slate-300 bg-slate-50 py-2.5 pl-10 pr-4 text-sm transition-colors focus:border-primary focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary/20" placeholder="Contoh: Budi Santoso">
                            </div>
                        </div>

                        <!-- Role/Jabatan -->
                        <div>
                            <label for="role" class="mb-2 block text-sm font-semibold text-slate-700">Jabatan *</label>
                            <div class="relative">
                                <svg class="absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <input id="role" name="role" type="text" value="{{ old('role', $team->role) }}" required class="w-full rounded-lg border border-slate-300 bg-slate-50 py-2.5 pl-10 pr-4 text-sm transition-colors focus:border-primary focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary/20" placeholder="Contoh: CEO & Pendiri">
                            </div>
                        </div>

                        <!-- Initial -->
                        <div>
                            <label for="initial" class="mb-2 block text-sm font-semibold text-slate-700">Initial (2-3 karakter) *</label>
                            <div class="relative">
                                <svg class="absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                                </svg>
                                <input id="initial" name="initial" type="text" maxlength="10" value="{{ old('initial', $team->initial) }}" required class="w-full rounded-lg border border-slate-300 bg-slate-50 py-2.5 pl-10 pr-4 text-sm transition-colors focus:border-primary focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary/20 uppercase" placeholder="Contoh: BS">
                            </div>
                            <p class="mt-1 text-xs text-slate-500">Akan ditampilkan di avatar jika tidak ada foto</p>
                        </div>

                        <!-- Accent Color -->
                        <div>
                            <label for="accent" class="mb-2 block text-sm font-semibold text-slate-700">Background Gradient Kartu *</label>
                            <select id="accent" name="accent" required class="w-full rounded-lg border border-slate-300 bg-slate-50 py-2.5 px-4 text-sm transition-colors focus:border-primary focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary/20">
                                <option value="from-blue-500 to-indigo-600" @selected(old('accent', $team->accent) == 'from-blue-500 to-indigo-600')>Blue to Indigo (Tosca)</option>
                                <option value="from-cyan-500 to-sky-600" @selected(old('accent', $team->accent) == 'from-cyan-500 to-sky-600')>Cyan to Sky</option>
                                <option value="from-emerald-500 to-green-600" @selected(old('accent', $team->accent) == 'from-emerald-500 to-green-600')>Emerald to Green</option>
                                <option value="from-purple-500 to-violet-600" @selected(old('accent', $team->accent) == 'from-purple-500 to-violet-600')>Purple to Violet</option>
                                <option value="from-rose-500 to-pink-600" @selected(old('accent', $team->accent) == 'from-rose-500 to-pink-600')>Rose to Pink</option>
                                <option value="from-orange-500 to-red-600" @selected(old('accent', $team->accent) == 'from-orange-500 to-red-600')>Orange to Red (Peach)</option>
                                <option value="from-amber-500 to-yellow-600" @selected(old('accent', $team->accent) == 'from-amber-500 to-yellow-600')>Amber to Yellow</option>
                                <option value="from-teal-500 to-emerald-600" @selected(old('accent', $team->accent) == 'from-teal-500 to-emerald-600')>Teal to Emerald</option>
                            </select>
                            <p class="mt-1 text-xs text-slate-500">Warna background kartu jika tidak ada foto</p>
                        </div>

                        <!-- Order -->
                        <div>
                            <label for="order" class="mb-2 block text-sm font-semibold text-slate-700">Urutan Tampil</label>
                            <div class="relative">
                                <svg class="absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                                </svg>
                                <input id="order" name="order" type="number" min="0" value="{{ old('order', $team->order) }}" class="w-full rounded-lg border border-slate-300 bg-slate-50 py-2.5 pl-10 pr-4 text-sm transition-colors focus:border-primary focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary/20" placeholder="0">
                            </div>
                            <p class="mt-1 text-xs text-slate-500">Semakin kecil angka, semakin depan urutan tampil</p>
                        </div>

                        <!-- Status -->
                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700">Status</label>
                            <label class="flex items-center gap-3 cursor-pointer rounded-lg border border-slate-300 bg-slate-50 p-3 transition-colors hover:border-primary hover:bg-primary/5">
                                <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $team->is_active)) class="h-5 w-5 rounded border-slate-300 text-primary focus:ring-2 focus:ring-primary/50">
                                <div>
                                    <div class="font-medium text-slate-900">Aktif</div>
                                    <div class="text-xs text-slate-500">Tampilkan anggota tim ini di website</div>
                                </div>
                            </label>
                        </div>

                        <!-- Photo Upload -->
                        <div class="md:col-span-2">
                            <label class="mb-2 block text-sm font-semibold text-slate-700">Foto Profil (Opsional)</label>
                            <div class="flex min-h-[180px] cursor-pointer flex-col items-center justify-center gap-2 rounded-xl border-2 border-dashed border-slate-300 bg-slate-50 p-4 text-center transition-colors hover:border-primary hover:bg-primary/5"
                                 onclick="openCropperForInput('photo',3/4,'prev_photo','ph_photo','lbl_photo','Foto Tim — 3:4 portrait (400×533px)')">
                                <input id="photo" name="photo" type="file" accept="image/jpeg,image/png,image/jpg,image/gif" class="hidden">
                                <img id="prev_photo"
                                     src="{{ $team->photo ? asset('storage/'.$team->photo) : '' }}"
                                     alt="Preview"
                                     style="max-height:120px;max-width:100%;object-fit:cover;border-radius:12px;"
                                     class="{{ $team->photo ? '' : 'hidden' }}">
                                <div id="ph_photo" class="{{ $team->photo ? 'hidden' : '' }}">
                                    <svg class="mx-auto h-12 w-12 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <p class="mt-3 text-sm font-medium text-slate-600">Upload foto profil atau ilustrasi</p>
                                    <p class="text-xs text-slate-400">JPG, PNG (Max 2MB) - Portrait (3:4) recommended</p>
                                    <p class="mt-2 text-xs font-semibold text-primary">💡 Tips: Foto real atau ilustrasi/cartoon style</p>
                                    <p class="text-xs text-slate-500">Jika kosong: ditampilkan initial dengan background gradient</p>
                                </div>
                                <p id="lbl_photo" class="text-xs text-slate-400">{{ $team->photo ? 'Klik untuk mengganti' : '' }}</p>
                            </div>
                        </div>

                        <!-- Bio -->
                        <div class="md:col-span-2">
                            <label for="bio" class="mb-2 block text-sm font-semibold text-slate-700">Bio Singkat</label>
                            <div class="relative">
                                <svg class="absolute left-3 top-3 h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <textarea id="bio" name="bio" rows="3" class="w-full rounded-lg border border-slate-300 bg-slate-50 py-2.5 pl-10 pr-4 text-sm transition-colors focus:border-primary focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary/20" placeholder="Bio singkat tentang anggota tim Anda">{{ old('bio', $team->bio) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="rounded-xl border border-slate-200 bg-white shadow-sm">
                <div class="border-b border-slate-200 px-6 py-5">
                    <div class="flex items-center gap-3">
                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-gradient-to-br from-green-500/20 to-emerald-500/20">
                            <svg class="h-6 w-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-slate-900">Informasi Kontak</h3>
                            <p class="text-sm text-slate-500">Kontak yang dapat dihubungi (opsional)</p>
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                        <!-- Email -->
                        <div>
                            <label for="email" class="mb-2 block text-sm font-semibold text-slate-700">Email</label>
                            <div class="relative">
                                <svg class="absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <input id="email" name="email" type="email" value="{{ old('email', $team->email) }}" class="w-full rounded-lg border border-slate-300 bg-slate-50 py-2.5 pl-10 pr-4 text-sm transition-colors focus:border-primary focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary/20" placeholder="budi@bandungcoding.com">
                            </div>
                        </div>

                        <!-- Telepon -->
                        <div>
                            <label for="phone" class="mb-2 block text-sm font-semibold text-slate-700">Telepon</label>
                            <div class="relative">
                                <svg class="absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 00.948.684l1.498 4.493a1 1 0 00.502.756l2.048 1.029a1 1 0 00.856 0l2.048-1.029a1 1 0 00.502-.756l1.498-4.493a1 1 0 00-.948-.684H19a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5z" />
                                </svg>
                                <input id="phone" name="phone" type="text" value="{{ old('phone', $team->phone) }}" class="w-full rounded-lg border border-slate-300 bg-slate-50 py-2.5 pl-10 pr-4 text-sm transition-colors focus:border-primary focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary/20" placeholder="+62 XXX XXX XXXX">
                            </div>
                        </div>

                        <!-- LinkedIn -->
                       <div>
                            <label for="linkedin" class="mb-2 block text-sm font-semibold text-slate-700">LinkedIn URL</label>
                            <div class="relative">
                                <svg class="absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                                </svg>
                                <input id="linkedin" name="linkedin" type="url" value="{{ old('linkedin', $team->linkedin) }}" class="w-full rounded-lg border border-slate-300 bg-slate-50 py-2.5 pl-10 pr-4 text-sm transition-colors focus:border-primary focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary/20" placeholder="https://linkedin.com/in/username">
                            </div>
                        </div>

                        <!-- Instagram -->
                        <div>
                            <label for="instagram" class="mb-2 block text-sm font-semibold text-slate-700">Instagram URL</label>
                            <div class="relative">
                                <svg class="absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                </svg>
                                <input id="instagram" name="instagram" type="url" value="{{ old('instagram', $team->instagram) }}" class="w-full rounded-lg border border-slate-300 bg-slate-50 py-2.5 pl-10 pr-4 text-sm transition-colors focus:border-primary focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary/20" placeholder="https://instagram.com/username">
                            </div>
                        </div>

                        <!-- TikTok -->
                        <div>
                            <label for="tiktok" class="mb-2 block text-sm font-semibold text-slate-700">TikTok URL</label>
                            <div class="relative">
                                <svg class="absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-5.2 1.74 2.89 2.89 0 012.31-4.64 2.93 2.93 0 01.88.13V9.4a6.84 6.84 0 00-1-.05A6.33 6.33 0 005 20.1a6.34 6.34 0 0010.86-4.43v-7a8.16 8.16 0 004.77 1.52v-3.4a4.85 4.85 0 01-1-.1z"/>
                                </svg>
                                <input id="tiktok" name="tiktok" type="url" value="{{ old('tiktok', $team->tiktok) }}" class="w-full rounded-lg border border-slate-300 bg-slate-50 py-2.5 pl-10 pr-4 text-sm transition-colors focus:border-primary focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary/20" placeholder="https://tiktok.com/@username">
                            </div>
                        </div>

                        <!-- Portfolio Website -->
                        <div>
                            <label for="portfolio" class="mb-2 block text-sm font-semibold text-slate-700">Portfolio / Website URL</label>
                            <div class="relative">
                                <svg class="absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                </svg>
                                <input id="portfolio" name="portfolio" type="url" value="{{ old('portfolio', $team->portfolio) }}" class="w-full rounded-lg border border-slate-300 bg-slate-50 py-2.5 pl-10 pr-4 text-sm transition-colors focus:border-primary focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary/20" placeholder="https://portofolio-saya.com">
                            </div>
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="mb-2 block text-sm font-semibold text-slate-700">Email</label>
                            <div class="relative">
                                <svg class="absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <input id="email" name="email" type="email" value="{{ old('email', $team->email) }}" class="w-full rounded-lg border border-slate-300 bg-slate-50 py-2.5 pl-10 pr-4 text-sm transition-colors focus:border-primary focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary/20" placeholder="budi@bandungcoding.com">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col gap-3 sm:flex-row sm:justify-end">
                <a href="{{ route('admin.tim.index') }}" class="inline-flex items-center justify-center gap-2 rounded-lg border border-slate-300 bg-white px-6 py-3 text-sm font-semibold text-slate-700 transition-all hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-slate-500/50">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    Batal
                </a>
                <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-lg bg-gradient-to-r from-primary to-blue-600 px-6 py-3 text-sm font-semibold text-white shadow-lg transition-all hover:shadow-xl hover:scale-105 focus:outline-none focus:ring-2 focus:ring-primary/50">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Update Anggota Tim
                </button>
            </div>
        </form>
    </div>

    @push('scripts')
    <script>
        function previewImg(input, previewId, placeholderId, labelId) {
            const preview = document.getElementById(previewId);
            const placeholder = document.getElementById(placeholderId);
            const label = document.getElementById(labelId);
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    placeholder.classList.add('hidden');
                };
                reader.readAsDataURL(input.files[0]);
                label.textContent = input.files[0].name;
            }
        }
    </script>
    @endpush
@endsection
