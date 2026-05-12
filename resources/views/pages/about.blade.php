<!DOCTYPE html>

<html class="light" lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    @include('partials.favicon')
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;family=Newsreader:ital,wght@0,500;0,600;1,500&amp;family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
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
                }
            }
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            vertical-align: middle;
        }

        .islamic-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M30 0l2.5 7.5L40 10l-7.5 2.5L30 20l-2.5-7.5L20 10l7.5-2.5L30 0zm0 40l2.5 7.5L40 50l-7.5 2.5L30 60l-2.5-7.5L20 50l7.5-2.5L30 40z' fill='%23004d34' fill-opacity='0.03' fill-rule='evenodd'/%3E%3C/svg%3E");
        }

        details>summary::-webkit-details-marker {
            display: none;
        }
    </style>
    @include('partials.responsive-fixes')
</head>

<body class="bg-background text-on-background font-body-md">
    <!-- TopNavBar -->
    <header
        class="fixed top-0 w-full flex justify-between items-center px-gutter py-4  bg-surface/95 backdrop-blur-sm z-50 border-b border-outline-variant/30 shadow-sm shadow-primary/5">
        <a href="{{ route('home') }}" class="flex items-center gap-sm">
            <x-responsive-image src="{{ $cmsSettings['site_logo'] ?? asset('images/logo.jpg') }}" alt="Logo MITQ Al-Hikam" class="w-12 h-12 object-cover rounded-full" width="48" height="48" sizes="48px" loading="eager" />
            <div class="font-h4 text-h font-semibold text-primary dark:text-primary-fixed">
                {{ $cmsSettings['site_name'] ?? 'MITQ Al-Hikam' }}
            </div>
        </a>
        <nav class="hidden md:flex gap-md">
            <a class="font-label-caps text-label-caps text-on-surface-variant dark:text-on-surface hover:text-primary transition-colors"
                href="{{ route('home') }}">
                Beranda
            </a>
            <a class="font-label-caps text-label-caps text-primary dark:text-primary-fixed border-b-2 border-secondary dark:border-secondary-fixed pb-1"
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
        <a href="{{ $cmsSettings['registration_url'] ?? config('services.ppdb_url', '#') }}" target="_blank" rel="noopener" class="hidden md:inline-flex bg-primary text-on-primary px-md py-sm rounded-lg font-label-caps text-label-caps hover:bg-primary-container transition-all active:opacity-80">Daftar Sekarang (PPDB)</a>

        <button type="button" data-mobile-menu-button aria-expanded="false" aria-label="Buka menu navigasi" class="md:hidden inline-flex h-11 w-11 items-center justify-center rounded-xl border border-outline-variant/50 bg-white/80 text-primary shadow-sm transition hover:bg-primary hover:text-white">
            <span class="material-symbols-outlined">menu</span>
        </button>
        @include('partials.mobile-menu')
    </header>
    <main class="pt-xl">
        <!-- Hero Section: Background & History -->
        <section class="relative overflow-hidden bg-surface-container-low py-xl px-gutter">
            <div class="absolute inset-0 islamic-pattern opacity-50"></div>
            <div class="max-w-container-max mx-auto relative z-10">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-xl items-center">
                    <div class="space-y-md">
                        <span class="font-label-caps text-label-caps text-secondary tracking-widest">SEJARAH &amp;
                            VISI</span>
                        <h1 class="font-h1 text-h1 text-primary">{{ $cmsContent->get('about.hero.title', 'Yayasan Salamah Surakarta') }}</h1>
                        <p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed">
                            {{ $cmsContent->get('about.hero.subtitle', 'Berawal dari cita-cita mencetak generasi Qurani yang berakhlak mulia dan unggul dalam akademik, MITQ Al-Hikam mendedikasikan diri pada kesucian ilmu dan ketekunan ibadah.') }}
                        </p>
                        <div
                            class="p-md bg-white border-l-4 border-secondary rounded-lg shadow-sm italic text-primary-container font-h3 text-h3 leading-normal">
                            "Sungguh, Al-Qur'an ini memberi petunjuk ke (jalan) yang paling lurus dan memberi kabar
                            gembira kepada orang mukmin yang mengerjakan kebajikan bahwa mereka akan mendapat pahala
                            yang besar."
                            <span
                                class="block mt-sm font-label-caps text-label-caps not-italic text-on-surface-variant">—
                                Q.S Al Isra’: 9</span>
                        </div>
                    </div>
                    <div class="relative group">
                        <div
                            class="absolute -inset-4 bg-primary/5 rounded-xl rotate-3 group-hover:rotate-0 transition-transform duration-500">
                        </div>
                        <x-responsive-image src="/images/source/about-story.jpg" alt="Lingkungan belajar MITQ Al-Hikam" class="rounded-xl shadow-lg relative z-10 w-full h-[450px] object-cover border border-outline-variant/30" width="600" height="450" sizes="(min-width: 1024px) 50vw, 100vw" />
                    </div>
                </div>
            </div>
        </section>
        <!-- Organizational Structure -->
        <section class="py-xl px-gutter max-w-container-max mx-auto">
            <div class="text-center mb-xl">
                <h2 class="font-h2 text-h2 text-primary mb-xs">Struktur Organisasi</h2>
                <div class="w-24 h-1 bg-secondary mx-auto rounded-full"></div>
                <p class="mt-md text-on-surface-variant">Dedikasi para pimpinan untuk visi pendidikan berkelanjutan.</p>
            </div>
            @php
                $leaderCards = [
                    [
                        'role' => 'PEMBINA',
                        'name' => $cmsContent->get('about.leadership.pembina_name', 'Sigit Basuki'),
                        'photo' => $cmsContent->get('about.leadership.pembina_photo', '/images/logo.jpg'),
                        'alt' => 'Foto Pembina MITQ Al-Hikam',
                    ],
                    [
                        'role' => 'PENGAWAS',
                        'name' => $cmsContent->get('about.leadership.pengawas_name', 'Muzayyin Marzuki'),
                        'photo' => $cmsContent->get('about.leadership.pengawas_photo', '/images/logo.jpg'),
                        'alt' => 'Foto Pengawas MITQ Al-Hikam',
                    ],
                    [
                        'role' => 'KETUA YAYASAN',
                        'name' => $cmsContent->get('about.leadership.ketua_yayasan_name', 'Anas Ma’ruf'),
                        'photo' => $cmsContent->get('about.leadership.ketua_yayasan_photo', '/images/logo.jpg'),
                        'alt' => 'Foto Ketua Yayasan MITQ Al-Hikam',
                    ],
                    [
                        'role' => 'KEPALA SEKOLAH',
                        'name' => $cmsContent->get('about.leadership.kepala_sekolah_name', 'Dudi Budi Astoko, S.Pd.I., M.Pd.'),
                        'photo' => $cmsContent->get('about.leadership.kepala_sekolah_photo', '/images/logo.jpg'),
                        'alt' => 'Foto Kepala Sekolah MITQ Al-Hikam',
                        'featured' => true,
                    ],
                ];
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-4 gap-md">
                @foreach ($leaderCards as $leader)
                    <div class="md:col-span-2 {{ $leader['featured'] ?? false ? 'bg-primary border-primary shadow-md' : 'bg-white border-outline-variant hover:border-primary shadow-sm' }} p-md rounded-xl border transition-all group">
                        <div class="flex items-center gap-md">
                            <div class="w-24 h-24 rounded-full {{ $leader['featured'] ?? false ? 'bg-white/20 border-white/50' : 'bg-surface-container-highest border-primary/20' }} overflow-hidden border-2">
                                <x-responsive-image src="{{ $leader['photo'] }}" alt="{{ $leader['alt'] }}" class="w-full h-full object-cover" width="96" height="96" sizes="96px" />
                            </div>
                            <div>
                                <span class="font-label-caps text-label-caps {{ $leader['featured'] ?? false ? 'text-secondary-fixed' : 'text-secondary' }}">{{ $leader['role'] }}</span>
                                <h3 class="font-h3 text-h3 {{ $leader['featured'] ?? false ? 'text-on-primary' : 'text-primary group-hover:text-primary-container transition-colors' }}">{{ $leader['name'] }}</h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        <!-- Rules & Regulations (Accordion) -->
        <section class="py-xl bg-surface-container-low px-gutter">
            <div class="max-w-3xl mx-auto">
                <div class="text-center mb-lg">
                    <h2 class="font-h2 text-h2 text-primary">Aturan &amp; Tata Tertib</h2>
                    <p class="text-on-surface-variant mt-sm">Mewujudkan lingkungan belajar yang tertib, aman, dan
                        barokah.</p>
                </div>
                <div class="space-y-sm">
                    <!-- Tab 1 -->
                    <details class="group bg-white border border-outline-variant rounded-xl overflow-hidden" open="">
                        <summary
                            class="flex justify-between items-center p-md cursor-pointer list-none hover:bg-surface-container-lowest transition-colors">
                            <div class="flex items-center gap-sm">
                                <span class="material-symbols-outlined text-secondary">gavel</span>
                                <span class="font-body-lg font-semibold text-primary">Peraturan Umum</span>
                            </div>
                            <span
                                class="material-symbols-outlined group-open:rotate-180 transition-transform text-on-surface-variant">expand_more</span>
                        </summary>
                        <div
                            class="p-md pt-0 border-t border-outline-variant/10 text-on-surface-variant leading-relaxed">
                            <ul class="list-disc pl-5 space-y-xs">
                                <li>Wajib mengikuti seluruh rangkaian kegiatan sekolah dan pondok.</li>
                                <li>Hadir di kelas 10 menit sebelum jam pelajaran dimulai.</li>
                                <li>Mengenakan seragam yang rapi, bersih, dan sesuai jadwal.</li>
                                <li>Menjaga kebersihan dan fasilitas lingkungan sekolah.</li>
                            </ul>
                        </div>
                    </details>
                    <!-- Tab 2 -->
                    <details class="group bg-white border border-outline-variant rounded-xl overflow-hidden">
                        <summary
                            class="flex justify-between items-center p-md cursor-pointer list-none hover:bg-surface-container-lowest transition-colors">
                            <div class="flex items-center gap-sm">
                                <span class="material-symbols-outlined text-secondary">volunteer_activism</span>
                                <span class="font-body-lg font-semibold text-primary">Etika</span>
                            </div>
                            <span
                                class="material-symbols-outlined group-open:rotate-180 transition-transform text-on-surface-variant">expand_more</span>
                        </summary>
                        <div
                            class="p-md pt-0 border-t border-outline-variant/10 text-on-surface-variant leading-relaxed">
                            <ul class="list-disc pl-5 space-y-xs">
                                <li>Menghormati ustadz/ustadzah dan sesama santri.</li>
                                <li>Membudayakan 5S (Senyum, Salam, Sapa, Sopan, Santun).</li>
                                <li>Menjaga adab saat makan, minum, dan beribadah.</li>
                                <li>Dilarang melakukan perundungan (bullying) dalam bentuk apapun.</li>
                            </ul>
                        </div>
                    </details>
                    <!-- Tab 3 -->
                    <details class="group bg-white border border-outline-variant rounded-xl overflow-hidden">
                        <summary
                            class="flex justify-between items-center p-md cursor-pointer list-none hover:bg-surface-container-lowest transition-colors">
                            <div class="flex items-center gap-sm">
                                <span class="material-symbols-outlined text-secondary">report_problem</span>
                                <span class="font-body-lg font-semibold text-primary">Kategori Pelanggaran</span>
                            </div>
                            <span
                                class="material-symbols-outlined group-open:rotate-180 transition-transform text-on-surface-variant">expand_more</span>
                        </summary>
                        <div
                            class="p-md pt-0 border-t border-outline-variant/10 text-on-surface-variant leading-relaxed">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-md">
                                <div class="p-sm bg-yellow-50 rounded-lg">
                                    <h4 class="font-bold text-yellow-800 text-sm mb-xs">Ringan</h4>
                                    <p class="text-xs">Terlambat, seragam tidak lengkap, rambut tidak rapi.</p>
                                </div>
                                <div class="p-sm bg-orange-50 rounded-lg">
                                    <h4 class="font-bold text-orange-800 text-sm mb-xs">Sedang</h4>
                                    <p class="text-xs">Membawa gadget tanpa izin, merusak fasilitas, membolos.</p>
                                </div>
                                <div class="p-sm bg-red-50 rounded-lg">
                                    <h4 class="font-bold text-red-800 text-sm mb-xs">Berat</h4>
                                    <p class="text-xs">Mencuri, merokok, berkelahi, atau pelanggaran asusila.</p>
                                </div>
                            </div>
                        </div>
                    </details>
                    <!-- Tab 4 -->
                    <details class="group bg-white border border-outline-variant rounded-xl overflow-hidden">
                        <summary
                            class="flex justify-between items-center p-md cursor-pointer list-none hover:bg-surface-container-lowest transition-colors">
                            <div class="flex items-center gap-sm">
                                <span class="material-symbols-outlined text-secondary">local_taxi</span>
                                <span class="font-body-lg font-semibold text-primary">Prosedur Penjemputan</span>
                            </div>
                            <span
                                class="material-symbols-outlined group-open:rotate-180 transition-transform text-on-surface-variant">expand_more</span>
                        </summary>
                        <div
                            class="p-md pt-0 border-t border-outline-variant/10 text-on-surface-variant leading-relaxed">
                            <ul class="list-disc pl-5 space-y-xs">
                                <li>Penjemputan hanya boleh dilakukan oleh orang tua atau wali yang terdaftar.</li>
                                <li>Wajib membawa kartu jemput atau konfirmasi via WhatsApp Official sekolah.</li>
                                <li>Penjemputan di luar jam operasional wajib mengajukan izin tertulis 1 hari
                                    sebelumnya.</li>
                                <li>Wajib lapor ke petugas keamanan/piket sebelum menjemput santri.</li>
                            </ul>
                        </div>
                    </details>
                </div>
            </div>
        </section>
    </main>
    @include('partials.site-footer')
<a href="{{ $cmsSettings['registration_url'] ?? config('services.ppdb_url', '#') }}" target="_blank" rel="noopener" class="floating-ppdb fixed z-50 rounded-full bg-gradient-to-r from-primary to-primary-container px-md py-sm text-sm font-bold uppercase tracking-[0.08em] text-on-primary shadow-2xl hover:scale-105 transition-transform">Daftar PPDB</a>
</body>

</html>
