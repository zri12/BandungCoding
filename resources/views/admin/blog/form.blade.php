@extends('layouts.admin')

@section('content')
    @php
        $isEdit = $blog->exists;
    @endphp

    <form action="{{ $formAction }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @if ($formMethod !== 'POST')
            @method($formMethod)
        @endif

        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <h3 class="text-lg font-bold text-slate-900">Informasi Utama</h3>
            <div class="mt-5 grid grid-cols-1 gap-4 md:grid-cols-2">
                <div class="md:col-span-2">
                    <label for="title" class="mb-1 block text-sm font-semibold text-slate-700">Judul Artikel</label>
                    <input id="title" name="title" type="text" value="{{ old('title', $blog->title) }}" class="w-full rounded-xl border border-slate-300 px-3 py-2.5 text-sm" required>
                </div>

                <div>
                    <label for="slug" class="mb-1 block text-sm font-semibold text-slate-700">Slug URL</label>
                    <input id="slug" name="slug" type="text" value="{{ old('slug', $blog->slug) }}" class="w-full rounded-xl border border-slate-300 px-3 py-2.5 text-sm" required>
                </div>

                <div>
                    <label for="author" class="mb-1 block text-sm font-semibold text-slate-700">Penulis</label>
                    <input id="author" name="author" type="text" value="{{ old('author', $blog->author) }}" class="w-full rounded-xl border border-slate-300 px-3 py-2.5 text-sm">
                </div>

                <div>
                    <label for="category" class="mb-1 block text-sm font-semibold text-slate-700">Kategori</label>
                    <input id="category" name="category" type="text" value="{{ old('category', $blog->category) }}" class="w-full rounded-xl border border-slate-300 px-3 py-2.5 text-sm">
                </div>

                <div>
                    <label class="mb-1 block text-sm font-semibold text-slate-700">Gambar Artikel</label>
                    <div class="flex min-h-[180px] cursor-pointer flex-col items-center justify-center gap-2 rounded-xl border-2 border-dashed border-slate-300 bg-slate-50 p-4 text-center transition-colors hover:border-primary hover:bg-primary/5"
                         onclick="openCropperForInput('image',16/9,'prev_image','ph_image','lbl_image','Gambar Artikel — 16:9 (1200×675px)')">
                        <input id="image" name="image" type="file" accept="image/*" class="hidden">
                        <img id="prev_image"
                             src="{{ $blog->image ? asset('storage/'.$blog->image) : '' }}"
                             alt="Preview"
                             style="max-height:160px;max-width:100%;object-fit:contain;border-radius:8px;"
                             class="{{ $blog->image ? '' : 'hidden' }}">
                        <div id="ph_image" class="{{ $blog->image ? 'hidden' : '' }}">
                            <svg class="mx-auto h-10 w-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <p class="mt-2 text-sm font-medium text-slate-600">Pilih gambar artikel</p>
                            <p class="text-xs text-slate-400">PNG, JPG, WebP (Max 2MB)</p>
                        </div>
                        <p id="lbl_image" class="text-xs text-slate-400">{{ $blog->image ? 'Klik untuk mengganti' : '' }}</p>
                    </div>
                </div>

                <div class="md:col-span-2">
                    <label for="excerpt" class="mb-1 block text-sm font-semibold text-slate-700">Ringkasan</label>
                    <textarea id="excerpt" name="excerpt" rows="3" class="w-full rounded-xl border border-slate-300 px-3 py-2.5 text-sm">{{ old('excerpt', $blog->excerpt) }}</textarea>
                </div>

                <div class="md:col-span-2">
                    <label for="content" class="mb-1 block text-sm font-semibold text-slate-700">Konten Artikel (HTML diizinkan)</label>
                    <textarea id="content" name="content" rows="14" class="w-full rounded-xl border border-slate-300 px-3 py-2.5 text-sm">{{ old('content', $blog->content) }}</textarea>
                </div>

                <div class="md:col-span-2">
                    <label for="tags" class="mb-1 block text-sm font-semibold text-slate-700">Tags (pisahkan dengan koma)</label>
                    <input id="tags" name="tags" type="text" value="{{ old('tags', is_array($blog->tags) ? implode(', ', $blog->tags) : '') }}" class="w-full rounded-xl border border-slate-300 px-3 py-2.5 text-sm" placeholder="laravel, uiux, react">
                </div>
            </div>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <h3 class="text-lg font-bold text-slate-900">SEO & Publikasi</h3>
            <div class="mt-5 grid grid-cols-1 gap-4 md:grid-cols-2">
                <div>
                    <label for="meta_title" class="mb-1 block text-sm font-semibold text-slate-700">Meta Title</label>
                    <input id="meta_title" name="meta_title" type="text" value="{{ old('meta_title', $blog->meta_title) }}" class="w-full rounded-xl border border-slate-300 px-3 py-2.5 text-sm">
                </div>

                <div>
                    <label for="published_at" class="mb-1 block text-sm font-semibold text-slate-700">Tanggal Publish</label>
                    <input id="published_at" name="published_at" type="datetime-local" value="{{ old('published_at', optional($blog->published_at)->format('Y-m-d\TH:i')) }}" class="w-full rounded-xl border border-slate-300 px-3 py-2.5 text-sm">
                </div>

                <div class="md:col-span-2">
                    <label for="meta_description" class="mb-1 block text-sm font-semibold text-slate-700">Meta Description</label>
                    <textarea id="meta_description" name="meta_description" rows="3" class="w-full rounded-xl border border-slate-300 px-3 py-2.5 text-sm">{{ old('meta_description', $blog->meta_description) }}</textarea>
                </div>

                <label class="inline-flex items-center gap-3 rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-semibold text-slate-700">
                    <input type="checkbox" name="is_published" value="1" {{ old('is_published', $blog->is_published) ? 'checked' : '' }} class="size-4 rounded border-slate-300 text-primary">
                    Publish artikel
                </label>
            </div>
        </div>

        <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
            <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-primary px-5 py-3 text-sm font-bold text-white transition-colors hover:bg-primary/90">
                {{ $isEdit ? 'Simpan Perubahan' : 'Buat Artikel' }}
            </button>
            <a href="{{ route('admin.blog.index') }}" class="inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-700 transition-colors hover:border-slate-400">
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
