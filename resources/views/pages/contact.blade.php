@extends('layouts.app')

@section('content')
@php
    use App\Domain\Setting\Models\Setting;
    $phone = Setting::getValue('company_phone', config('bandungcoding.company.phone', '+62 812-xxxx-xxxx'));
    $email = Setting::getValue('company_email', config('bandungcoding.company.email', 'hello@bandungcoding.com'));
    $address = Setting::getValue('company_address', config('bandungcoding.company.address', __('messages.contact.info_address')));

    // Use dedicated whatsapp_number if set, otherwise derive from phone
    $waRaw = Setting::getValue('whatsapp_number', $phone);
    $waNumber = preg_replace('/\D+/', '', (string) $waRaw);
    if ($waNumber && str_starts_with($waNumber, '0')) {
        $waNumber = '62' . substr($waNumber, 1);
    }

    $waLink = $waNumber ? ('https://wa.me/' . $waNumber) : '#';
    $mapLink = 'https://www.google.com/maps/search/?api=1&query=' . urlencode($address);
@endphp

<section class="mx-auto max-w-7xl px-4 pb-20 pt-32 sm:px-6 lg:pt-36" data-animate="fade-up">
    <section class="relative overflow-hidden rounded-3xl border border-primary/20 bg-gradient-to-br from-primary via-[#0a3a8a] to-[#0b1f4f] px-8 py-12 text-white shadow-[0_24px_60px_rgba(11,61,147,0.25)] lg:px-12 lg:py-16">
        <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_12%_20%,rgba(255,255,255,0.2),transparent_45%)]"></div>
        <div class="pointer-events-none absolute -right-14 -top-14 h-52 w-52 rounded-full bg-white/10 blur-3xl"></div>

        <div class="relative z-10 max-w-3xl">
            <p class="mb-4 inline-flex rounded-full border border-white/25 bg-white/10 px-4 py-1 text-xs font-semibold uppercase tracking-widest text-white/85">
                {{ __('messages.contact.hero_badge') }}
            </p>
            <h1 class="mb-5 text-4xl font-black leading-tight tracking-tight md:text-5xl lg:text-6xl">
                {{ __('messages.contact.hero_title') }}
            </h1>
            <p class="mb-8 max-w-2xl text-base leading-relaxed text-white/90 md:text-lg">
                {{ __('messages.contact.hero_desc') }}
            </p>

            <div class="grid grid-cols-1 gap-3 sm:grid-cols-3">
                <article class="rounded-2xl border border-white/25 bg-white/10 p-4 backdrop-blur-sm">
                    <p class="text-xs font-semibold uppercase tracking-wider text-white/70">{{ __('messages.contact.hero_stat_response') }}</p>
                    <p class="mt-1 text-xl font-extrabold">&lt; 24h</p>
                </article>
                <article class="rounded-2xl border border-white/25 bg-white/10 p-4 backdrop-blur-sm">
                    <p class="text-xs font-semibold uppercase tracking-wider text-white/70">{{ __('messages.contact.hero_stat_projects') }}</p>
                    <p class="mt-1 text-xl font-extrabold">100+</p>
                </article>
                <article class="rounded-2xl border border-white/25 bg-white/10 p-4 backdrop-blur-sm">
                    <p class="text-xs font-semibold uppercase tracking-wider text-white/70">{{ __('messages.contact.hero_stat_support') }}</p>
                    <p class="mt-1 text-xl font-extrabold">{{ __('messages.contact.hero_stat_support_value') }}</p>
                </article>
            </div>
        </div>
    </section>

    <section class="mt-10 grid grid-cols-1 gap-8 lg:grid-cols-[1.15fr_0.85fr]" data-animate="fade-up" data-delay="200">
        <article class="rounded-3xl border border-slate-200 bg-white p-7 shadow-sm dark:border-slate-700 dark:bg-slate-900 lg:p-9">
            <h2 class="mb-2 text-2xl font-black tracking-tight text-slate-900 dark:text-slate-100">{{ __('messages.contact.form_title') }}</h2>
            <p class="mb-6 text-sm leading-relaxed text-slate-600 dark:text-slate-400">{{ __('messages.contact.form_desc') }}</p>

            @if (session('success'))
                <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm font-medium text-green-700 dark:border-green-800 dark:bg-green-900/20 dark:text-green-300">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                @csrf

                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                    <div>
                        <label for="name" class="mb-2 block text-sm font-bold text-slate-700 dark:text-slate-300">{{ __('messages.contact.form_name') }}</label>
                        <input type="text"
                               id="name"
                               name="name"
                               value="{{ old('name') }}"
                               required
                               class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none transition-all focus:border-primary focus:bg-white dark:border-slate-700 dark:bg-slate-800 dark:text-white"
                               placeholder="{{ __('messages.contact.form_name_ph') }}">
                        @error('name')
                            <p class="mt-1 text-xs font-medium text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="mb-2 block text-sm font-bold text-slate-700 dark:text-slate-300">{{ __('messages.contact.form_email') }}</label>
                        <input type="email"
                               id="email"
                               name="email"
                               value="{{ old('email') }}"
                               required
                               class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none transition-all focus:border-primary focus:bg-white dark:border-slate-700 dark:bg-slate-800 dark:text-white"
                               placeholder="{{ __('messages.contact.form_email_ph') }}">
                        @error('email')
                            <p class="mt-1 text-xs font-medium text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                    <div>
                        <label for="phone" class="mb-2 block text-sm font-bold text-slate-700 dark:text-slate-300">{{ __('messages.contact.form_phone') }}</label>
                        <input type="text"
                               id="phone"
                               name="phone"
                               value="{{ old('phone') }}"
                               class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none transition-all focus:border-primary focus:bg-white dark:border-slate-700 dark:bg-slate-800 dark:text-white"
                               placeholder="{{ __('messages.contact.form_phone_ph') }}">
                        @error('phone')
                            <p class="mt-1 text-xs font-medium text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="subject" class="mb-2 block text-sm font-bold text-slate-700 dark:text-slate-300">{{ __('messages.contact.form_subject') }}</label>
                        <input type="text"
                               id="subject"
                               name="subject"
                               value="{{ old('subject') }}"
                               required
                               class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none transition-all focus:border-primary focus:bg-white dark:border-slate-700 dark:bg-slate-800 dark:text-white"
                               placeholder="{{ __('messages.contact.form_subject_ph') }}">
                        @error('subject')
                            <p class="mt-1 text-xs font-medium text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="message" class="mb-2 block text-sm font-bold text-slate-700 dark:text-slate-300">{{ __('messages.contact.form_message') }}</label>
                    <textarea id="message"
                              name="message"
                              rows="6"
                              required
                              class="w-full resize-none rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none transition-all focus:border-primary focus:bg-white dark:border-slate-700 dark:bg-slate-800 dark:text-white"
                              placeholder="{{ __('messages.contact.form_message_ph') }}">{{ old('message') }}</textarea>
                    @error('message')
                        <p class="mt-1 text-xs font-medium text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-primary px-6 py-3.5 text-sm font-bold text-white shadow-lg shadow-primary/20 transition-all hover:bg-primary/90 sm:w-auto">
                    {{ __('messages.contact.form_submit') }}
                    <span class="material-symbols-outlined !text-base">send</span>
                </button>

                <p class="text-xs text-slate-500 dark:text-slate-400">{{ __('messages.contact.form_note') }}</p>
            </form>
        </article>

        <aside class="space-y-5">
            <article class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-700 dark:bg-slate-900">
                <h3 class="mb-4 text-lg font-bold text-slate-900 dark:text-slate-100">{{ __('messages.contact.info_title') }}</h3>

                <div class="space-y-4">
                    <div class="rounded-xl border border-slate-200 p-4 dark:border-slate-700">
                        <div class="mb-2 flex items-center gap-2 text-primary">
                            <span class="material-symbols-outlined">chat</span>
                            <p class="text-sm font-bold text-slate-900 dark:text-slate-100">{{ __('messages.contact.info_whatsapp') }}</p>
                        </div>
                        <p class="text-sm text-slate-600 dark:text-slate-400">{{ $phone }}</p>
                        <a href="{{ $waLink }}" target="_blank" rel="noopener noreferrer" class="mt-2 inline-flex items-center gap-1 text-sm font-semibold text-primary transition-colors hover:text-primary/80">
                            {{ __('messages.contact.info_chat') }}
                            <span class="material-symbols-outlined !text-base">arrow_forward</span>
                        </a>
                    </div>

                    <div class="rounded-xl border border-slate-200 p-4 dark:border-slate-700">
                        <div class="mb-2 flex items-center gap-2 text-primary">
                            <span class="material-symbols-outlined">mail</span>
                            <p class="text-sm font-bold text-slate-900 dark:text-slate-100">{{ __('messages.contact.info_email') }}</p>
                        </div>
                        <p class="text-sm text-slate-600 dark:text-slate-400">{{ $email }}</p>
                        <a href="mailto:{{ $email }}" class="mt-2 inline-flex items-center gap-1 text-sm font-semibold text-primary transition-colors hover:text-primary/80">
                            {{ __('messages.contact.info_send') }}
                            <span class="material-symbols-outlined !text-base">arrow_forward</span>
                        </a>
                    </div>
                </div>
            </article>
        </aside>
    </section>
</section>
@endsection
