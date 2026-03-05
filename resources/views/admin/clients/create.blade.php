@extends('layouts.admin')

@section('content')
    <div class="space-y-6">
        <!-- Header Section -->
        <div>
            <h1 class="text-3xl font-bold text-slate-900">Tambah Klien Baru</h1>
            <p class="mt-2 text-slate-600">Tambahkan klien atau partner baru ke daftar klien Anda.</p>
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

        <form action="{{ route('admin.klien.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Basic Information -->
            <div class="rounded-xl border border-slate-200 bg-white shadow-sm">
                <div class="border-b border-slate-200 px-6 py-5">
                    <div class="flex items-center gap-3">
                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-gradient-to-br from-blue-500/20 to-primary/20">
                            <svg class="h-6 w-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5.581m0 0H9m5.581 0a2 2 0 100-4 2 2 0 000 4zM9 7h.01M9 3a1 1 0 100 2 1 1 0 000-2z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-slate-900">Informasi Klien</h3>
                            <p class="text-sm text-slate-500">Data dasar klien atau partner Anda</p>
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                        <!-- Nama Klien -->
                        <div>
                            <label for="name" class="mb-2 block text-sm font-semibold text-slate-700">Nama Klien *</label>
                            <div class="relative">
                                <svg class="absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5.581m0 0H9m5.581 0a2 2 0 100-4 2 2 0 000 4zM9 7h.01M9 3a1 1 0 100 2 1 1 0 000-2z" />
                                </svg>
                                <input id="name" name="name" type="text" value="{{ old('name') }}" required class="w-full rounded-lg border border-slate-300 bg-slate-50 py-2.5 pl-10 pr-4 text-sm transition-colors focus:border-primary focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary/20" placeholder="Contoh: PT Mojo Maru Indonesia">
                            </div>
                        </div>

                        <!-- Logo File Upload -->
                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700">Logo Klien</label>
                            <div class="flex min-h-[140px] cursor-pointer flex-col items-center justify-center gap-2 rounded-xl border-2 border-dashed border-slate-300 bg-slate-50 p-4 text-center transition-colors hover:border-primary hover:bg-primary/5"
                                 onclick="openCropperForInput('logo',NaN,'prev_logo','ph_logo','lbl_logo','Logo Klien — Bebas (free crop)')">
                                <input id="logo" name="logo" type="file" accept="image/jpeg,image/png,image/jpg,image/gif,image/svg+xml" class="hidden">
                                <img id="prev_logo" src="" alt="Preview" style="max-height:80px;max-width:100%;object-fit:contain;" class="hidden">
                                <div id="ph_logo">
                                    <svg class="mx-auto h-8 w-8 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    <p class="mt-1 text-sm font-medium text-slate-600">Upload logo klien</p>
                                    <p class="text-xs text-slate-400">JPG, PNG, SVG (Max 2MB)</p>
                                </div>
                                <p id="lbl_logo" class="text-xs text-slate-400"></p>
                            </div>
                        </div>

                        <!-- Deskripsi -->
                        <div class="md:col-span-2">
                            <label for="description" class="mb-2 block text-sm font-semibold text-slate-700">Deskripsi</label>
                            <div class="relative">
                                <svg class="absolute left-3 top-3 h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <textarea id="description" name="description" rows="3" class="w-full rounded-lg border border-slate-300 bg-slate-50 py-2.5 pl-10 pr-4 text-sm transition-colors focus:border-primary focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary/20" placeholder="Deskripsi singkat tentang klien Anda">{{ old('description') }}</textarea>
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
                            <p class="text-sm text-slate-500">Kontak yang dapat dihubungi</p>
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
                                <input id="email" name="email" type="email" value="{{ old('email') }}" class="w-full rounded-lg border border-slate-300 bg-slate-50 py-2.5 pl-10 pr-4 text-sm transition-colors focus:border-primary focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary/20" placeholder="contact@klien.com">
                            </div>
                        </div>

                        <!-- Telepon -->
                        <div>
                            <label for="phone" class="mb-2 block text-sm font-semibold text-slate-700">Telepon</label>
                            <div class="relative">
                                <svg class="absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 00.948.684l1.498 4.493a1 1 0 00.502.756l2.048 1.029a1 1 0 00.856 0l2.048-1.029a1 1 0 00.502-.756l1.498-4.493a1 1 0 00-.948-.684H19a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5z" />
                                </svg>
                                <input id="phone" name="phone" type="text" value="{{ old('phone') }}" class="w-full rounded-lg border border-slate-300 bg-slate-50 py-2.5 pl-10 pr-4 text-sm transition-colors focus:border-primary focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary/20" placeholder="+62 XXX XXX XXXX">
                            </div>
                        </div>

                        <!-- Website -->
                        <div class="md:col-span-2">
                            <label for="website" class="mb-2 block text-sm font-semibold text-slate-700">Website</label>
                            <div class="relative">
                                <svg class="absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                </svg>
                                <input id="website" name="website" type="url" value="{{ old('website') }}" class="w-full rounded-lg border border-slate-300 bg-slate-50 py-2.5 pl-10 pr-4 text-sm transition-colors focus:border-primary focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary/20" placeholder="https://klien.com">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Featured Option -->
            <div class="rounded-xl border border-slate-200 bg-white shadow-sm">
                <div class="p-6">
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" name="is_featured" value="1" @checked(old('is_featured')) class="h-5 w-5 rounded border-slate-300 text-primary focus:ring-2 focus:ring-primary/50">
                        <div>
                            <p class="text-sm font-semibold text-slate-700">Jadikan klien featured</p>
                            <p class="text-xs text-slate-500">Klien ini akan ditampilkan di tempat khusus</p>
                        </div>
                    </label>
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="flex justify-end gap-3">
                <a href="{{ route('admin.klien.index') }}" class="inline-flex items-center justify-center rounded-lg border border-slate-300 px-6 py-3 text-sm font-semibold text-slate-700 transition-all hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-slate-300/50">
                    Batal
                </a>
                <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-lg bg-gradient-to-r from-primary to-blue-600 px-8 py-3 text-sm font-semibold text-white shadow-lg transition-all hover:shadow-xl hover:scale-105 focus:outline-none focus:ring-2 focus:ring-primary/50">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                    </svg>
                    Simpan Klien
                </button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
<script>
function previewImg(input, previewId, placeholderId, labelId) {
    const file = input.files[0];
    if (!file) return;
    const preview = document.getElementById(previewId);
    const placeholder = document.getElementById(placeholderId);
    const label = document.getElementById(labelId);
    const reader = new FileReader();
    reader.onload = (e) => {
        if (preview) { preview.src = e.target.result; preview.classList.remove('hidden'); }
        if (placeholder) placeholder.classList.add('hidden');
        if (label) label.textContent = file.name.length > 35 ? file.name.substring(0,35)+'\u2026' : file.name;
    };
    reader.readAsDataURL(file);
}
</script>
@endpush
