@extends('layouts.app')

@section('content')
@php
    use App\Domain\Setting\Models\Setting;
    
    // Generate WhatsApp link for pricing buttons
    $whatsappNumber = Setting::getValue('whatsapp_number', '');
    $whatsappLink = Setting::getValue('whatsapp_link', '');
    
    if (empty($whatsappLink) && !empty($whatsappNumber)) {
        $cleanNumber = preg_replace('/[^0-9]/', '', $whatsappNumber);
        $whatsappLink = "https://wa.me/{$cleanNumber}?text=" . urlencode('Halo, saya tertarik dengan layanan BandungCoding. Saya ingin konsultasi tentang paket layanan yang tersedia.');
    }
    
    if (empty($whatsappLink)) {
        $whatsappLink = route('contact');
    }
    
    $iconMap = [
        'globe' => 'language',
        'device-mobile' => 'smartphone',
        'palette' => 'palette',
        'code' => 'deployed_code',
        'light-bulb' => 'lightbulb',
        'cloud' => 'cloud',
    ];

    $serviceIcon = $iconMap[$service->icon] ?? 'deployed_code';
    $heroImage = $service->image ? asset($service->image) : 'https://images.unsplash.com/photo-1461749280684-dccba630e2f6?auto=format&fit=crop&w=1600&q=80';

    $steps = [
        ['title' => __('messages.services.show_step_1_title'), 'label' => __('messages.services.show_step_label', ['num' => 1]), 'desc' => __('messages.services.show_step_1_desc'), 'icon' => 'lightbulb'],
        ['title' => __('messages.services.show_step_2_title'), 'label' => __('messages.services.show_step_label', ['num' => 2]), 'desc' => __('messages.services.show_step_2_desc'), 'icon' => 'draw'],
        ['title' => __('messages.services.show_step_3_title'), 'label' => __('messages.services.show_step_label', ['num' => 3]), 'desc' => __('messages.services.show_step_3_desc'), 'icon' => 'code'],
        ['title' => __('messages.services.show_step_4_title'), 'label' => __('messages.services.show_step_label', ['num' => 4]), 'desc' => __('messages.services.show_step_4_desc'), 'icon' => 'fact_check'],
        ['title' => __('messages.services.show_step_5_title'), 'label' => __('messages.services.show_step_label', ['num' => 5]), 'desc' => __('messages.services.show_step_5_desc'), 'icon' => 'rocket_launch'],
    ];

    $toolsBySlug = [
        'web-development' => ['React.js', 'Node.js', 'PostgreSQL', 'AWS', 'Tailwind', 'TypeScript', 'Next.js', 'GraphQL'],
        'mobile-app-development' => ['Flutter', 'Kotlin', 'Swift', 'Firebase', 'Supabase', 'Node.js', 'TypeScript', 'Figma'],
        'ui-ux-design' => ['Figma', 'FigJam', 'Notion', 'Maze', 'Illustrator', 'Photoshop', 'Lottie', 'Storybook'],
        'custom-software' => ['Laravel', 'Node.js', 'PostgreSQL', 'Redis', 'Docker', 'RabbitMQ', 'Vue.js', 'TypeScript'],
        'it-consulting' => ['Miro', 'Notion', 'Jira', 'Confluence', 'Google Cloud', 'AWS', 'Power BI', 'Looker Studio'],
        'devops-cloud' => ['Docker', 'Kubernetes', 'Terraform', 'AWS', 'GitHub Actions', 'Prometheus', 'Grafana', 'Nginx'],
    ];

    $toolIcons = [
        'React.js' => 'view_in_ar',
        'Node.js' => 'data_object',
        'PostgreSQL' => 'database',
        'AWS' => 'cloud',
        'Tailwind' => 'brush',
        'TypeScript' => 'code_blocks',
        'Next.js' => 'web',
        'GraphQL' => 'api',
        'Flutter' => 'smartphone',
        'Kotlin' => 'integration_instructions',
        'Swift' => 'rocket',
        'Firebase' => 'local_fire_department',
        'Supabase' => 'storage',
        'Figma' => 'design_services',
        'FigJam' => 'ink_pen',
        'Notion' => 'article',
        'Maze' => 'map',
        'Illustrator' => 'palette',
        'Photoshop' => 'photo_filter',
        'Lottie' => 'animation',
        'Storybook' => 'menu_book',
        'Laravel' => 'dns',
        'Redis' => 'memory',
        'Docker' => 'deployed_code',
        'RabbitMQ' => 'hub',
        'Vue.js' => 'code',
        'Miro' => 'dashboard',
        'Jira' => 'checklist',
        'Confluence' => 'lan',
        'Google Cloud' => 'cloud_circle',
        'Power BI' => 'query_stats',
        'Looker Studio' => 'monitoring',
        'Kubernetes' => 'widgets',
        'Terraform' => 'account_tree',
        'GitHub Actions' => 'bolt',
        'Prometheus' => 'sensors',
        'Grafana' => 'stacked_line_chart',
        'Nginx' => 'public',
    ];

    $tools = $toolsBySlug[$service->slug] ?? ['Laravel', 'Tailwind', 'TypeScript', 'PostgreSQL', 'Docker', 'AWS', 'Redis', 'GraphQL'];
