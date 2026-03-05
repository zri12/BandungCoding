@extends('layouts.admin')

@section('content')
    <div class="space-y-6">
        <!-- Header Section -->
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-3xl font-bold text-slate-900">Manajemen Tim</h1>
                <p class="mt-2 text-slate-600">Kelola data anggota tim dan leadership perusahaan Anda.</p>
            </div>
            <a href="{{ route('admin.tim.create') }}" class="inline-flex items-center justify-center gap-2 rounded-lg bg-gradient-to-r from-primary to-blue-600 px-6 py-3 text-sm font-semibold text-white shadow-lg transition-all hover:shadow-xl hover:scale-105 focus:outline-none focus:ring-2 focus:ring-primary/50">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Anggota Tim
            </a>
        </div>

        @if ($teams->count())
            <!-- Grid View -->
            <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-1">
                @foreach ($teams as $team)
                    <div class="group rounded-xl border border-slate-200 bg-white shadow-sm transition-all hover:border-primary/50 hover:shadow-lg">
                        <div class="flex flex-col gap-4 p-6 sm:flex-row sm:items-center sm:justify-between">
                            <!-- Team Member Info -->
                            <div class="flex-1">
                                <div class="flex items-start gap-4">
                                    <!-- Photo/Avatar -->
                                    @if ($team->photo)
                                        <img src="{{ asset('storage/' . $team->photo) }}" alt="{{ $team->name }}" class="h-16 w-16 rounded-full object-cover" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                                        <div class="flex h-16 w-16 items-center justify-center rounded-full bg-gradient-to-br {{ $team->accent_class }} text-lg font-extrabold text-white" style="display:none;">
                                            {{ $team->initial }}
                                        </div>
                                    @else
                                        <div class="flex h-16 w-16 items-center justify-center rounded-full bg-gradient-to-br {{ $team->accent_class }} text-lg font-extrabold text-white">
                                            {{ $team->initial }}
                                        </div>
                                    @endif
                                    
                                    <!-- Details -->
                                    <div class="flex-1 min-w-0">
                                        <h3 class="text-lg font-bold text-slate-900 truncate">{{ $team->name }}</h3>
                                        <p class="mt-1 text-sm font-medium text-primary">{{ $team->role }}</p>
                                        @if ($team->bio)
                                            <p class="mt-2 text-sm text-slate-500 line-clamp-2">{{ $team->bio }}</p>
                                        @endif
                                        
                                        <!-- Meta Info -->
                                        <div class="mt-3 flex flex-wrap items-center gap-2">
                                            @if ($team->email)
                                                <span class="inline-flex items-center gap-1.5 rounded-full bg-blue-100 px-3 py-1 text-xs font-medium text-blue-700">
                                                    <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                                    </svg>
                                                    {{ $team->email }}
                                                </span>
                                            @endif

                                            @if ($team->linkedin)
                                                <a href="{{ $team->linkedin }}" target="_blank" class="inline-flex items-center gap-1.5 rounded-full bg-blue-600 px-3 py-1 text-xs font-medium text-white hover:bg-blue-700 transition-colors">
                                                    <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84"></path>
                                                    </svg>
                                                    LinkedIn
                                                </a>
                                            @endif

                                            <span class="inline-flex items-center gap-1.5 rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-700">
                                                Order: {{ $team->order }}
                                            </span>

                                            @if ($team->is_active)
                                                <span class="inline-flex items-center gap-1.5 rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-700">
                                                    <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                                    </svg>
                                                    Aktif
                                                </span>
                                            @else
                                                <span class="inline-flex items-center gap-1.5 rounded-full bg-red-100 px-3 py-1 text-xs font-medium text-red-700">
                                                    <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                                    </svg>
                                                    Tidak Aktif
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Actions -->
                            <div class="flex flex-col gap-2 sm:w-auto">
                                <a href="{{ route('admin.tim.edit', $team) }}" class="inline-flex items-center justify-center gap-1.5 rounded-lg bg-primary/10 px-4 py-2 text-sm font-semibold text-primary transition-all hover:bg-primary hover:text-white focus:outline-none focus:ring-2 focus:ring-primary/50">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    Edit
                                </a>
                                <form action="{{ route('admin.tim.destroy', $team) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus anggota tim ini?')" class="inline">
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

            @if ($teams->hasPages())
                <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
                    {{ $teams->links() }}
                </div>
            @endif
        @else
            <!-- Empty State -->
            <div class="rounded-xl border-2 border-dashed border-slate-200 bg-gradient-to-br from-slate-50/50 to-slate-100/50 py-16 text-center">
                <svg class="mx-auto h-16 w-16 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                <h3 class="mt-4 text-xl font-semibold text-slate-900">Belum ada anggota tim</h3>
                <p class="mt-2 text-slate-500">Mulai tambahkan anggota tim perusahaan Anda.</p>
                <a href="{{ route('admin.tim.create') }}" class="mt-6 inline-flex items-center gap-2 rounded-lg bg-primary px-6 py-3 text-sm font-semibold text-white transition-all hover:bg-primary/90">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Anggota Tim
                </a>
            </div>
        @endif
    </div>
@endsection
