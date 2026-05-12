<!DOCTYPE html>

<html class="light" lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    @include('partials.favicon')
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;family=Newsreader:ital,wght@0,400;0,500;0,600;0,700;1,400&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-tertiary-container": "#d4d1ca",
                        "on-primary-fixed": "#002114",
                        "on-primary-fixed-variant": "#005137",
                        "on-error-container": "#93000a",
                        "on-tertiary": "#ffffff",
                        "surface-container": "#e7eefe",
                        "on-primary": "#ffffff",
                        "on-surface-variant": "#3f4943",
                        "on-secondary": "#ffffff",
                        "inverse-on-surface": "#ebf1ff",
                        "secondary-container": "#fed65b",
                        "primary": "#004d34",
                        "on-secondary-container": "#745c00",
                        "on-tertiary-fixed-variant": "#474741",
                        "outline-variant": "#bec9c1",
                        "on-secondary-fixed": "#241a00",
                        "tertiary-fixed-dim": "#c9c6bf",
                        "tertiary-fixed": "#e5e2db",
                        "on-secondary-fixed-variant": "#574500",
                        "tertiary-container": "#5b5a54",
                        "error-container": "#ffdad6",
                        "on-tertiary-fixed": "#1c1c17",
                        "inverse-surface": "#2a313d",
                        "primary-fixed-dim": "#84d7af",
                        "secondary": "#735c00",
                        "primary-fixed": "#a0f4ca",
                        "surface-tint": "#0b6c4b",
                        "surface-container-highest": "#dce2f3",
                        "surface-container-high": "#e2e8f8",
                        "surface": "#f9f9ff",
                        "primary-container": "#006747",
                        "error": "#ba1a1a",
                        "surface-variant": "#dce2f3",
                        "on-surface": "#151c27",
                        "outline": "#6f7a72",
                        "secondary-fixed": "#ffe088",
                        "background": "#f9f9ff",
                        "surface-container-low": "#f0f3ff",
                        "surface-dim": "#d3daea",
                        "secondary-fixed-dim": "#e9c349",
                        "surface-container-lowest": "#ffffff",
                        "surface-bright": "#f9f9ff",
                        "inverse-primary": "#84d7af",
                        "on-primary-container": "#8fe2ba",
                        "on-background": "#151c27",
                        "tertiary": "#43433d",
                        "on-error": "#ffffff"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "gutter": "24px",
                        "lg": "48px",
                        "base": "8px",
                        "sm": "12px",
                        "xl": "80px",
                        "md": "24px",
                        "xs": "4px",
                        "container-max": "1200px"
                    },
                    "fontFamily": {
                        "body-md": ["Inter"],
                        "label-caps": ["Inter"],
                        "h3": ["Newsreader"],
                        "body-lg": ["Inter"],
                        "h1": ["Newsreader"],
                        "h2": ["Newsreader"]
                    },
                    "fontSize": {
                        "body-md": ["16px", { "lineHeight": "1.6", "fontWeight": "400" }],
                        "label-caps": ["12px", { "lineHeight": "1.0", "letterSpacing": "0.1em", "fontWeight": "600" }],
                        "h3": ["28px", { "lineHeight": "1.4", "fontWeight": "500" }],
                        "body-lg": ["18px", { "lineHeight": "1.6", "fontWeight": "400" }],
                        "h1": ["48px", { "lineHeight": "1.2", "letterSpacing": "-0.02em", "fontWeight": "600" }],
                        "h2": ["36px", { "lineHeight": "1.3", "fontWeight": "600" }]
                    }
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .islamic-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M30 0l5 20h20l-15 12 5 23-15-15-15 15 5-23-15-12h20z' fill='%23004d34' fill-opacity='0.03' fill-rule='evenodd'/%3E%3C/svg%3E");
        }
    </style>
    @include('partials.responsive-fixes')
</head>

