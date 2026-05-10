<!DOCTYPE html>

<html class="light" lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
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
            <img src="{{ $cmsSettings['site_logo'] ?? asset('images/logo.jpg') }}" alt="Logo MITQ Al-Hikam" class="w-12 h-12 object-cover rounded-full" />
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
                        <img class="rounded-xl shadow-lg relative z-10 w-full h-[450px] object-cover border border-outline-variant/30"
                            data-alt="A serene and scholarly educational environment featuring traditional Islamic architectural elements combined with modern library facilities. The lighting is soft and golden, suggesting a peaceful afternoon of study. The scene includes neatly arranged books, wooden reading tables, and a large window overlooking a lush green garden, evoking a sense of calm focus and academic excellence."
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuCPyozpTUnbKUOOJ8sWeoReDiAfKaR-r58m2fJjOJi97HjXzUeHpz8j8YoERH1ED4iqQyHnp5Phnfzm-YyNQrKyaMaIhXOz0oc0QMFoK0whNsZ8AWuEyOQHolEGsE2euFcv110jnt8eoApkQ2AXipAU66bWEfln1olgLUUHT6urhksjkc277z5ymulqW8ApCc8LhXyClqroY-jcUsUWWLT-IlYosnFD0h5h8CJO_5MrLV5V_QE3fiUB1PVtWzOxzIS1SOA6rCn_d7Ra" />
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
            <!-- Bento Grid for Leadership -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-md">
                <!-- Pembina -->
                <div
                    class="md:col-span-2 bg-white p-md rounded-xl border border-outline-variant hover:border-primary transition-all shadow-sm group">
                    <div class="flex items-center gap-md">
                        <div
                            class="w-24 h-24 rounded-full bg-surface-container-highest overflow-hidden border-2 border-primary/20">
                            <img class="w-full h-full object-cover"
                                data-alt="Professional portrait of an elderly gentleman with a wise and friendly expression, wearing formal traditional Indonesian attire. The background is a soft-focus office setting with academic books, illuminated by natural warm light to convey authority and scholarly wisdom."
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCowMwMNuuodAKEpt42mj39-8MYpfpQhD7HHLcH-LuGQQDBRGSM_Rq5D2Pci0GAy4Ux9UA91KTqgjyj6OnMLtduCai3f009ukBfYQjCsY9_xRp27e-vpyi7RlrUSRnH7G4dBC9b8tZ5U3zgkq4JGteYcK0w6-3zBP8zx9osAAmqrz9V7LX83TZGz5bo03pvp-4iYe7JLlj02-sH3G-mGWzQeZdYgAwC9axjZC5hqvNkhZrATs6BfZDHsaZheyi17ESw0bjK6EhvUn2K" />
                        </div>
                        <div>
                            <span class="font-label-caps text-label-caps text-secondary">PEMBINA</span>
                            <h3
                                class="font-h3 text-h3 text-primary group-hover:text-primary-container transition-colors">
                                Sigit Basuki</h3>
                        </div>
                    </div>
                </div>
                <!-- Pengawas -->
                <div
                    class="md:col-span-2 bg-white p-md rounded-xl border border-outline-variant hover:border-primary transition-all shadow-sm group">
                    <div class="flex items-center gap-md">
                        <div
                            class="w-24 h-24 rounded-full bg-surface-container-highest overflow-hidden border-2 border-primary/20">
                            <img class="w-full h-full object-cover"
                                data-alt="Portrait of a professional man in his late 50s, displaying a focused and observant demeanor. He is wearing a neat batik shirt, standing against a neutral textured wall. The lighting is balanced and clear, emphasizing his role as an overseer and mentor within an educational institution."
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDdO-UnbachbWq0IzmEhIVQH7B7ddqeteqyfmXRQl7KXZ7Se6SCkRMf6YQrt_dJg3GxLeBaQU0HS8nbkxR0C9e58Vu4M-S8w5yHpcnb9Kofg4dhnLzuf4a4dhiLEBihi98IchtFusUXg4ISZ4FEiOomBHiJG6Jh3TCH4rKTekeNpDSMHpa_3FjgCGScIpyYkPO_52GX5bGThtuGhN4l66dv-aTW0nXW-lFIrEezH2444GyVIu9zSQPvwzZKkGjxs7TeI_zD_TJVroDy" />
                        </div>
                        <div>
                            <span class="font-label-caps text-label-caps text-secondary">PENGAWAS</span>
                            <h3
                                class="font-h3 text-h3 text-primary group-hover:text-primary-container transition-colors">
                                Muzayyin Marzuki</h3>
                        </div>
                    </div>
                </div>
                <!-- Yayasan -->
                <div
                    class="md:col-span-2 bg-white p-md rounded-xl border border-outline-variant hover:border-primary transition-all shadow-sm group">
                    <div class="flex items-center gap-md">
                        <div
                            class="w-24 h-24 rounded-full bg-surface-container-highest overflow-hidden border-2 border-primary/20">
                            <img class="w-full h-full object-cover"
                                data-alt="Professional mid-shot of a man representing leadership, wearing a formal suit. His expression is confident and welcoming. The setting is a modern boardroom with soft daylight, reflecting a professional yet accessible institutional head."
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDOKEHUqnjCVkqjASu36zkkJGYDBbX4pqM3g2cpqA8sJ9j5beVs3LYg4WnU68D1Qq6IgNtwyc59tC6PXV3ugkCQg1HdMdcTC0v6is-HKEsI6CHazSZQtnXC5eHQlLlxOcQUanvWBTyXjlq-_PHwEKP_mFux0wdnjyP4w6L0ni-RFbinL0nvlQRWqFzNBoX2mI6d_Zky_-zh_9l3PL3xG_5gRtspbqfQ1WCTotkhxveEU1dBNbmeswEsERJW-dfIGr9lOXpgFadUPjxm" />
                        </div>
                        <div>
                            <span class="font-label-caps text-label-caps text-secondary">KETUA YAYASAN</span>
                            <h3
                                class="font-h3 text-h3 text-primary group-hover:text-primary-container transition-colors">
                                Anas Ma’ruf</h3>
                        </div>
                    </div>
                </div>
                <!-- Kepala Sekolah -->
                <div
                    class="md:col-span-2 bg-primary p-md rounded-xl border border-primary transition-all shadow-md group">
                    <div class="flex items-center gap-md">
                        <div class="w-24 h-24 rounded-full bg-white/20 overflow-hidden border-2 border-white/50">
                            <img class="w-full h-full object-cover"
                                data-alt="Portrait of an educator with a warm and inspiring presence, wearing academic attire. He is positioned in front of a school building with students in soft focus in the background, symbolizing his leadership and dedication to the student body."
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAMAzwsTBHihMR8-AxyXCWwS5qW9-yF9uBmK--8_dDFK8FJGDPKESr6-oNajHZqtz-kkQKiFgaNSctG92hkqClVir-Vf2rTCWlJAfIqv2nQHQhhud5BJdPdVBYG9U0_r6uB3rYbGnnPZvKE8EoVr3LrqYDDqRDcV-qBxpZQ6UFJMXu266fVjdNZUfRL-xyFk8E2Gs3xBOAeOJAomCuTIQUURQaVZ74SGL-PAWQVVxhH0Oms9O5R5RX-e8GYxGwBtzbBFP4WadkZYW2T" />
                        </div>
                        <div>
                            <span class="font-label-caps text-label-caps text-secondary-fixed">KEPALA SEKOLAH</span>
                            <h3 class="font-h3 text-h3 text-on-primary">Dudi Budi Astoko, S.Pd.I., M.Pd.</h3>
                        </div>
                    </div>
                </div>
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
