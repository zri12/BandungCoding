@extends('layouts.admin')

@section('content')
    <div class="space-y-6">
        <!-- Header Section -->
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-3xl font-bold text-slate-900">Pesan Kontak</h1>
                <p class="mt-2 text-slate-600">Kelola pesan masuk dari pengunjung website Anda.</p>
            </div>
            
            <!-- Unread Count Badge -->
            @if ($unreadCount > 0)
                <div class="inline-flex items-center gap-3 rounded-lg bg-gradient-to-r from-rose-50 to-rose-100/50 border border-rose-200 px-6 py-4 sm:w-auto">
                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-rose-500">
                        <svg class="h-5 w-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-slate-600">Pesan Baru</p>
                        <p class="text-2xl font-bold text-rose-600">{{ $unreadCount }}</p>
                    </div>
                </div>
            @endif
        </div>

        @if ($contacts->count())
            <!-- Grid View -->
            <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-1">
                @foreach ($contacts as $contact)
                    <div class="group rounded-xl border transition-all hover:shadow-lg {{ $contact->is_read ? 'border-slate-200 bg-white shadow-sm' : 'border-rose-300 bg-gradient-to-r from-rose-50/50 to-white shadow-md' }}">
                        <div class="flex flex-col gap-4 p-6 sm:flex-row sm:items-start sm:justify-between">
                            <!-- Contact Info -->
                            <div class="flex-1">
                                <div class="flex items-start gap-4">
                                    <!-- Avatar -->
                                    <div class="flex h-12 w-12 items-center justify-center rounded-lg {{ $contact->is_read ? 'bg-slate-100' : 'bg-rose-100' }}">
                                        <svg class="h-6 w-6 {{ $contact->is_read ? 'text-slate-600' : 'text-rose-600' }}" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2V5a5 5 0 00-5-5H9a5 5 0 00-5 5v1H2a1 1 0 00-1 1v3h5V7H2v4h16V7h-4v2h5V7a1 1 0 00-1-1H6z" />
                                            <path fill-rule="evenodd" d="M6 11H4v7a1 1 0 001 1h12a1 1 0 001-1v-7h-2v2h-8v-2z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    
                                    <!-- Details -->
                                    <div class="flex-1 min-w-0">
                                        <div class="flex flex-col gap-2">
                                            <h3 class="text-lg font-bold text-slate-900 truncate">{{ $contact->name }}</h3>
                                            <p class="text-sm text-slate-600 truncate">{{ $contact->email }}</p>
                                        </div>
                                        
                                        <!-- Subject -->
                                        <div class="mt-3">
                                            <p class="line-clamp-2 text-sm font-medium text-slate-700">{{ $contact->subject }}</p>
                                        </div>
                                        
                                        <!-- Meta Info -->
                                        <div class="mt-3 flex flex-wrap items-center gap-2">
                                            <span class="inline-flex items-center gap-1.5 rounded-full {{ $contact->is_read ? 'bg-slate-100 text-slate-700' : 'bg-rose-100 text-rose-700' }} px-3 py-1 text-xs font-medium">
                                                <span class="h-2 w-2 rounded-full {{ $contact->is_read ? 'bg-slate-400' : 'bg-rose-500' }}"></span>
                                                {{ $contact->is_read ? 'Sudah Dibaca' : 'Baru' }}
                                            </span>
                                            <span class="inline-flex items-center gap-1.5 rounded-full bg-blue-100 px-3 py-1 text-xs font-medium text-blue-700">
                                                <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.3A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                                </svg>
                                                {{ $contact->created_at?->format('d M Y') }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Actions -->
                            <div class="flex flex-col gap-2 sm:w-auto">
                                <a href="{{ route('admin.kontak.show', $contact) }}" class="inline-flex items-center justify-center gap-1.5 rounded-lg bg-primary/10 px-4 py-2 text-sm font-semibold text-primary transition-all hover:bg-primary hover:text-white focus:outline-none focus:ring-2 focus:ring-primary/50">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    Detail
                                </a>

                                @if (!$contact->is_read)
                                    <form action="{{ route('admin.kontak.read', $contact) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="inline-flex w-full items-center justify-center gap-1.5 rounded-lg bg-emerald-100 px-4 py-2 text-sm font-semibold text-emerald-700 transition-all hover:bg-emerald-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-emerald-500/50">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            Tandai Dibaca
                                        </button>
                                    </form>
                                @endif

                                <form action="{{ route('admin.kontak.destroy', $contact) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex w-full items-center justify-center gap-1.5 rounded-lg bg-rose-100 px-4 py-2 text-sm font-semibold text-rose-700 transition-all hover:bg-rose-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-rose-500/50">
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

            @if ($contacts->hasPages())
                <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
                    {{ $contacts->links() }}
                </div>
            @endif
        @else
            <!-- Empty State -->
            <div class="rounded-xl border-2 border-dashed border-slate-200 bg-gradient-to-br from-slate-50/50 to-slate-100/50 py-16 text-center">
                <svg class="mx-auto h-16 w-16 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <h3 class="mt-4 text-lg font-semibold text-slate-900">Belum ada pesan masuk</h3>
                <p class="mt-2 text-slate-600">Pesan dari pengunjung akan muncul di sini setelah mereka mengirimkan formulir kontak.</p>
            </div>
        @endif
    </div>
@endsection
