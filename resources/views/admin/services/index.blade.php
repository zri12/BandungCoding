@extends('layouts.admin')

@section('content')
    @php
        $totalServices = $services->count();
        $activeServices = $services->where('is_active', true)->count();
        $inactiveServices = $totalServices - $activeServices;
    @endphp

    <div class="space-y-6">
        <section class="relative overflow-hidden rounded-3xl border border-primary/20 bg-gradient-to-r from-primary via-[#0a357f] to-[#08265c] p-6 text-white shadow-xl shadow-primary/20 sm:p-7">
            <div class="absolute -right-24 -top-24 h-56 w-56 rounded-full bg-white/10 blur-3xl"></div>
            <div class="absolute -bottom-20 left-1/3 h-44 w-44 rounded-full bg-cyan-300/20 blur-3xl"></div>

            <div class="relative z-10 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                <div class="max-w-2xl">
                    <p class="text-xs font-semibold uppercase tracking-[0.18em] text-white/80">Admin Layanan</p>
                    <h3 class="mt-2 text-2xl font-extrabold tracking-tight sm:text-3xl">Kelola Layanan Website</h3>
                    <p class="mt-2 text-sm text-white/85 sm:text-base">Atur daftar layanan, status aktif, dan urutan tampil agar halaman website selalu terlihat profesional.</p>
                </div>
                <a href="{{ route('admin.layanan.create') }}" class="inline-flex items-center justify-center gap-2 rounded-xl bg-white px-5 py-3 text-sm font-bold text-primary transition-colors hover:bg-slate-100">
                    <span class="material-symbols-outlined !text-base">add</span>
                    Tambah Layanan
                </a>
            </div>
        </section>

        <section class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">
            <article class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">Total Layanan</p>
                <p class="mt-2 text-3xl font-extrabold text-slate-900">{{ $totalServices }}</p>
                <p class="mt-1 text-xs text-slate-500">Seluruh layanan terdaftar</p>
            </article>

            <article class="rounded-2xl border border-emerald-200 bg-emerald-50/70 p-4 shadow-sm">
                <p class="text-xs font-semibold uppercase tracking-wider text-emerald-700">Layanan Aktif</p>
                <p class="mt-2 text-3xl font-extrabold text-emerald-700">{{ $activeServices }}</p>
                <p class="mt-1 text-xs text-emerald-700/80">Sedang tampil di website</p>
            </article>

            <article class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">Nonaktif</p>
                <p class="mt-2 text-3xl font-extrabold text-slate-800">{{ $inactiveServices }}</p>
                <p class="mt-1 text-xs text-slate-500">Belum ditampilkan</p>
            </article>

            <article class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">Quick Action</p>
                <a href="{{ route('admin.layanan.create') }}" class="mt-3 inline-flex items-center gap-2 rounded-lg border border-primary/30 bg-primary/5 px-3 py-2 text-xs font-bold text-primary transition-colors hover:bg-primary/10">
                    <span class="material-symbols-outlined !text-base">edit_square</span>
                    Tambah Baru
                </a>
            </article>
        </section>

        <section class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">
            <div class="flex flex-col gap-3 border-b border-slate-200 px-4 py-4 sm:flex-row sm:items-center sm:justify-between sm:px-6">
                <div>
                    <h4 class="text-lg font-bold text-slate-900">Daftar Layanan</h4>
                    <p class="text-sm text-slate-500">Tampilan dioptimalkan untuk desktop dan mobile.</p>
                </div>

                <div class="relative w-full sm:w-72">
                    <span class="pointer-events-none absolute inset-y-0 left-3 flex items-center text-slate-400">
                        <span class="material-symbols-outlined !text-base">search</span>
                    </span>
                    <input id="service-search" type="text" placeholder="Cari layanan..." class="w-full rounded-xl border border-slate-300 bg-white py-2.5 pl-9 pr-3 text-sm text-slate-700 outline-none transition-colors placeholder:text-slate-400 focus:border-primary">
                </div>
            </div>

            <div class="hidden lg:block overflow-x-auto">
                <table class="w-full table-fixed text-sm">
                    <thead class="bg-slate-50 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                        <tr>
                            <th class="w-[42%] px-6 py-3">Judul</th>
                            <th class="w-[12%] px-6 py-3">Urutan</th>
                            <th class="w-[16%] px-6 py-3">Status</th>
                            <th class="w-[16%] px-6 py-3">Dibuat</th>
                            <th class="w-[14%] px-6 py-3 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="service-table-body" class="divide-y divide-slate-100 bg-white">
                        @forelse ($services as $service)
                            <tr class="service-row align-top" data-search="{{ strtolower($service->title . ' ' . $service->slug) }}">
                                <td class="px-6 py-4">
                                    <p class="font-semibold text-slate-900">{{ $service->title }}</p>
                                    <p class="mt-1 text-xs text-slate-500">/{{ $service->slug }}</p>
                                </td>
                                <td class="px-6 py-4 text-slate-700">{{ $service->sort_order }}</td>
                                <td class="px-6 py-4">
                                    @if ($service->is_active)
                                        <span class="inline-flex items-center rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-bold text-emerald-700">Aktif</span>
                                    @else
                                        <span class="inline-flex items-center rounded-full bg-slate-200 px-2.5 py-1 text-xs font-bold text-slate-600">Nonaktif</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-slate-700">{{ $service->created_at?->format('d M Y') }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('admin.layanan.edit', $service) }}" class="inline-flex items-center gap-1 rounded-lg border border-slate-300 px-3 py-1.5 text-xs font-semibold text-slate-700 transition-colors hover:border-primary hover:text-primary">
                                            <span class="material-symbols-outlined !text-sm">edit</span>
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.layanan.destroy', $service) }}" method="POST" onsubmit="return confirm('Hapus layanan ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center gap-1 rounded-lg border border-rose-200 bg-rose-50 px-3 py-1.5 text-xs font-semibold text-rose-700 transition-colors hover:bg-rose-100">
                                                <span class="material-symbols-outlined !text-sm">delete</span>
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center text-sm text-slate-500">Belum ada layanan.</td>
                            </tr>
                        @endforelse
                        @if ($services->isNotEmpty())
                            <tr id="desktop-empty-result" class="hidden">
                                <td colspan="5" class="px-6 py-12 text-center text-sm text-slate-500">Tidak ada layanan yang cocok dengan pencarian.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <div id="service-cards" class="grid gap-3 p-4 sm:p-6 lg:hidden">
                @forelse ($services as $service)
                    <article class="service-card rounded-2xl border border-slate-200 bg-white p-4" data-search="{{ strtolower($service->title . ' ' . $service->slug) }}">
                        <div class="flex items-start justify-between gap-3">
                            <div>
                                <p class="font-semibold text-slate-900">{{ $service->title }}</p>
                                <p class="mt-1 text-xs text-slate-500">/{{ $service->slug }}</p>
                            </div>
                            @if ($service->is_active)
                                <span class="inline-flex rounded-full bg-emerald-100 px-2.5 py-1 text-[11px] font-bold text-emerald-700">Aktif</span>
                            @else
                                <span class="inline-flex rounded-full bg-slate-200 px-2.5 py-1 text-[11px] font-bold text-slate-600">Nonaktif</span>
                            @endif
                        </div>

                        <dl class="mt-3 grid grid-cols-2 gap-2 text-xs">
                            <div class="rounded-lg bg-slate-50 px-2.5 py-2">
                                <dt class="text-slate-500">Urutan</dt>
                                <dd class="mt-1 font-bold text-slate-800">{{ $service->sort_order }}</dd>
                            </div>
                            <div class="rounded-lg bg-slate-50 px-2.5 py-2">
                                <dt class="text-slate-500">Dibuat</dt>
                                <dd class="mt-1 font-bold text-slate-800">{{ $service->created_at?->format('d M Y') }}</dd>
                            </div>
                        </dl>

                        <div class="mt-4 flex items-center gap-2">
                            <a href="{{ route('admin.layanan.edit', $service) }}" class="inline-flex flex-1 items-center justify-center gap-1 rounded-lg border border-slate-300 px-3 py-2 text-xs font-semibold text-slate-700">
                                <span class="material-symbols-outlined !text-sm">edit</span>
                                Edit
                            </a>
                            <form action="{{ route('admin.layanan.destroy', $service) }}" method="POST" class="flex-1" onsubmit="return confirm('Hapus layanan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex w-full items-center justify-center gap-1 rounded-lg border border-rose-200 bg-rose-50 px-3 py-2 text-xs font-semibold text-rose-700">
                                    <span class="material-symbols-outlined !text-sm">delete</span>
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </article>
                @empty
                    <p class="rounded-xl border border-slate-200 bg-slate-50 px-4 py-8 text-center text-sm text-slate-500">Belum ada layanan.</p>
                @endforelse
                @if ($services->isNotEmpty())
                    <p id="mobile-empty-result" class="hidden rounded-xl border border-slate-200 bg-slate-50 px-4 py-8 text-center text-sm text-slate-500">Tidak ada layanan yang cocok dengan pencarian.</p>
                @endif
            </div>
        </section>
    </div>
