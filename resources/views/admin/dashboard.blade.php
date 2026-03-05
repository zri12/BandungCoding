@extends('layouts.admin')

@section('content')
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">
        <article class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">Layanan</p>
            <p class="mt-2 text-3xl font-extrabold text-slate-900">{{ $stats['services_total'] ?? 0 }}</p>
            <p class="mt-1 text-sm text-slate-500">Aktif: {{ $stats['services_active'] ?? 0 }}</p>
        </article>

        <article class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">Portfolio</p>
            <p class="mt-2 text-3xl font-extrabold text-slate-900">{{ $stats['portfolios_total'] ?? 0 }}</p>
            <p class="mt-1 text-sm text-slate-500">Featured: {{ $stats['portfolios_featured'] ?? 0 }}</p>
        </article>

        <article class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">Blog</p>
            <p class="mt-2 text-3xl font-extrabold text-slate-900">{{ $stats['blogs_total'] ?? 0 }}</p>
            <p class="mt-1 text-sm text-slate-500">Publish: {{ $stats['blogs_published'] ?? 0 }}</p>
        </article>

        <article class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">Pesan Kontak</p>
            <p class="mt-2 text-3xl font-extrabold text-slate-900">{{ $stats['contacts_unread'] ?? 0 }}</p>
            <p class="mt-1 text-sm text-slate-500">Belum dibaca</p>
        </article>
    </div>

    <section class="mt-6 rounded-2xl border border-slate-200 bg-gradient-to-r from-primary to-[#0a2f70] p-6 text-white shadow-lg shadow-primary/20">
        <p class="text-xs font-semibold uppercase tracking-[0.18em] text-white/80">Ringkasan Admin</p>
        <h3 class="mt-2 text-2xl font-extrabold tracking-tight">Selamat datang di panel pengelolaan {{ $companyName }}</h3>
        <p class="mt-2 max-w-3xl text-sm text-white/90 sm:text-base">Gunakan halaman ini untuk mengelola konten layanan, portfolio, blog, pesan masuk, dan pengaturan website secara terpusat.</p>

        <div class="mt-4 flex flex-wrap gap-3 text-sm font-semibold">
            <a href="{{ route('admin.layanan.create') }}" class="rounded-xl bg-white px-4 py-2.5 text-primary transition-colors hover:bg-slate-100">Tambah Layanan</a>
            <a href="{{ route('admin.portfolio.create') }}" class="rounded-xl border border-white/40 px-4 py-2.5 text-white transition-colors hover:bg-white/10">Tambah Portfolio</a>
            <a href="{{ route('admin.blog.create') }}" class="rounded-xl border border-white/40 px-4 py-2.5 text-white transition-colors hover:bg-white/10">Tulis Blog</a>
        </div>
    </section>

    <div class="mt-6 grid grid-cols-1 gap-6 xl:grid-cols-3">
        <section class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <div class="mb-4 flex items-center justify-between">
                <h4 class="text-base font-bold text-slate-900">Blog Terbaru</h4>
                <a href="{{ route('admin.blog.index') }}" class="text-xs font-semibold text-primary">Lihat Semua</a>
            </div>
            <div class="space-y-3">
                @forelse ($recentBlogs as $blog)
                    <article class="rounded-xl border border-slate-100 bg-slate-50 p-3">
                        <p class="line-clamp-1 text-sm font-semibold text-slate-800">{{ $blog->title }}</p>
                        <p class="mt-1 text-xs text-slate-500">
                            {{ $blog->published_at ? $blog->published_at->format('d M Y H:i') : 'Belum publish' }}
                        </p>
                    </article>
                @empty
                    <p class="text-sm text-slate-500">Belum ada artikel blog.</p>
                @endforelse
            </div>
        </section>

        <section class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <div class="mb-4 flex items-center justify-between">
                <h4 class="text-base font-bold text-slate-900">Portfolio Terbaru</h4>
                <a href="{{ route('admin.portfolio.index') }}" class="text-xs font-semibold text-primary">Lihat Semua</a>
            </div>
            <div class="space-y-3">
                @forelse ($recentPortfolios as $portfolio)
                    <article class="rounded-xl border border-slate-100 bg-slate-50 p-3">
                        <p class="line-clamp-1 text-sm font-semibold text-slate-800">{{ $portfolio->title }}</p>
                        <p class="mt-1 text-xs text-slate-500">
                            {{ $portfolio->category ?: 'Tanpa kategori' }}
                            @if ($portfolio->is_featured)
                                <span class="ml-2 rounded-full bg-amber-100 px-2 py-0.5 text-[10px] font-bold uppercase tracking-wide text-amber-700">Featured</span>
                            @endif
                        </p>
                    </article>
                @empty
                    <p class="text-sm text-slate-500">Belum ada portfolio.</p>
                @endforelse
            </div>
        </section>

        <section class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <div class="mb-4 flex items-center justify-between">
                <h4 class="text-base font-bold text-slate-900">Pesan Kontak Terbaru</h4>
                <a href="{{ route('admin.kontak.index') }}" class="text-xs font-semibold text-primary">Lihat Semua</a>
            </div>
            <div class="space-y-3">
                @forelse ($recentContacts as $contact)
                    <article class="rounded-xl border border-slate-100 bg-slate-50 p-3">
                        <div class="flex items-center justify-between gap-2">
                            <p class="line-clamp-1 text-sm font-semibold text-slate-800">{{ $contact->name }}</p>
                            @if (! $contact->is_read)
                                <span class="rounded-full bg-rose-100 px-2 py-0.5 text-[10px] font-bold uppercase tracking-wide text-rose-700">Baru</span>
                            @endif
                        </div>
                        <p class="mt-1 line-clamp-1 text-xs text-slate-500">{{ $contact->subject }}</p>
                    </article>
                @empty
                    <p class="text-sm text-slate-500">Belum ada pesan kontak.</p>
                @endforelse
            </div>
        </section>
    </div>
@endsection
