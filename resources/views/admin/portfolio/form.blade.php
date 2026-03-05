@extends('layouts.admin')

@section('content')
    @php
        $isEdit = $portfolio->exists;
    @endphp

    <form action="{{ $formAction }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @if ($formMethod !== 'POST')
            @method($formMethod)
        @endif

        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <h3 class="text-lg font-bold text-slate-900">Gambar Portfolio</h3>
            <p class="mt-1 text-sm text-slate-500">Upload gambar untuk tampilan portfolio Anda</p>
            
            <div class="mt-5 grid grid-cols-1 gap-6 md:grid-cols-2">
                {{-- Thumbnail (used for hero desktop image) --}}
                <div class="md:col-span-2">
                    <label class="mb-1 block text-sm font-semibold text-slate-700">Gambar Desktop / Thumbnail</label>
                    <p class="mb-2 text-xs text-slate-500">Gambar ini akan digunakan sebagai gambar utama desktop. Rekomendasi: 1200x675px (16:9)</p>
                    <div class="flex min-h-[180px] cursor-pointer flex-col items-center justify-center gap-2 rounded-xl border-2 border-dashed border-slate-300 bg-slate-50 p-4 text-center transition-colors hover:border-primary hover:bg-primary/5"
                         onclick="openCropperForInput('thumbnail',16/9,'prev_thumbnail','ph_thumbnail','lbl_thumbnail','Desktop / Thumbnail — 16:9 (1200×675px)')">
                        <input id="thumbnail" name="thumbnail" type="file" accept="image/*" class="hidden">
                        <img id="prev_thumbnail"
                             src="{{ $portfolio->thumbnail ? asset('storage/'.$portfolio->thumbnail) : '' }}"
                             alt="Preview Thumbnail"
                             style="max-height:160px;max-width:100%;object-fit:contain;border-radius:8px;"
                             class="{{ $portfolio->thumbnail ? '' : 'hidden' }}">
                        <div id="ph_thumbnail" class="{{ $portfolio->thumbnail ? 'hidden' : '' }}">
                            <svg class="mx-auto h-10 w-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <p class="mt-2 text-sm font-medium text-slate-600">Pilih gambar desktop</p>
                            <p class="text-xs text-slate-400">PNG, JPG, WebP (Max 2MB) • 16:9 ratio</p>
                        </div>
                        <p id="lbl_thumbnail" class="text-xs text-slate-400">{{ $portfolio->thumbnail ? 'Klik untuk mengganti' : '' }}</p>
                    </div>
                </div>

                {{-- Mobile Image --}}
                <div class="md:col-span-2">
                    <label class="mb-1 block text-sm font-semibold text-slate-700">Gambar Mobile</label>
                    <p class="mb-2 text-xs text-slate-500">Gambar untuk mockup mobile. Rekomendasi: 400x800px (1:2 ratio / portrait)</p>
                    <div class="flex min-h-[180px] cursor-pointer flex-col items-center justify-center gap-2 rounded-xl border-2 border-dashed border-slate-300 bg-slate-50 p-4 text-center transition-colors hover:border-primary hover:bg-primary/5"
                         onclick="openCropperForInput('mobile_image',1/2,'prev_mobile_image','ph_mobile_image','lbl_mobile_image','Mobile — 1:2 portrait (400×800px)')">
                        <input id="mobile_image" name="mobile_image" type="file" accept="image/*" class="hidden">
                        <img id="prev_mobile_image"
                             src="{{ $portfolio->mobile_image ? asset('storage/'.$portfolio->mobile_image) : '' }}"
                             alt="Preview Mobile"
                             style="max-height:160px;max-width:100%;object-fit:contain;border-radius:8px;"
                             class="{{ $portfolio->mobile_image ? '' : 'hidden' }}">
                        <div id="ph_mobile_image" class="{{ $portfolio->mobile_image ? 'hidden' : '' }}">
                            <svg class="mx-auto h-10 w-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                            <p class="mt-2 text-sm font-medium text-slate-600">Pilih gambar mobile</p>
                            <p class="text-xs text-slate-400">PNG, JPG, WebP (Max 2MB) • 1:2 ratio</p>
                        </div>
                        <p id="lbl_mobile_image" class="text-xs text-slate-400">{{ $portfolio->mobile_image ? 'Klik untuk mengganti' : '' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <h3 class="text-lg font-bold text-slate-900">Galeri Portfolio</h3>
            <p class="mt-1 text-sm text-slate-500">Upload 5 gambar untuk galeri. Rekomendasi: 800x600px atau lebih (4:3 atau 16:9)</p>
            
            <div class="mt-5 grid grid-cols-1 gap-4 md:grid-cols-3">
                @for ($i = 1; $i <= 5; $i++)
                    <div>
                        <label class="mb-1 block text-xs font-semibold text-slate-700">Gambar Galeri {{ $i }}</label>
                        <div class="flex min-h-[140px] cursor-pointer flex-col items-center justify-center gap-2 rounded-xl border-2 border-dashed border-slate-300 bg-slate-50 p-3 text-center transition-colors hover:border-primary hover:bg-primary/5"
                             onclick="openCropperForInput('gallery_image_{{ $i }}',4/3,'prev_gallery_{{ $i }}','ph_gallery_{{ $i }}','lbl_gallery_{{ $i }}','Galeri {{ $i }} — 4:3 (800×600px)')">
                            <input id="gallery_image_{{ $i }}" name="gallery_image_{{ $i }}" type="file" accept="image/*" class="hidden">
                            <img id="prev_gallery_{{ $i }}"
                                 src="{{ $portfolio->{'gallery_image_' . $i} ? asset('storage/'.$portfolio->{'gallery_image_' . $i}) : '' }}"
                                 alt="Preview Gallery {{ $i }}"
                                 style="max-height:120px;max-width:100%;object-fit:contain;border-radius:8px;"
                                 class="{{ $portfolio->{'gallery_image_' . $i} ? '' : 'hidden' }}">
                            <div id="ph_gallery_{{ $i }}" class="{{ $portfolio->{'gallery_image_' . $i} ? 'hidden' : '' }}">
                                <svg class="mx-auto h-8 w-8 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                <p class="mt-1 text-xs font-medium text-slate-600">Galeri {{ $i }}</p>
                            </div>
                            <p id="lbl_gallery_{{ $i }}" class="text-xs text-slate-400">{{ $portfolio->{'gallery_image_' . $i} ? 'Klik ganti' : '' }}</p>
                        </div>
                    </div>
                @endfor
            </div>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <h3 class="text-lg font-bold text-slate-900">Informasi Portfolio</h3>
            <div class="mt-5 grid grid-cols-1 gap-4 md:grid-cols-2">
                <div class="md:col-span-2">
                    <label for="title" class="mb-1 block text-sm font-semibold text-slate-700">Judul Proyek</label>
                    <input id="title" name="title" type="text" value="{{ old('title', $portfolio->title) }}" class="w-full rounded-xl border border-slate-300 px-3 py-2.5 text-sm" required>
                </div>

                <div>
                    <label for="slug" class="mb-1 block text-sm font-semibold text-slate-700">Slug URL</label>
                    <input id="slug" name="slug" type="text" value="{{ old('slug', $portfolio->slug) }}" class="w-full rounded-xl border border-slate-300 px-3 py-2.5 text-sm" required>
                </div>

                <div>
                    <label for="category" class="mb-1 block text-sm font-semibold text-slate-700">Kategori</label>
                    <input id="category" name="category" type="text" value="{{ old('category', $portfolio->category) }}" class="w-full rounded-xl border border-slate-300 px-3 py-2.5 text-sm">
                </div>

                <div>
                    <label for="client" class="mb-1 block text-sm font-semibold text-slate-700">Nama Klien</label>
                    <input id="client" name="client" type="text" value="{{ old('client', $portfolio->client) }}" class="w-full rounded-xl border border-slate-300 px-3 py-2.5 text-sm">
                </div>

                <div>
                    <label for="url" class="mb-1 block text-sm font-semibold text-slate-700">URL Proyek</label>
                    <input id="url" name="url" type="text" value="{{ old('url', $portfolio->url) }}" class="w-full rounded-xl border border-slate-300 px-3 py-2.5 text-sm" placeholder="https://contoh.com">
                </div>

                <div>
                    <label for="published_at" class="mb-1 block text-sm font-semibold text-slate-700">Tanggal Publish</label>
                    <input id="published_at" name="published_at" type="datetime-local" value="{{ old('published_at', optional($portfolio->published_at)->format('Y-m-d\TH:i')) }}" class="w-full rounded-xl border border-slate-300 px-3 py-2.5 text-sm">
                </div>

                <div class="md:col-span-2">
                    <label for="excerpt" class="mb-1 block text-sm font-semibold text-slate-700">Ringkasan</label>
                    <textarea id="excerpt" name="excerpt" rows="3" class="w-full rounded-xl border border-slate-300 px-3 py-2.5 text-sm">{{ old('excerpt', $portfolio->excerpt) }}</textarea>
                </div>

                <div class="md:col-span-2">
                    <label for="description" class="mb-1 block text-sm font-semibold text-slate-700">Deskripsi Lengkap</label>
                    <textarea id="description" name="description" rows="10" class="w-full rounded-xl border border-slate-300 px-3 py-2.5 text-sm">{{ old('description', $portfolio->description) }}</textarea>
                </div>

                <div class="md:col-span-2">
                    <label for="challenge" class="mb-1 block text-sm font-semibold text-slate-700">Tantangan (Indonesia)</label>
                    <textarea id="challenge" name="challenge" rows="4" class="w-full rounded-xl border border-slate-300 px-3 py-2.5 text-sm" placeholder="Deskripsikan tantangan yang dihadapi dalam proyek ini...">{{ old('challenge', $portfolio->challenge ?? 'Proyek ini menghadapi tantangan kompleks dalam hal skalabilitas, performa, dan user experience yang kurang optimal untuk mencapai target bisnis.') }}</textarea>
                    <p class="mt-1 text-xs text-slate-500">Jelaskan masalah atau tantangan yang dihadapi klien sebelum proyek dimulai.</p>
                </div>

                <div class="md:col-span-2">
                    <label for="challenge_en" class="mb-1 block text-sm font-semibold text-slate-700">Challenge (English)</label>
                    <textarea id="challenge_en" name="challenge_en" rows="4" class="w-full rounded-xl border border-slate-300 px-3 py-2.5 text-sm" placeholder="Describe the challenge faced in this project...">{{ old('challenge_en', $portfolio->attributes['challenge_en'] ?? 'This project faced complex challenges in terms of scalability, performance, and suboptimal user experience to achieve business targets.') }}</textarea>
                    <p class="mt-1 text-xs text-slate-500">Explain the problem or challenge the client faced before the project started.</p>
                </div>

                <div class="md:col-span-2">
                    <label for="solution" class="mb-1 block text-sm font-semibold text-slate-700">Solusi (Indonesia)</label>
                    <textarea id="solution" name="solution" rows="4" class="w-full rounded-xl border border-slate-300 px-3 py-2.5 text-sm" placeholder="Deskripsikan solusi yang diberikan...">{{ old('solution', $portfolio->solution ?? 'Kami merancang arsitektur modern menggunakan teknologi terkini, optimasi performa end-to-end, dan implementasi best practices untuk hasil maksimal.') }}</textarea>
                    <p class="mt-1 text-xs text-slate-500">Jelaskan pendekatan dan solusi yang diterapkan untuk mengatasi tantangan.</p>
                </div>

                <div class="md:col-span-2">
                    <label for="solution_en" class="mb-1 block text-sm font-semibold text-slate-700">Solution (English)</label>
                    <textarea id="solution_en" name="solution_en" rows="4" class="w-full rounded-xl border border-slate-300 px-3 py-2.5 text-sm" placeholder="Describe the solution provided...">{{ old('solution_en', $portfolio->attributes['solution_en'] ?? 'We designed a modern architecture using cutting-edge technology, end-to-end performance optimization, and implementation of best practices for maximum results.') }}</textarea>
                    <p class="mt-1 text-xs text-slate-500">Explain the approach and solution applied to overcome the challenge.</p>
                </div>

                <div class="md:col-span-2">
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Hasil & Metrik</label>
                    <div class="space-y-3 rounded-xl border border-slate-300 p-4 bg-slate-50">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            <div>
                                <label for="metric_1_value" class="mb-1 block text-xs font-semibold text-slate-600">Metrik 1 - Nilai</label>
                                <input id="metric_1_value" name="metric_1_value" type="text" value="{{ old('metric_1_value', $portfolio->result_metrics['metric_1']['value'] ?? '+40%') }}" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm" placeholder="contoh: +40%">
                            </div>
                            <div>
                                <label for="metric_1_label" class="mb-1 block text-xs font-semibold text-slate-600">Metrik 1 - Label</label>
                                <input id="metric_1_label" name="metric_1_label" type="text" value="{{ old('metric_1_label', $portfolio->result_metrics['metric_1']['label'] ?? 'CONVERSION INCREASE') }}" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm" placeholder="contoh: CONVERSION INCREASE">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            <div>
                                <label for="metric_2_value" class="mb-1 block text-xs font-semibold text-slate-600">Metrik 2 - Nilai</label>
                                <input id="metric_2_value" name="metric_2_value" type="text" value="{{ old('metric_2_value', $portfolio->result_metrics['metric_2']['value'] ?? '2.1s') }}" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm" placeholder="contoh: 2.1s">
                            </div>
                            <div>
                                <label for="metric_2_label" class="mb-1 block text-xs font-semibold text-slate-600">Metrik 2 - Label</label>
                                <input id="metric_2_label" name="metric_2_label" type="text" value="{{ old('metric_2_label', $portfolio->result_metrics['metric_2']['label'] ?? 'LOAD TIME (AVG)') }}" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm" placeholder="contoh: LOAD TIME (AVG)">
                            </div>
                        </div>
                        <p class="text-xs text-slate-500 mt-2">Anda dapat menambahkan hingga 2 metrik untuk menunjukkan hasil pencapaian proyek.</p>
                    </div>
                </div>

                <label class="inline-flex items-center gap-3 rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-semibold text-slate-700">
                    <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $portfolio->is_featured) ? 'checked' : '' }} class="size-4 rounded border-slate-300 text-primary">
                    Tampilkan sebagai featured
                </label>
            </div>
        </div>

        <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
            <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-primary px-5 py-3 text-sm font-bold text-white transition-colors hover:bg-primary/90">
                {{ $isEdit ? 'Simpan Perubahan' : 'Buat Portfolio' }}
            </button>
            <a href="{{ route('admin.portfolio.index') }}" class="inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-700 transition-colors hover:border-slate-400">
                Batal
            </a>
        </div>
    </form>
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

    (() => {
        const titleInput = document.getElementById('title');
        const slugInput = document.getElementById('slug');
        if (!titleInput || !slugInput) return;

        const slugify = (text) => text
            .toString()
            .trim()
            .toLowerCase()
            .replace(/[^a-z0-9\s-]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-');

        let manualSlug = Boolean(slugInput.value);
        slugInput.addEventListener('input', () => {
            manualSlug = true;
        });

        titleInput.addEventListener('input', () => {
            if (!manualSlug) {
                slugInput.value = slugify(titleInput.value);
            }
        });
    })();
</script>
@endpush
