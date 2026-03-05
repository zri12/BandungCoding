@extends('layouts.admin')

@section('content')
    <div class="space-y-6">
        <!-- Header Section -->
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-3xl font-bold text-slate-900">Manajemen Portfolio</h1>
                <p class="mt-2 text-slate-600">Kelola proyek yang ditampilkan pada halaman portfolio Anda.</p>
            </div>
            <a href="{{ route('admin.portfolio.create') }}" class="inline-flex items-center justify-center gap-2 rounded-lg bg-gradient-to-r from-primary to-blue-600 px-6 py-3 text-sm font-semibold text-white shadow-lg transition-all hover:shadow-xl hover:scale-105 focus:outline-none focus:ring-2 focus:ring-primary/50">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Portfolio
            </a>
        </div>

        @if ($portfolios->count())
            <!-- Grid View -->
            <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-1">
                @foreach ($portfolios as $portfolio)
                    <div class="group rounded-xl border border-slate-200 bg-white shadow-sm transition-all hover:border-primary/50 hover:shadow-lg">
                        <div class="flex flex-col gap-4 p-6 sm:flex-row sm:items-center sm:justify-between">
                            <!-- Portfolio Info -->
                            <div class="flex-1">
                                <div class="flex items-start gap-4">
                                    <!-- Icon -->
                                    <div class="hidden rounded-lg bg-gradient-to-br from-blue-500/10 to-primary/10 p-3 sm:flex">
                                        <svg class="h-6 w-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                        </svg>
                                    </div>
                                    
                                    <!-- Title & Details -->
                                    <div class="flex-1 min-w-0">
                                        <h3 class="text-lg font-bold text-slate-900 truncate">{{ $portfolio->title }}</h3>
                                        <p class="mt-1 text-sm text-slate-500">{{ $portfolio->slug }}</p>
                                        
                                        <!-- Meta Info -->
                                        <div class="mt-3 flex flex-wrap items-center gap-3">
                                            @if ($portfolio->category)
                                                <span class="inline-flex items-center gap-1.5 rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-700">
                                                    <span class="h-2 w-2 rounded-full bg-slate-400"></span>
                                                    {{ $portfolio->category }}
                                                </span>
                                            @endif
                                            
                                            @if ($portfolio->client)
                                                <span class="inline-flex items-center gap-1.5 rounded-full bg-blue-100 px-3 py-1 text-xs font-medium text-blue-700">
                                                    <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM9 12a6 6 0 11-12 0 6 6 0 0112 0z" />
                                                    </svg>
                                                    {{ $portfolio->client }}
                                                </span>
                                            @endif
                                            
                                            @if ($portfolio->is_featured)
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

                            <!-- Status & Actions -->
                            <div class="flex flex-col gap-3 sm:w-auto">
                                <!-- Publish Status -->
                                <div class="flex items-center gap-2 text-sm">
                                    @if ($portfolio->published_at)
                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-green-100 px-3 py-1.5 font-medium text-green-700">
                                            <span class="h-2 w-2 rounded-full bg-green-500"></span>
                                            {{ $portfolio->published_at->format('d M Y') }}
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-slate-100 px-3 py-1.5 font-medium text-slate-700">
                                            <span class="h-2 w-2 rounded-full bg-slate-400"></span>
                                            Draft
                                        </span>
                                    @endif
                                </div>

                                <!-- Action Buttons -->
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.portfolio.edit', $portfolio) }}" class="inline-flex items-center justify-center gap-1.5 rounded-lg bg-primary/10 px-4 py-2 text-sm font-semibold text-primary transition-all hover:bg-primary hover:text-white focus:outline-none focus:ring-2 focus:ring-primary/50">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.portfolio.destroy', $portfolio) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin?')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center justify-center gap-1.5 rounded-lg bg-rose-100 px-4 py-2 text-sm font-semibold text-rose-700 transition-all hover:bg-rose-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-rose-500/50">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Empty State -->
            <div class="rounded-xl border-2 border-dashed border-slate-200 bg-gradient-to-br from-slate-50/50 to-slate-100/50 py-16 text-center">
                <svg class="mx-auto h-16 w-16 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <h3 class="mt-4 text-lg font-semibold text-slate-900">Belum ada portfolio</h3>
                <p class="mt-2 text-slate-600">Mulai dengan membuat portfolio pertama Anda untuk menampilkan karya terbaik.</p>
                <a href="{{ route('admin.portfolio.create') }}" class="mt-6 inline-flex items-center justify-center gap-2 rounded-lg bg-primary px-6 py-3 text-sm font-semibold text-white shadow-lg transition-all hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-primary/50">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Buat Portfolio Pertama
                </a>
            </div>
        @endif
    </div>
@endsection