@endsection

@push('scripts')
<script>
    (() => {
        const searchInput = document.getElementById('service-search');
        const tableRows = document.querySelectorAll('.service-row');
        const cardRows = document.querySelectorAll('.service-card');
        const desktopEmpty = document.getElementById('desktop-empty-result');
        const mobileEmpty = document.getElementById('mobile-empty-result');

        if (!searchInput) return;

        const filterItems = () => {
            const keyword = searchInput.value.trim().toLowerCase();
            let desktopVisible = 0;
            let mobileVisible = 0;

            tableRows.forEach((row) => {
                const haystack = row.dataset.search || '';
                const matched = haystack.includes(keyword);
                row.classList.toggle('hidden', !matched);
                if (matched) desktopVisible += 1;
            });

            cardRows.forEach((card) => {
                const haystack = card.dataset.search || '';
                const matched = haystack.includes(keyword);
                card.classList.toggle('hidden', !matched);
                if (matched) mobileVisible += 1;
            });

            if (desktopEmpty) desktopEmpty.classList.toggle('hidden', desktopVisible > 0 || keyword === '');
            if (mobileEmpty) mobileEmpty.classList.toggle('hidden', mobileVisible > 0 || keyword === '');
        };

        searchInput.addEventListener('input', filterItems);
    })();
</script>
@endpush
