@extends('layouts.admin')

@section('content')
    <div class="space-y-6">
        <!-- Header Section -->
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-3xl font-bold text-slate-900">Manajemen Klien</h1>
                <p class="mt-2 text-slate-600">Kelola data klien dan partner perusahaan Anda.</p>
            </div>
            <a href="{{ route('admin.klien.create') }}" class="inline-flex items-center justify-center gap-2 rounded-lg bg-gradient-to-r from-primary to-blue-600 px-6 py-3 text-sm font-semibold text-white shadow-lg transition-all hover:shadow-xl hover:scale-105 focus:outline-none focus:ring-2 focus:ring-primary/50">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Klien
            </a>
        </div>

        @if ($clients->count())
            <!-- Grid View -->
            <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-1">
                @foreach ($clients as $client)
                    <div class="group rounded-xl border border-slate-200 bg-white shadow-sm transition-all hover:border-primary/50 hover:shadow-lg">
                        <div class="flex flex-col gap-4 p-6 sm:flex-row sm:items-center sm:justify-between">
                            <!-- Client Info -->
                            <div class="flex-1">
                                <div class="flex items-start gap-4">
                                    <!-- Logo/Avatar -->
                                    @if ($client->logo)
                                        <img src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->name }}" class="h-12 w-12 rounded-lg object-contain bg-slate-100 p-2" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                                        <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-gradient-to-br from-blue-500/10 to-primary/10 font-bold text-primary text-xs uppercase" style="display:none;">
                                            {{ substr($client->name, 0, 2) }}
                                        </div>
                                    @else
                                        <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-gradient-to-br from-blue-500/10 to-primary/10 font-bold text-primary text-xs uppercase">
                                            {{ substr($client->name, 0, 2) }}
                                        </div>
                                    @endif
                                    
                                    <!-- Details -->
                                    <div class="flex-1 min-w-0">
                                        <h3 class="text-lg font-bold text-slate-900 truncate">{{ $client->name }}</h3>
                                        <p class="mt-1 text-sm text-slate-500 line-clamp-2">{{ $client->description ?? 'Tidak ada deskripsi' }}</p>
                                        
                                        <!-- Meta Info -->
                                        <div class="mt-3 flex flex-wrap items-center gap-2">
                                            @if ($client->website)
                                                <a href="{{ $client->website }}" target="_blank" class="inline-flex items-center gap-1.5 rounded-full bg-blue-100 px-3 py-1 text-xs font-medium text-blue-700 hover:bg-blue-200 transition-colors">
                                                    <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M11 3a1 1 0 10-2 0v1a1 1 0 102 0V3zM15.657 5.757a1 1 0 00-1.414-1.414l-.707.707a1 1 0 001.414 1.414l.707-.707zM18 10a1 1 0 01-1 1h-1a1 1 0 110-2h1a1 1 0 011 1zM15.657 14.243a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414l.707.707zM11 17a1 1 0 102 0v-1a1 1 0 10-2 0v1zM5.757 15.657a1 1 0 00-1.414-1.414l-.707.707a1 1 0 001.414 1.414l.707-.707zM3 10a1 1 0 01-1-1V8a1 1 0 012 0v1a1 1 0 01-1 1zM5.757 5.757a1 1 0 000-1.414L5.05 3.636a1 1 0 10-1.414 1.414l.707.707z" />
                                                    </svg>
                                                    Website
                                                </a>
                                            @endif

                                            @if ($client->is_featured)
                                                <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-100 px-3 py-1 text-xs font-medium text-amber-700">
                                                    <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                    </svg>
                                                    Featured
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Actions -->
                            <div class="flex flex-col gap-2 sm:w-auto">
                                <a href="{{ route('admin.klien.edit', $client) }}" class="inline-flex items-center justify-center gap-1.5 rounded-lg bg-primary/10 px-4 py-2 text-sm font-semibold text-primary transition-all hover:bg-primary hover:text-white focus:outline-none focus:ring-2 focus:ring-primary/50">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    Edit
                                </a>
                                <form action="{{ route('admin.klien.destroy', $client) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-full inline-flex items-center justify-center gap-1.5 rounded-lg bg-rose-100 px-4 py-2 text-sm font-semibold text-rose-700 transition-all hover:bg-rose-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-rose-500/50">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if ($clients->hasPages())
                <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
                    {{ $clients->links() }}
                </div>
            @endif
        @else
            <!-- Empty State -->
            <div class="rounded-xl border-2 border-dashed border-slate-200 bg-gradient-to-br from-slate-50/50 to-slate-100/50 py-16 text-center">
                <svg class="mx-auto h-16 w-16 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5.581m0 0H9m5.581 0a2 2 0 100-4 2 2 0 000 4zM9 7h.01M9 3a1 1 0 100 2 1 1 0 000-2z" />
                </svg>
                <h3 class="mt-4 text-lg font-semibold text-slate-900">Belum ada klien</h3>
                <p class="mt-2 text-slate-600">Mulai dengan menambahkan klien pertama Anda.</p>
                <a href="{{ route('admin.klien.create') }}" class="mt-6 inline-flex items-center justify-center gap-2 rounded-lg bg-primary px-6 py-3 text-sm font-semibold text-white shadow-lg transition-all hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-primary/50">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Klien Pertama
                </a>
            </div>
        @endif
    </div>
@endsection