@endphp

<main class="bg-background-light pb-20 pt-32 dark:bg-background-dark lg:pt-36">
    <div class="mx-auto max-w-7xl px-4 sm:px-6">
        <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm dark:border-slate-800 dark:bg-slate-900">
            <div class="relative min-h-[420px] w-full">
                <div class="absolute inset-0 bg-cover bg-center" style="background-image: linear-gradient(0deg, rgba(11, 61, 147, 0.92) 0%, rgba(11, 61, 147, 0.25) 60%), url('{{ $heroImage }}');"></div>
                <div class="relative z-10 flex min-h-[420px] items-end p-8 sm:p-10 lg:p-12">
                    <div class="max-w-3xl">
                        <nav class="mb-4 flex flex-wrap items-center gap-2 text-xs font-semibold uppercase tracking-wider text-slate-100">
                            <a href="{{ route('layanan.index') }}" class="transition-opacity hover:opacity-85">{{ __('messages.services.breadcrumb_services') }}</a>
                            <span>/</span>
                            <span class="opacity-100">{{ $service->title }}</span>
                        </nav>
                        <div class="mb-4 inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-3 py-1 text-xs font-bold uppercase tracking-wide text-white/90">
                            <span class="material-symbols-outlined !text-base">{{ $serviceIcon }}</span>
                            {{ __('messages.services.show_service_badge', ['name' => \App\Domain\Setting\Models\Setting::getValue('company_name', config('bandungcoding.company.name', 'BandungCoding'))]) }}
                        </div>
                        <h1 class="mb-4 text-3xl font-extrabold leading-tight text-white md:text-5xl">
                            {{ $service->title }}
                        </h1>
                        <p class="max-w-2xl text-base leading-relaxed text-slate-100 md:text-lg">
                            {{ $service->excerpt }}
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-16">
            <div class="mb-12 text-center">
                <h2 class="text-3xl font-bold text-slate-900 dark:text-white">{{ __('messages.services.show_process_title') }}</h2>
                <p class="mt-2 text-slate-600 dark:text-slate-400">{{ __('messages.services.show_process_desc') }}</p>
            </div>

            <div class="relative grid grid-cols-1 gap-6 md:grid-cols-3 lg:grid-cols-5">
                <div class="absolute left-10 right-10 top-7 -z-10 hidden h-[2px] bg-slate-200 dark:bg-slate-700 lg:block"></div>
                @foreach ($steps as $step)
                    <article class="flex flex-col items-center text-center">
                        <div class="mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-primary text-white ring-8 ring-background-light dark:ring-background-dark">
                            <span class="material-symbols-outlined">{{ $step['icon'] }}</span>
                        </div>
                        <h3 class="mb-1 font-bold text-slate-900 dark:text-white">{{ $step['title'] }}</h3>
                        <p class="text-xs font-bold uppercase tracking-tight text-slate-500">{{ $step['label'] }}</p>
                        <p class="mt-2 px-2 text-sm text-slate-600 dark:text-slate-400">{{ $step['desc'] }}</p>
                    </article>
                @endforeach
            </div>
        </section>
    </div>

    <section class="border-y border-slate-200 bg-white py-16 dark:border-slate-800 dark:bg-slate-900/50" data-animate="fade-up">
        <div class="mx-auto flex max-w-7xl flex-col items-center gap-12 px-6 md:flex-row">
            <div class="md:w-1/3">
                <h2 class="mb-4 text-3xl font-bold text-slate-900 dark:text-white">{{ __('messages.services.show_tools_title') }}</h2>
                <p class="text-slate-600 dark:text-slate-400">
                    {{ __('messages.services.show_tools_desc') }}
                </p>
            </div>
            <div class="grid w-full grid-cols-3 gap-4 sm:grid-cols-4 md:w-2/3 md:gap-6">
                @foreach ($tools as $tool)
                    <div class="flex flex-col items-center rounded-xl bg-background-light p-4 transition-all hover:shadow-lg dark:bg-slate-800">
                        <div class="mb-3 flex h-12 w-12 items-center justify-center rounded-lg bg-slate-100 dark:bg-slate-700">
                            <span class="material-symbols-outlined text-primary">{{ $toolIcons[$tool] ?? 'extension' }}</span>
                        </div>
                        <span class="text-center text-xs font-bold uppercase">{{ $tool }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @php
        $pk = match($service->slug) {
            'mobile-app-development' => 'mob',
            'ui-ux-design'           => 'uiux',
            'custom-software'        => 'csw',
            'it-consulting'          => 'itc',
            'devops-cloud'           => 'dvc',
            default                  => 'show',
        };
    @endphp
    <section class="mx-auto max-w-7xl px-4 py-20 sm:px-6" data-animate="fade-up">
        <div class="mb-16 text-center">
            <h2 class="text-3xl font-bold text-slate-900 dark:text-white">{{ __('messages.services.show_pricing_title') }}</h2>
            <p class="mt-2 text-slate-600 dark:text-slate-400">{{ __('messages.services.show_pricing_desc') }}</p>
        </div>

        <div class="grid grid-cols-1 items-end gap-8 md:grid-cols-3">
            <article class="flex h-full flex-col rounded-2xl border border-slate-200 bg-white p-8 shadow-sm dark:border-slate-800 dark:bg-slate-900">
                <h3 class="mb-2 text-xl font-bold text-slate-900 dark:text-white">{{ __("messages.services.{$pk}_starter_title") }}</h3>
                <p class="mb-6 text-sm text-slate-500">{{ __("messages.services.{$pk}_starter_desc") }}</p>
                <div class="mb-8 flex flex-col gap-1">
                    <span class="text-xs font-medium text-slate-500">{{ __("messages.services.{$pk}_starter_prefix") }}</span>
                    <div>
                        <span class="text-4xl font-extrabold text-slate-900 dark:text-white">{{ __("messages.services.{$pk}_starter_price") }}</span>
                        <span class="text-slate-500">{{ __('messages.services.show_per_project') }}</span>
                    </div>
                </div>
                <ul class="mb-8 flex-1 space-y-4">
                    <li class="flex items-center gap-3 text-sm text-slate-600 dark:text-slate-400"><span class="material-symbols-outlined text-lg text-green-500">check_circle</span>{{ __("messages.services.{$pk}_starter_f1") }}</li>
                    <li class="flex items-center gap-3 text-sm text-slate-600 dark:text-slate-400"><span class="material-symbols-outlined text-lg text-green-500">check_circle</span>{{ __("messages.services.{$pk}_starter_f2") }}</li>
                    <li class="flex items-center gap-3 text-sm text-slate-600 dark:text-slate-400"><span class="material-symbols-outlined text-lg text-green-500">check_circle</span>{{ __("messages.services.{$pk}_starter_f3") }}</li>
                    <li class="flex items-center gap-3 text-sm text-slate-600 dark:text-slate-400"><span class="material-symbols-outlined text-lg text-green-500">check_circle</span>{{ __("messages.services.{$pk}_starter_f4") }}</li>
                </ul>
                <a href="{{ $whatsappLink }}" target="_blank" rel="noopener noreferrer" class="inline-flex w-full items-center justify-center rounded-lg border-2 border-primary px-4 py-3 text-center font-bold text-primary transition-all hover:bg-primary hover:text-white">
                    {{ __('messages.services.show_select_plan') }}
                </a>
            </article>

            <article class="relative z-10 flex h-full flex-col rounded-2xl border-2 border-primary bg-white p-8 shadow-xl dark:bg-slate-900 md:scale-105">
                <div class="absolute -top-4 left-1/2 -translate-x-1/2 rounded-full bg-primary px-4 py-1 text-[10px] font-bold uppercase tracking-widest text-white">
                    {{ __("messages.services.{$pk}_business_badge") }}
                </div>
                <h3 class="mb-2 text-xl font-bold text-slate-900 dark:text-white">{{ __("messages.services.{$pk}_business_title") }}</h3>
                <p class="mb-6 text-sm text-slate-500">{{ __("messages.services.{$pk}_business_desc") }}</p>
                <div class="mb-8 flex flex-col gap-1">
                    <span class="text-xs font-medium text-slate-500">{{ __("messages.services.{$pk}_business_prefix") }}</span>
                    <div>
                        <span class="text-4xl font-extrabold text-slate-900 dark:text-white">{{ __("messages.services.{$pk}_business_price") }}</span>
                        <span class="text-slate-500">{{ __('messages.services.show_per_project') }}</span>
                    </div>
                </div>
                <ul class="mb-8 flex-1 space-y-4">
                    <li class="flex items-center gap-3 text-sm text-slate-600 dark:text-slate-400"><span class="material-symbols-outlined text-lg text-green-500">check_circle</span>{{ __("messages.services.{$pk}_business_f1") }}</li>
                    <li class="flex items-center gap-3 text-sm text-slate-600 dark:text-slate-400"><span class="material-symbols-outlined text-lg text-green-500">check_circle</span>{{ __("messages.services.{$pk}_business_f2") }}</li>
                    <li class="flex items-center gap-3 text-sm text-slate-600 dark:text-slate-400"><span class="material-symbols-outlined text-lg text-green-500">check_circle</span>{{ __("messages.services.{$pk}_business_f3") }}</li>
                    <li class="flex items-center gap-3 text-sm text-slate-600 dark:text-slate-400"><span class="material-symbols-outlined text-lg text-green-500">check_circle</span>{{ __("messages.services.{$pk}_business_f4") }}</li>
                    <li class="flex items-center gap-3 text-sm text-slate-600 dark:text-slate-400"><span class="material-symbols-outlined text-lg text-green-500">check_circle</span>{{ __("messages.services.{$pk}_business_f5") }}</li>
                </ul>
                <a href="{{ $whatsappLink }}" target="_blank" rel="noopener noreferrer" class="inline-flex w-full items-center justify-center rounded-lg bg-primary px-4 py-3 text-center font-bold text-white shadow-lg shadow-primary/20 transition-all hover:opacity-90">
                    {{ __('messages.services.show_select_plan') }}
                </a>
            </article>

            <article class="flex h-full flex-col rounded-2xl border border-slate-200 bg-white p-8 shadow-sm dark:border-slate-800 dark:bg-slate-900">
                <h3 class="mb-2 text-xl font-bold text-slate-900 dark:text-white">{{ __("messages.services.{$pk}_enterprise_title") }}</h3>
                <p class="mb-6 text-sm text-slate-500">{{ __("messages.services.{$pk}_enterprise_desc") }}</p>
                <div class="mb-8">
                    <span class="text-4xl font-extrabold text-slate-900 dark:text-white">Custom</span>
                </div>
                <ul class="mb-8 flex-1 space-y-4">
                    <li class="flex items-center gap-3 text-sm text-slate-600 dark:text-slate-400"><span class="material-symbols-outlined text-lg text-green-500">check_circle</span>{{ __("messages.services.{$pk}_enterprise_f1") }}</li>
                    <li class="flex items-center gap-3 text-sm text-slate-600 dark:text-slate-400"><span class="material-symbols-outlined text-lg text-green-500">check_circle</span>{{ __("messages.services.{$pk}_enterprise_f2") }}</li>
                    <li class="flex items-center gap-3 text-sm text-slate-600 dark:text-slate-400"><span class="material-symbols-outlined text-lg text-green-500">check_circle</span>{{ __("messages.services.{$pk}_enterprise_f3") }}</li>
                    <li class="flex items-center gap-3 text-sm text-slate-600 dark:text-slate-400"><span class="material-symbols-outlined text-lg text-green-500">check_circle</span>{{ __("messages.services.{$pk}_enterprise_f4") }}</li>
                </ul>
                <a href="{{ route('contact') }}" class="inline-flex w-full items-center justify-center rounded-lg border-2 border-primary px-4 py-3 text-center font-bold text-primary transition-all hover:bg-primary hover:text-white">
                    {{ __('messages.services.show_contact_team') }}
                </a>
            </article>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 sm:px-6 py-20" data-animate="fade-up">
        <div class="rounded-3xl bg-slate-900 px-8 py-20 text-center text-white dark:bg-slate-950">
            <h2 class="mb-4 text-3xl font-extrabold tracking-tight md:text-4xl">{{ __('messages.services.show_cta_title') }}</h2>
            <p class="mx-auto mb-10 max-w-xl text-lg text-slate-400">
                {!! __('messages.services.show_cta_desc', ['name' => \App\Domain\Setting\Models\Setting::getValue('company_name', config('bandungcoding.company.name', 'BandungCoding'))]) !!}
            </p>
            <div class="flex flex-col justify-center gap-4 sm:flex-row">
                <a href="{{ route('contact') }}"
                   class="rounded-xl bg-primary px-8 py-4 font-bold text-white shadow-xl shadow-primary/20 transition-all hover:bg-primary/90">
                    {{ __('messages.services.show_cta_btn1') }}
                </a>
                <a href="{{ route('layanan.download-proposal', $service->slug) }}"
                   class="rounded-xl border border-white/20 bg-white/10 px-8 py-4 font-bold text-white transition-all hover:bg-white/20">
                    {{ __('messages.services.show_cta_btn2') }}
                </a>
            </div>
        </div>
    </section>
</main>
@endsection
