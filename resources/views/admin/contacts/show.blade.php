@extends('layouts.admin')

@section('content')
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-[minmax(0,1fr)_320px]">
        <article class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <div class="mb-4 flex items-start justify-between gap-3 border-b border-slate-200 pb-4">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">Pesan dari</p>
                    <h3 class="text-xl font-bold text-slate-900">{{ $contact->name }}</h3>
                    <p class="mt-1 text-sm text-slate-600">{{ $contact->email }} @if($contact->phone) • {{ $contact->phone }} @endif</p>
                </div>
                @if ($contact->is_read)
                    <span class="inline-flex rounded-full bg-slate-200 px-2.5 py-1 text-xs font-bold text-slate-600">Sudah Dibaca</span>
                @else
                    <span class="inline-flex rounded-full bg-rose-100 px-2.5 py-1 text-xs font-bold text-rose-700">Baru</span>
                @endif
            </div>

            <h4 class="text-base font-bold text-slate-900">{{ $contact->subject }}</h4>
            <div class="mt-3 whitespace-pre-wrap text-sm leading-relaxed text-slate-700">{{ $contact->message }}</div>
        </article>

        <aside class="space-y-4">
            <article class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                <h4 class="text-sm font-bold uppercase tracking-wider text-slate-700">Info Pesan</h4>
                <dl class="mt-3 space-y-2 text-sm">
                    <div class="flex items-start justify-between gap-3">
                        <dt class="text-slate-500">Dikirim</dt>
                        <dd class="font-semibold text-slate-800">{{ $contact->created_at?->format('d M Y H:i') }}</dd>
                    </div>
                    <div class="flex items-start justify-between gap-3">
                        <dt class="text-slate-500">Status</dt>
                        <dd class="font-semibold text-slate-800">{{ $contact->is_read ? 'Sudah dibaca' : 'Belum dibaca' }}</dd>
                    </div>
                </dl>
            </article>

            <div class="space-y-2">
                <a href="mailto:{{ $contact->email }}?subject={{ rawurlencode('Re: '.$contact->subject) }}" class="inline-flex w-full items-center justify-center rounded-xl bg-primary px-4 py-2.5 text-sm font-bold text-white transition-colors hover:bg-primary/90">Balas via Email</a>
                <a href="{{ route('admin.kontak.index') }}" class="inline-flex w-full items-center justify-center rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 transition-colors hover:border-slate-400">Kembali ke Inbox</a>
            </div>
        </aside>
    </div>
@endsection