<body class="bg-background text-on-surface font-body-md overflow-x-hidden">
    <!-- Top Navigation -->
    <header
        class="fixed top-0 w-full flex justify-between items-center px-gutter py-4 bg-surface/95 dark:bg-surface-dim/95 backdrop-blur-sm z-50 border-b border-outline-variant/30 dark:border-outline/20 shadow-sm shadow-primary/5">
        <a href="{{ route('home') }}" class="flex items-center gap-sm">
            <x-responsive-image src="{{ $cmsSettings['site_logo'] ?? asset('images/logo.jpg') }}" alt="Logo MITQ Al-Hikam" class="w-12 h-12 object-cover rounded-full" width="48" height="48" sizes="48px" loading="eager" />
            <div class="font-h4 text-h font-semibold text-primary dark:text-primary-fixed">
                {{ $cmsSettings['site_name'] ?? 'MITQ Al-Hikam' }}
            </div>
        </a>
        <nav class="hidden md:flex items-center space-x-md">
            <a class="font-label-caps text-label-caps text-primary dark:text-primary-fixed border-b-2 border-secondary dark:border-secondary-fixed pb-1"
                href="{{ route('home') }}">
                Beranda
            </a>
            <a class="font-label-caps text-label-caps text-on-surface-variant dark:text-on-surface hover:text-primary transition-colors"
                href="{{ route('about') }}">
                Tentang Kami
            </a>
            <a class="font-label-caps text-label-caps text-on-surface-variant dark:text-on-surface hover:text-primary transition-colors"
                href="{{ route('program') }}">
                Program
            </a>
            <a class="font-label-caps text-label-caps text-on-surface-variant dark:text-on-surface hover:text-primary transition-colors"
                href="{{ route('news.index') }}">
                Berita
            </a>
            <a class="font-label-caps text-label-caps text-on-surface-variant dark:text-on-surface hover:text-primary transition-colors"
                href="{{ route('contact') }}">
                Hubungi Kami
            </a>
        </nav>
        <a href="{{ $cmsSettings['registration_url'] ?? config('services.ppdb_url', '#') }}" target="_blank" rel="noopener" class="hidden md:inline-flex bg-primary text-on-primary px-md py-sm rounded-lg font-label-caps text-label-caps hover:bg-primary-container transition-all shadow-md active:opacity-80 duration-200">Daftar Sekarang (PPDB)</a>

        <button type="button" data-mobile-menu-button aria-expanded="false" aria-label="Buka menu navigasi" class="md:hidden inline-flex h-11 w-11 items-center justify-center rounded-xl border border-outline-variant/50 bg-white/80 text-primary shadow-sm transition hover:bg-primary hover:text-white">
            <span class="material-symbols-outlined">menu</span>
        </button>
        @include('partials.mobile-menu')
    </header>
    <main class="mt-20">
        <!-- Hero Section -->
        <section class="home-hero-section relative min-h-[870px] flex items-center islamic-pattern overflow-hidden">
            <div class="max-w-container-max mx-auto px-gutter grid grid-cols-1 lg:grid-cols-2 gap-xl items-center">
                <div class="z-10 order-2 lg:order-1">
                    <span
                        class="inline-block bg-secondary-container text-on-secondary-container px-sm py-xs rounded-full font-label-caps text-label-caps mb-md">{{ $cmsContent->get('home.hero.badge', 'PENDAFTARAN TAHUN AJARAN 2025/2026 DIBUKA') }}</span>
                    <h1 class="font-h1 text-h1 text-primary mb-md leading-tight">
                        {{ $cmsContent->get('home.hero.title', 'Mencetak Generasi Ulama yang Berpegang Teguh dengan Al-Quran dan As-Sunnah') }}
                    </h1>
                    <p class="font-body-lg text-body-lg text-on-surface-variant mb-lg max-w-xl">
                        {{ $cmsContent->get('home.hero.subtitle', 'MITQ Al-Hikam menghadirkan pembelajaran tahfizh, adab, dan ilmu dasar dalam suasana halaqah yang hangat dan terarah.') }}
                    </p>
                    <div class="flex flex-wrap gap-md">
                        <a href="{{ route('program') }}" class="bg-primary text-on-primary px-lg py-sm rounded-lg font-label-caps text-label-caps shadow-lg hover:shadow-primary/20 transition-all">Pelajari Program Kami</a>
                        <a href="{{ $cmsSettings['registration_url'] ?? config('services.ppdb_url', '#') }}" target="_blank" rel="noopener" class="border-2 border-secondary text-secondary px-lg py-sm rounded-lg font-label-caps text-label-caps hover:bg-secondary/5 transition-all">Daftar Sekarang</a>
                    </div>
                </div>
                <div class="relative order-1 lg:order-2">
                    <div class="absolute -top-10 -right-10 w-64 h-64 bg-primary/5 rounded-full blur-3xl"></div>
                    <div class="relative z-10 rounded-xl overflow-hidden shadow-2xl border border-outline-variant/30">
                        <x-responsive-image src="/images/source/home-hero.jpg" alt="Islamic Education" class="w-full h-[500px] object-cover" width="640" height="500" sizes="(min-width: 1024px) 50vw, 100vw" loading="eager" fetchpriority="high" />
                    </div>
                    <div
                        class="absolute -bottom-6 -left-6 bg-surface-container-lowest p-md rounded-lg shadow-xl border-l-4 border-secondary max-w-[200px]">
                        <p class="font-h3 text-h3 text-primary">1 : 7</p>
                        <p class="font-label-caps text-label-caps text-on-surface-variant">Rasio Guru &amp; Santri</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Sekilas Al Hikam -->
        <section class="py-xl bg-surface-container-lowest">
            <div class="max-w-container-max mx-auto px-gutter text-center">
                <div class="max-w-3xl mx-auto">
                    <h2 class="font-h2 text-h2 text-primary mb-md">{{ $cmsContent->get('home.about.title', 'Tahun ke-7 Melayani Masyarakat') }}</h2>
                    <div class="w-20 h-1 bg-secondary mx-auto mb-lg"></div>
                    <p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed">
                        {{ $cmsContent->get('home.about.body', 'MITQ Al-Hikam Surakarta berkomitmen memberikan pendidikan terbaik berbasis Al-Quran dengan lingkungan belajar yang kondusif bagi pertumbuhan spiritual dan intelektual santri.') }}
                    </p>
                </div>
            </div>
        </section>
        <!-- Visi & Misi (Bento Grid) -->
        <section class="py-xl">
            <div class="max-w-container-max mx-auto px-gutter">
                <div class="mb-lg text-center">
                    <p class="font-label-caps text-label-caps text-secondary mb-xs">KOMITMEN KAMI</p>
                    <h2 class="font-h2 text-h2 text-primary">Misi Pendidikan Al Hikam</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-6 lg:grid-cols-12 gap-md">
                    <!-- Misi 1 -->
                    <div
                        class="md:col-span-3 lg:col-span-4 bg-surface p-md rounded-xl border border-outline-variant/30 hover:border-primary transition-all shadow-sm group">
                        <div
                            class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mb-md group-hover:bg-primary transition-colors">
                            <span class="material-symbols-outlined text-primary group-hover:text-on-primary"
                                data-icon="menu_book">menu_book</span>
                        </div>
                        <h3 class="font-h3 text-h3 text-primary mb-sm">Pendidikan Al Qur'an</h3>
                        <p class="font-body-md text-body-md text-on-surface-variant">Menyelenggarakan pendidikan Al
                            Qur'an yang sesuai dengan manhaj Ahlussunnah wal Jama'ah.</p>
                    </div>
                    <!-- Misi 2 -->
                    <div
                        class="md:col-span-3 lg:col-span-4 bg-surface p-md rounded-xl border border-outline-variant/30 hover:border-primary transition-all shadow-sm group">
                        <div
                            class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mb-md group-hover:bg-primary transition-colors">
                            <span class="material-symbols-outlined text-primary group-hover:text-on-primary"
                                data-icon="auto_stories">auto_stories</span>
                        </div>
                        <h3 class="font-h3 text-h3 text-primary mb-sm">Hafalan 30 Juz &amp; Hadits</h3>
                        <p class="font-body-md text-body-md text-on-surface-variant">Membimbing santri menuntaskan
                            hafalan Al Qur'an 30 Juz beserta dasar-dasar Al Hadits.</p>
                    </div>
                    <!-- Misi 3 -->
                    <div
                        class="md:col-span-6 lg:col-span-4 bg-primary text-on-primary p-md rounded-xl shadow-xl flex flex-col justify-between">
                        <div>
                            <span class="material-symbols-outlined text-secondary text-4xl mb-md"
                                data-icon="school">school</span>
                            <h3 class="font-h3 text-h3 mb-sm">Ilmu Syar'i Terpadu</h3>
                            <p class="font-body-md text-body-md opacity-90">Kurikulum yang memadukan ilmu agama dengan
                                adab-adab Islami dalam setiap proses belajar.</p>
                        </div>
                    </div>
                    <!-- Misi 4 -->
                    <div
                        class="md:col-span-3 lg:col-span-6 bg-surface p-md rounded-xl border border-outline-variant/30 hover:border-primary transition-all shadow-sm group">
                        <div class="flex gap-md items-start">
                            <div
                                class="shrink-0 w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center group-hover:bg-primary transition-colors">
                                <span class="material-symbols-outlined text-primary group-hover:text-on-primary"
                                    data-icon="diversity_3">diversity_3</span>
                            </div>
                            <div>
                                <h3 class="font-h3 text-h3 text-primary mb-sm">Keteladanan (Uswah)</h3>
                                <p class="font-body-md text-body-md text-on-surface-variant">Menghadirkan pendidik yang
                                    menjadi role model dalam ibadah dan akhlakul karimah.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Misi 5 -->
                    <div
                        class="md:col-span-3 lg:col-span-6 bg-surface p-md rounded-xl border border-outline-variant/30 hover:border-primary transition-all shadow-sm group">
                        <div class="flex gap-md items-start">
                            <div
                                class="shrink-0 w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center group-hover:bg-primary transition-colors">
                                <span class="material-symbols-outlined text-primary group-hover:text-on-primary"
                                    data-icon="handshake">handshake</span>
                            </div>
                            <div>
                                <h3 class="font-h3 text-h3 text-primary mb-sm">Sinergi Wali Murid</h3>
                                <p class="font-body-md text-body-md text-on-surface-variant">Membangun peran aktif orang
                                    tua dalam pengawasan hafalan dan adab santri di rumah.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Pondasi Nilai -->
        <section class="py-xl bg-surface-container-low relative">
            <div class="max-w-container-max mx-auto px-gutter">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-xl items-center">
                    <div class="rounded-xl overflow-hidden shadow-xl border-t-4 border-secondary">
                        <x-responsive-image src="/images/source/home-quran.jpg" alt="Student reading Quran" class="w-full h-[400px] object-cover" width="600" height="400" sizes="(min-width: 1024px) 50vw, 100vw" />
                    </div>
                    <div>
                        <h2 class="font-h2 text-h2 text-primary mb-lg">Pondasi Nilai &amp; Karakter</h2>
                        <div class="space-y-md">
                            <div class="flex gap-sm">
                                <span class="material-symbols-outlined text-secondary"
                                    data-icon="check_circle">check_circle</span>
                                <div>
                                    <h4 class="font-body-lg font-semibold text-primary">Membaca Sesuai Contoh Rasulullah
                                    </h4>
                                    <p class="font-body-md text-on-surface-variant">Bimbingan intensif tahsin dan tajwid
                                        untuk memastikan bacaan yang tartil dan mutqin sejak dini.</p>
                                </div>
                            </div>
                            <div class="flex gap-sm">
                                <span class="material-symbols-outlined text-secondary"
                                    data-icon="check_circle">check_circle</span>
                                <div>
                                    <h4 class="font-body-lg font-semibold text-primary">Penanaman Akhlak Mulia</h4>
                                    <p class="font-body-md text-on-surface-variant">Kurikulum adab yang terintegrasi,
                                        membentuk karakter santri yang santun, disiplin, dan rendah hati.</p>
                                </div>
                            </div>
                            <div class="flex gap-sm">
                                <span class="material-symbols-outlined text-secondary"
                                    data-icon="check_circle">check_circle</span>
                                <div>
                                    <h4 class="font-body-lg font-semibold text-primary">Lingkungan Bahasa Arab</h4>
                                    <p class="font-body-md text-on-surface-variant">Pengenalan kosakata dasar bahasa
                                        Arab untuk memudahkan pemahaman makna Al Qur'an.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- CTA Section -->
        <section class="py-xl islamic-pattern bg-primary">
            <div class="max-w-container-max mx-auto px-gutter text-center text-on-primary">
                <h2 class="font-h2 text-h2 mb-md">Siapkan Masa Depan Qur'ani Ananda</h2>
                <p class="font-body-lg text-body-lg mb-lg opacity-90 max-w-2xl mx-auto">
                    {{ $cmsContent->get('home.cta.body', 'Mari bergabung dalam keluarga besar MITQ Al-Hikam Surakarta. Pendaftaran santri baru sedang berlangsung.') }}
                </p>
                <div class="flex justify-center gap-md">
                    <a href="{{ $cmsSettings['registration_url'] ?? config('services.ppdb_url', '#') }}" target="_blank" rel="noopener" class="bg-secondary text-on-primary px-lg py-sm rounded-lg font-label-caps text-label-caps shadow-xl hover:scale-105 transition-all">
                        HUBUNGI ADMIN PPDB
                    </a>
                    <a href="{{ route('contact') }}" class="border border-on-primary/30 text-on-primary px-lg py-sm rounded-lg font-label-caps text-label-caps shadow-xl hover:bg-white/10 hover:scale-105 transition-all">
                        DOWNLOAD BROSUR
                    </a>
                </div>
            </div>
        </section>
    </main>
    @include('partials.site-footer')
    <!-- Floating Action Button -->
    <a class="floating-chat fixed z-50 bg-secondary text-on-secondary-fixed p-md rounded-full shadow-2xl flex items-center gap-sm group hover:pr-lg transition-all"
        href="{{ route('contact') }}">
        <span class="material-symbols-outlined" data-icon="chat_bubble" data-weight="fill">chat_bubble</span>
        <span class="font-label-caps text-label-caps hidden group-hover:inline">HUBUNGI PPDB</span>
    </a>
<a href="{{ $cmsSettings['registration_url'] ?? config('services.ppdb_url', '#') }}" target="_blank" rel="noopener" class="floating-ppdb fixed z-50 rounded-full bg-gradient-to-r from-primary to-primary-container px-md py-sm text-sm font-bold uppercase tracking-[0.08em] text-on-primary shadow-2xl hover:scale-105 transition-transform">Daftar PPDB</a>
</body>

</html>
