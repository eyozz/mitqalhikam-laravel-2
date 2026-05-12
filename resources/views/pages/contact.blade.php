<!DOCTYPE html>

<html lang="id">

<head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    @include('partials.favicon')
        <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;family=Newsreader:ital,opsz,wght@0,6..72,400;0,6..72,500;0,6..72,600;1,6..72,400&amp;display=swap"
                rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
                rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
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
                .islamic-pattern {
                        background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M30 0l15 30-15 30-15-30z' fill='%23004d34' fill-opacity='0.03'/%3E%3C/svg%3E");
                }

                .hero-gradient {
                        background: linear-gradient(135deg, #f9f9ff 0%, #e7eefe 100%);
                }
        </style>
    @include('partials.responsive-fixes')
</head>

<body class="bg-background text-on-surface font-body-md overflow-x-hidden">
        <!-- TopNavBar -->
        <nav
                class="fixed top-0 w-full flex justify-between items-center px-gutter py-4  bg-surface/95 backdrop-blur-sm z-50 border-b border-outline-variant/30 shadow-sm shadow-primary/5">
                <a href="{{ route('home') }}" class="flex items-center gap-sm">
                        <x-responsive-image src="{{ $cmsSettings['site_logo'] ?? asset('images/logo.jpg') }}" alt="Logo MITQ Al-Hikam" class="w-12 h-12 object-cover rounded-full" width="48" height="48" sizes="48px" loading="eager" />
                        <div class="font-h4 text-h font-semibold text-primary dark:text-primary-fixed">
                                {{ $cmsSettings['site_name'] ?? 'MITQ Al-Hikam' }}
                        </div>
                </a>
                <div class="hidden md:flex items-center gap-md">
                        <a class="font-label-caps text-label-caps text-on-surface-variant dark:text-on-surface hover:text-primary transition-colors"
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
                        <a class="font-label-caps text-label-caps text-primary dark:text-primary-fixed border-b-2 border-secondary dark:border-secondary-fixed pb-1"
                                href="{{ route('contact') }}">
                                Hubungi Kami
                        </a>
                </div>
                <a href="{{ $cmsSettings['registration_url'] ?? config('services.ppdb_url', '#') }}" target="_blank" rel="noopener" class="hidden md:inline-flex bg-primary text-on-primary px-md py-sm rounded-lg font-label-caps text-label-caps hover:bg-primary-container transition-all shadow-sm">Daftar Sekarang (PPDB)</a>

        <button type="button" data-mobile-menu-button aria-expanded="false" aria-label="Buka menu navigasi" class="md:hidden inline-flex h-11 w-11 items-center justify-center rounded-xl border border-outline-variant/50 bg-white/80 text-primary shadow-sm transition hover:bg-primary hover:text-white">
            <span class="material-symbols-outlined">menu</span>
        </button>
        @include('partials.mobile-menu')
        </nav>
        <main class="pt-[100px] islamic-pattern">
                <!-- Hero Section -->
                <section class="max-w-container-max mx-auto px-gutter py-xl">
                        <div class="text-center mb-xl">
                                <span
                                        class="font-label-caps text-label-caps text-secondary tracking-widest mb-base block">HUBUNGI
                                        KAMI</span>
                                <h1 class="font-h1 text-h1 text-primary mb-md">{{ $cmsContent->get('contact.hero.title', 'Mari Jalin Silaturahmi') }}</h1>
                                <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl mx-auto">
                                        {{ $cmsContent->get('contact.hero.subtitle', 'Kami siap membantu wali murid dan calon pendaftar mendapatkan informasi terbaik tentang program pendidikan MITQ Al-Hikam.') }}
                                </p>
                        </div>
                        <div class="grid grid-cols-1 lg:grid-cols-12 gap-xl items-start">
                                <!-- Contact Information & Map -->
                                <div class="lg:col-span-5 space-y-md">
                                        <div
                                                class="bg-surface-container-lowest p-md rounded-xl border border-outline-variant/50 shadow-sm">
                                                <div class="flex items-start gap-md mb-md">
                                                        <div class="bg-primary-fixed p-sm rounded-lg text-primary">
                                                                <span class="material-symbols-outlined"
                                                                        style="font-variation-settings: 'FILL' 1;">location_on</span>
                                                        </div>
                                                        <div>
                                                                <h3 class="font-h3 text-h3 text-primary mb-xs">Alamat
                                                                        Kampus</h3>
                                                                <p class="text-on-surface-variant">Begalon, RT 01 / RW
                                                                        03, Kel. Panularan, Kec. Laweyan, Kota
                                                                        Surakarta, Jawa Tengah 57149</p>
                                                        </div>
                                                </div>
                                                <div class="flex items-start gap-md mb-md">
                                                        <div class="bg-primary-fixed p-sm rounded-lg text-primary">
                                                                <span class="material-symbols-outlined"
                                                                        style="font-variation-settings: 'FILL' 1;">call</span>
                                                        </div>
                                                        <div>
                                                                <h3 class="font-h3 text-h3 text-primary mb-xs">Telepon
                                                                        &amp; WhatsApp</h3>
                                                                <p class="text-on-surface-variant">+62 271 123
                                                                        4567<br />+62 812 3456 7890 (Admisi)</p>
                                                        </div>
                                                </div>
                                                <div class="flex items-start gap-md">
                                                        <div class="bg-primary-fixed p-sm rounded-lg text-primary">
                                                                <span class="material-symbols-outlined"
                                                                        style="font-variation-settings: 'FILL' 1;">mail</span>
                                                        </div>
                                                        <div>
                                                                <h3 class="font-h3 text-h3 text-primary mb-xs">Email
                                                                        Resmi</h3>
                                                                <p class="text-on-surface-variant">
                                                                        {{ $cmsSettings['footer_email'] ?? 'info@mitqalhikam.sch.id' }}<br />ppdb@sttdalhikam.sch.id
                                                                </p>
                                                        </div>
                                                </div>
                                        </div>
                                        <!-- Google Maps Embed -->
                                        <div class="relative h-[300px] overflow-hidden rounded-xl border border-outline-variant/50 shadow-sm">
                                                <iframe class="absolute inset-0 h-full w-full" loading="lazy" allowfullscreen referrerpolicy="no-referrer-when-downgrade" title="Lokasi MITQ Al-Hikam Surakarta" src="https://www.google.com/maps?q=Begalon%20Panularan%20Laweyan%20Surakarta&output=embed"></iframe>
                                        </div>
                                </div>
                                <!-- Contact Form -->
                                <div class="lg:col-span-7">
                                        <div
                                                class="bg-surface-container-lowest p-lg rounded-xl border border-outline-variant/50 shadow-sm relative overflow-hidden">
                                                <div class="absolute top-0 left-0 w-full h-1 bg-secondary"></div>
                                                <h2 class="font-h2 text-h2 text-primary mb-lg">Kirim Pesan</h2>
                                                <form method="POST" action="{{ route('contact.store') }}" class="space-y-md">
                                                        @csrf
                                                        @if (session('status'))
                                                                <div class="rounded-lg border border-primary/20 bg-primary/10 p-sm text-primary">{{ session('status') }}</div>
                                                        @endif
                                                        @if ($errors->any())
                                                                <div class="rounded-lg border border-error/20 bg-error-container p-sm text-on-error-container">Mohon lengkapi form kontak dengan benar.</div>
                                                        @endif
                                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-md">
                                                                <div class="space-y-xs">
                                                                        <label
                                                                                class="font-label-caps text-label-caps text-on-surface-variant">Nama
                                                                                Lengkap</label>
                                                                        <input class="w-full bg-surface-bright border border-outline-variant rounded-lg p-sm focus:ring-2 focus:ring-primary-container focus:border-primary transition-all outline-none"
                                                                                placeholder="Masukkan nama Anda"
                                                                                name="name" value="{{ old('name') }}" required type="text" />
                                                                </div>
                                                                <div class="space-y-xs">
                                                                        <label
                                                                                class="font-label-caps text-label-caps text-on-surface-variant">Alamat
                                                                                Email</label>
                                                                        <input class="w-full bg-surface-bright border border-outline-variant rounded-lg p-sm focus:ring-2 focus:ring-primary-container focus:border-primary transition-all outline-none"
                                                                                placeholder="contoh@email.com"
                                                                                name="email" value="{{ old('email') }}" required type="email" />
                                                                </div>
                                                        </div>
                                                        <div class="space-y-xs">
                                                                <label
                                                                        class="font-label-caps text-label-caps text-on-surface-variant">Subjek</label>
                                                                <select
                                                                        name="subject" required class="w-full bg-surface-bright border border-outline-variant rounded-lg p-sm focus:ring-2 focus:ring-primary-container focus:border-primary transition-all outline-none appearance-none">
                                                                        <option>Informasi Pendaftaran (PPDB)</option>
                                                                        <option>Kurikulum &amp; Program Tahfizh</option>
                                                                        <option>Kemitraan &amp; Kerjasama</option>
                                                                        <option>Lainnya</option>
                                                                </select>
                                                        </div>
                                                        <div class="space-y-xs">
                                                                <label
                                                                        class="font-label-caps text-label-caps text-on-surface-variant">Pesan</label>
                                                                <textarea
                                                                        name="message" required class="w-full bg-surface-bright border border-outline-variant rounded-lg p-sm focus:ring-2 focus:ring-primary-container focus:border-primary transition-all outline-none resize-none"
                                                                        placeholder="Tuliskan pesan atau pertanyaan Anda di sini..."
                                                                        rows="5">{{ old('message') }}</textarea>
                                                        </div>
                                                        <button class="w-full bg-primary text-on-primary py-md rounded-lg font-label-caps text-label-caps hover:bg-primary-container transition-all flex items-center justify-center gap-sm shadow-md"
                                                                type="submit">
                                                                <span class="material-symbols-outlined">send</span>
                                                                KIRIM PESAN SEKARANG
                                                        </button>
                                                </form>
                                        </div>
                                </div>
                        </div>
                </section>
        </main>
    @include('partials.site-footer')
<a href="{{ $cmsSettings['registration_url'] ?? config('services.ppdb_url', '#') }}" target="_blank" rel="noopener" class="floating-ppdb fixed z-50 rounded-full bg-gradient-to-r from-primary to-primary-container px-md py-sm text-sm font-bold uppercase tracking-[0.08em] text-on-primary shadow-2xl hover:scale-105 transition-transform">Daftar PPDB</a>
</body>

</html>
