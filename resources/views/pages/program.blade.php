<!DOCTYPE html>

<html class="light" lang="id">

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
                        background-color: #f9f9ff;
                        background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M30 0l5.878 18.09h19.022l-15.388 11.18 5.878 18.09L30 36.18l-15.39 11.18 5.878-18.09L5.1 18.09h19.022L30 0z' fill='%23004d34' fill-opacity='0.03' fill-rule='evenodd'/%3E%3C/svg%3E");
                }

                .ambient-shadow {
                        box-shadow: 0 10px 30px -10px rgba(0, 77, 52, 0.08);
                }
        </style>
    @include('partials.responsive-fixes')
</head>

<body class="bg-background font-body-md text-on-background selection:bg-primary-fixed selection:text-on-primary-fixed">
        <!-- TopNavBar -->
        <nav
                class="fixed top-0 w-full flex justify-between items-center px-gutter py-4  bg-surface/95 dark:bg-surface-dim/95 backdrop-blur-sm z-50 border-b border-outline-variant/30 shadow-sm shadow-primary/5">
                <a href="{{ route('home') }}" class="flex items-center gap-sm">
                        <img src="{{ $cmsSettings['site_logo'] ?? asset('images/logo.jpg') }}" alt="Logo MITQ Al-Hikam"
                                class="w-12 h-12 object-cover rounded-full" />
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
                        <a class="font-label-caps text-label-caps text-primary dark:text-primary-fixed border-b-2 border-secondary dark:border-secondary-fixed pb-1"
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
                </div>
                <a href="{{ $cmsSettings['registration_url'] ?? config('services.ppdb_url', '#') }}" target="_blank" rel="noopener" class="hidden md:inline-flex bg-primary text-on-primary px-md py-sm rounded-lg font-label-caps text-label-caps hover:bg-primary-container transition-all active:opacity-80">Daftar Sekarang (PPDB)</a>

        <button type="button" data-mobile-menu-button aria-expanded="false" aria-label="Buka menu navigasi" class="md:hidden inline-flex h-11 w-11 items-center justify-center rounded-xl border border-outline-variant/50 bg-white/80 text-primary shadow-sm transition hover:bg-primary hover:text-white">
            <span class="material-symbols-outlined">menu</span>
        </button>
        @include('partials.mobile-menu')
        </nav>
        <!-- Hero Section -->
        <header class="relative pt-xl pb-xl px-gutter islamic-pattern mt-16 overflow-hidden">
                <div
                        class="max-w-container-max mx-auto grid grid-cols-1 md:grid-cols-2 gap-xl items-center relative z-10">
                        <div>
                                <span
                                        class="inline-block py-1 px-3 bg-secondary-fixed text-on-secondary-fixed rounded-full font-label-caps text-[10px] mb-md">PROGRAM
                                        PENDIDIKAN</span>
                                <h1 class="font-h1 text-h1 text-primary mb-md">{{ $cmsContent->get('program.hero.title', 'Kurikulum Adab dan Ilmu Berbasis Tahfizh') }}</h1>
                                <p class="text-body-lg font-body-lg text-on-surface-variant mb-lg max-w-lg">
                                        {{ $cmsContent->get('program.hero.subtitle', 'Menyeimbangkan hafalan Al-Quran dengan pemahaman agama dan kecakapan akademik umum untuk mencetak generasi Rabbani.') }}
                                </p>
                                <div class="flex gap-sm">
                                        <a href="#kurikulum" class="bg-secondary text-on-secondary px-md py-sm rounded-lg font-label-caps text-label-caps flex items-center gap-xs">Lihat Kurikulum <span class="material-symbols-outlined text-sm" data-icon="arrow_downward">arrow_downward</span></a>
                                </div>
                        </div>
                        <div class="relative group">
                                <div
                                        class="absolute inset-0 bg-primary/10 rounded-2xl rotate-3 scale-105 group-hover:rotate-0 transition-transform duration-500">
                                </div>
                                <img alt="Students studying"
                                        class="relative z-10 rounded-2xl w-full h-[400px] object-cover ambient-shadow border border-outline-variant/30"
                                        data-alt="A serene scene of young students in traditional Islamic attire sitting on a clean, light-filled classroom floor, focused on reading the Holy Quran from elegant wooden stands. The background shows large arched windows with soft daylight streaming in, highlighting the professional institutional atmosphere. The color palette features soft emerald and warm ivory tones, reflecting a peaceful scholarship environment."
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBCQNj_uNnnlbiWafoFY8vvldz9rihoQunAOXnK3LECWGfLZX4oDFj6OeZwZiM2rQtu73lvxZh-PPl-4FNVn4xnoSScK23tpgCLWgHiex9e4WAB0qf25mzZ59ZgwACexeYaWXN_Ayx7KT9EK9ou7VdmS1eejOkptKsg7sgfZFfBNcQPOAmZXF3GOL5STGn6o3E7opfiQciQjH9-Hj2j0DVEYeFVW2GcetYwqH7HeJJQ4F_5TMod0TVu28bP4iMT3qXM2hzfFckOwdEk" />
                        </div>
                </div>
        </header>
        <!-- Konsep Mulazamah (Bento Grid) -->
        <section class="py-xl px-gutter bg-white">
                <div class="max-w-container-max mx-auto">
                        <div class="text-center mb-xl">
                                <h2 class="font-h2 text-h2 text-primary mb-xs">Konsep Mulazamah</h2>
                                <p class="text-on-surface-variant max-w-2xl mx-auto">Metodologi pendidikan terintegrasi
                                        yang menekankan pada kedekatan interaksi guru dan murid dalam menyerap ilmu.</p>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-md">
                                <!-- Hifzh -->
                                <div
                                        class="p-md bg-surface-container-low border border-outline-variant/50 rounded-xl hover:border-primary/30 transition-all group">
                                        <div
                                                class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mb-md group-hover:bg-primary transition-colors">
                                                <span class="material-symbols-outlined text-primary group-hover:text-white"
                                                        data-icon="menu_book">menu_book</span>
                                        </div>
                                        <h3 class="font-h3 text-h3 text-primary mb-sm">Hifzh</h3>
                                        <p class="text-body-md font-body-md text-on-surface-variant">Proses menghafal
                                                Al-Qur'an secara teliti dan disiplin, memastikan setiap ayat tertanam
                                                kuat dalam ingatan santri melalui bimbingan intensif.</p>
                                </div>
                                <!-- Fahm -->
                                <div
                                        class="p-md bg-surface-container-low border border-outline-variant/50 rounded-xl hover:border-primary/30 transition-all group">
                                        <div
                                                class="w-12 h-12 bg-secondary/10 rounded-lg flex items-center justify-center mb-md group-hover:bg-secondary transition-colors">
                                                <span class="material-symbols-outlined text-secondary group-hover:text-white"
                                                        data-icon="lightbulb">lightbulb</span>
                                        </div>
                                        <h3 class="font-h3 text-h3 text-primary mb-sm">Fahm</h3>
                                        <p class="text-body-md font-body-md text-on-surface-variant">Lebih dari sekadar
                                                menghafal, santri didorong untuk memahami makna (Tadabbur) dan konteks
                                                ayat yang dihafal untuk pengamalan nyata.</p>
                                </div>
                                <!-- Muroja'ah -->
                                <div
                                        class="p-md bg-surface-container-low border border-outline-variant/50 rounded-xl hover:border-primary/30 transition-all group">
                                        <div
                                                class="w-12 h-12 bg-primary-fixed-dim rounded-lg flex items-center justify-center mb-md group-hover:bg-primary-container transition-colors">
                                                <span class="material-symbols-outlined text-on-primary-fixed-variant group-hover:text-white"
                                                        data-icon="refresh">refresh</span>
                                        </div>
                                        <h3 class="font-h3 text-h3 text-primary mb-sm">Muroja’ah</h3>
                                        <p class="text-body-md font-body-md text-on-surface-variant">Sistem pengulangan
                                                rutin berjenjang untuk menjaga kelestarian hafalan, membangun ketekunan
                                                dan kesabaran dalam berinteraksi dengan Al-Qur'an.</p>
                                </div>
                        </div>
                </div>
        </section>
        <!-- Program Unggulan -->
        <section class="py-xl px-gutter bg-surface-container-low/50">
                <div class="max-w-container-max mx-auto">
                        <div class="flex flex-col md:flex-row justify-between items-end mb-xl gap-md">
                                <div class="max-w-xl">
                                        <h2 class="font-h2 text-h2 text-primary">Program Unggulan</h2>
                                        <p class="text-on-surface-variant">Fokus utama pengembangan kompetensi santri
                                                MITQ Al-Hikam.</p>
                                </div>
                                <div class="h-px flex-grow bg-outline-variant/30 mx-md hidden md:block"></div>
                        </div>
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-lg">
                                <!-- Hifzhul Quran -->
                                <div
                                        class="flex bg-white rounded-xl overflow-hidden ambient-shadow border border-outline-variant/30 group">
                                        <div class="w-1/3 bg-primary-container relative overflow-hidden">
                                                <img alt="Quran detail"
                                                        class="absolute inset-0 w-full h-full object-cover opacity-60 group-hover:scale-110 transition-transform duration-700"
                                                        data-alt="A detailed close-up of an open Quran with intricate golden calligraphy on high-quality paper, resting on a velvet stand. Soft emerald light highlights the textures of the pages. The setting is a quiet, scholarly library with shelves of leather-bound books in the blurred background. The image conveys a mood of deep sanctity and academic excellence in an Islamic institutional style."
                                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDUq09oJfqzsItwV5g3CpDt_kebJ4YHEdeSEwNI86Tz19YWJi4H-xoNYjJsLOk0BvV8z-2_XR0hY9oqlOL4RqtNRxdT6t6ejdbpM7bnw7ne_F3_RbtWkytjRzeT2L00Mw8tInRulIFajNGZGX0MVsOf0QO0ienby1OHg_KUkTPYEoY5Dc233yWWqbXWrhSEC6CPxNCSlqITL0d3c0Wmlyeb_lJ851j9sUufYeYk0Pt3lTOCLHSw-mM0bD_ivIggUpCaPg2Ky0UYH4pS" />
                                        </div>
                                        <div class="w-2/3 p-md flex flex-col justify-center">
                                                <h4 class="font-h3 text-h3 text-primary mb-xs">Hifzhul Qur’an 5-10 Juz
                                                </h4>
                                                <p class="text-on-surface-variant text-body-md mb-md">Target hafalan
                                                        bertahap dengan standar mutu tajwid yang ketat selama masa
                                                        pendidikan.</p>
                                                <div class="flex gap-xs">
                                                        <span
                                                                class="px-2 py-1 bg-surface-container-high rounded text-[10px] font-label-caps">INTENSIF</span>
                                                        <span
                                                                class="px-2 py-1 bg-surface-container-high rounded text-[10px] font-label-caps">BERSANAD</span>
                                                </div>
                                        </div>
                                </div>
                                <!-- Program MAHIR -->
                                <div
                                        class="flex bg-white rounded-xl overflow-hidden ambient-shadow border border-outline-variant/30 group">
                                        <div class="w-1/3 bg-secondary-container relative overflow-hidden">
                                                <img alt="Collaborative learning"
                                                        class="absolute inset-0 w-full h-full object-cover opacity-60 group-hover:scale-110 transition-transform duration-700"
                                                        data-alt="Two diverse young scholars engaged in a serious discussion over a map and ancient texts in a bright, modern learning hub. The room is filled with soft, natural light, emphasizing a high-key professional aesthetic. Minimalist furniture and emerald accents are visible. The mood is collaborative and focused on scholarship and intellectual growth."
                                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDFoMle_74y_3lNPyxbYgMRIn8EscRhFTvf73RvlR8JZES9I4UEJuDUpzl-Byt-qUV15FaxRwBKnjfC_dq5p-iGdfXEyb6rZjH7dYp9cXJm1eVlXHaftkzkebDNDwJTKJ5aLKzuwH5-jKpww6QDa1NWSXCgENY4DALu1x1QAyTu9zl6_aGJOxd36lSBqlnujxPP3D9RzygLQSBztehVv2hfrtwMLQfsagOe8CDcTMY047oMDxaRqF9Y5K3H5B1ykHT7V1l963xjsVPf" />
                                        </div>
                                        <div class="w-2/3 p-md flex flex-col justify-center">
                                                <h4 class="font-h3 text-h3 text-primary mb-xs">Program MAHIR</h4>
                                                <p class="text-on-surface-variant text-body-md mb-md">Madrasah Al Hikam
                                                        Islamic Review: Program penguatan literasi kitab kuning dan
                                                        aqidah.</p>
                                                <div class="flex gap-xs">
                                                        <span
                                                                class="px-2 py-1 bg-surface-container-high rounded text-[10px] font-label-caps">LITERASI</span>
                                                        <span
                                                                class="px-2 py-1 bg-surface-container-high rounded text-[10px] font-label-caps">AQIDAH</span>
                                                </div>
                                        </div>
                                </div>
                                <!-- Tahsin & Tajwid -->
                                <div
                                        class="lg:col-span-2 flex bg-white rounded-xl overflow-hidden ambient-shadow border border-outline-variant/30 group">
                                        <div class="w-1/4 bg-tertiary-container relative overflow-hidden">
                                                <img alt="Teaching Arabic"
                                                        class="absolute inset-0 w-full h-full object-cover opacity-60 group-hover:scale-110 transition-transform duration-700"
                                                        data-alt="A close-up of a teacher's hand pointing to Arabic script on a blackboard in a modern, clean classroom. The lighting is warm and encouraging. The environment is orderly and academic, featuring emerald green boards and light wood furniture. The focus is on precision and the beauty of Arabic calligraphy and phonetics in an educational setting."
                                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAd6an2QcVnM8NQvs1Ge4AUwyAdx8h1_q5gq9hnSn0rw4oxz7W9NxFttlbmCRvvKWO0Mw1NeWg8DRyrUYv9-2zgLtVRjS5UstbFzKINur23NEwWYZK6qr_tRHJSuWgUitGfSn6VW26oBH80FafwsqMz72Hx2OGxrAxBsnUSQsA42tkWfkBj_idK5_QbT1AWsWkAImD-RNBWCsg0m2LSImIUYQTESxliDAm4DFO35EDadydXL5kkWIp8llu2O9upnpBR8UiYyRB8FiAT" />
                                        </div>
                                        <div class="w-3/4 p-md flex flex-col justify-center">
                                                <h4 class="font-h3 text-h3 text-primary mb-xs">Tahsin &amp; Tajwid
                                                        Al-Karimah</h4>
                                                <p class="text-on-surface-variant text-body-md mb-md">Perbaikan bacaan
                                                        secara mendasar hingga mahir menggunakan metode talaqqi yang
                                                        teruji, memastikan kefasihan lisan sesuai kaidah qira'ah.</p>
                                                <div class="flex gap-xs">
                                                        <span
                                                                class="px-2 py-1 bg-surface-container-high rounded text-[10px] font-label-caps">TALAQQI</span>
                                                        <span
                                                                class="px-2 py-1 bg-surface-container-high rounded text-[10px] font-label-caps">FASHOHAH</span>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </section>
        <!-- Peta Target Hafalan -->
        <section class="py-xl px-gutter bg-white">
                <div class="max-w-container-max mx-auto">
                        <div class="bg-primary rounded-2xl p-lg text-white relative overflow-hidden">
                                <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -mr-32 -mt-32">
                                </div>
                                <h2 class="font-h2 text-h2 mb-lg relative z-10">Peta Target Hafalan</h2>
                                <div class="overflow-x-auto relative z-10">
                                        <table class="w-full text-left border-collapse">
                                                <thead>
                                                        <tr class="border-b border-white/20">
                                                                <th class="py-md font-label-caps text-label-caps">
                                                                        JENJANG KELAS</th>
                                                                <th class="py-md font-label-caps text-label-caps">TARGET
                                                                        HAFALAN</th>
                                                                <th class="py-md font-label-caps text-label-caps">MATERI
                                                                        FOKUS</th>
                                                        </tr>
                                                </thead>
                                                <tbody class="text-body-md">
                                                        <tr
                                                                class="border-b border-white/10 hover:bg-white/5 transition-colors">
                                                                <td class="py-md">Kelas 1 - 5</td>
                                                                <td class="py-md">1 Juz / Tahun</td>
                                                                <td class="py-md">Tahsin Dasar &amp; Juz Amma (30-26)
                                                                </td>
                                                        </tr>
                                                        <tr
                                                                class="border-b border-white/10 hover:bg-white/5 transition-colors">
                                                                <td class="py-md">Kelas 6</td>
                                                                <td class="py-md">5 Juz (Akselerasi)</td>
                                                                <td class="py-md">Persiapan Ujian Niha'i &amp; Muroja'ah
                                                                        Kubro</td>
                                                        </tr>
                                                </tbody>
                                        </table>
                                </div>
                                <div
                                        class="mt-lg p-md bg-white/10 rounded-lg border border-white/20 flex items-center gap-md">
                                        <div
                                                class="flex-shrink-0 w-12 h-12 bg-secondary rounded-full flex items-center justify-center font-bold text-lg">
                                                6+</div>
                                        <p class="text-body-md italic">Target total kelulusan santri MITQ Al-Hikam
                                                minimal 10 Juz dengan kualitas Itqon.</p>
                                </div>
                        </div>
                </div>
        </section>
        <!-- Materi & Amaliyah (Academic Timeline Logic) -->
        <section class="py-xl px-gutter bg-surface-container-low">
                <div class="max-w-container-max mx-auto">
                        <div class="text-center mb-xl">
                                <h2 class="font-h2 text-h2 text-primary">Materi &amp; Amaliyah</h2>
                                <div class="flex justify-center mt-md">
                                        <div class="bg-surface-container-high p-1 rounded-full flex gap-xs">
                                                <button
                                                        class="px-md py-2 bg-primary text-on-primary rounded-full font-label-caps text-[10px]">DAILIES</button>
                                                <button
                                                        class="px-md py-2 text-on-surface-variant hover:text-primary rounded-full font-label-caps text-[10px]">WEEKLY</button>
                                        </div>
                                </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-md">
                                <!-- Hadits & Doa -->
                                <div
                                        class="bg-white p-md rounded-xl border border-outline-variant/30 flex flex-col gap-md">
                                        <div class="flex items-center gap-md">
                                                <div class="w-1.5 h-12 bg-secondary rounded-full"></div>
                                                <h4 class="font-h3 text-[22px] text-primary">Hadits &amp; Doa</h4>
                                        </div>
                                        <ul class="space-y-sm text-on-surface-variant text-body-md">
                                                <li class="flex gap-sm items-start"><span
                                                                class="material-symbols-outlined text-secondary text-sm"
                                                                data-icon="check_circle">check_circle</span> Hafalan
                                                        Arba'in Nawawi</li>
                                                <li class="flex gap-sm items-start"><span
                                                                class="material-symbols-outlined text-secondary text-sm"
                                                                data-icon="check_circle">check_circle</span> Doa Harian
                                                        sesuai Sunnah</li>
                                                <li class="flex gap-sm items-start"><span
                                                                class="material-symbols-outlined text-secondary text-sm"
                                                                data-icon="check_circle">check_circle</span> Adab Makan
                                                        &amp; Tidur</li>
                                        </ul>
                                </div>
                                <!-- Tahsin -->
                                <div
                                        class="bg-white p-md rounded-xl border border-outline-variant/30 flex flex-col gap-md">
                                        <div class="flex items-center gap-md">
                                                <div class="w-1.5 h-12 bg-primary rounded-full"></div>
                                                <h4 class="font-h3 text-[22px] text-primary">Tahsin Quran</h4>
                                        </div>
                                        <ul class="space-y-sm text-on-surface-variant text-body-md">
                                                <li class="flex gap-sm items-start"><span
                                                                class="material-symbols-outlined text-primary text-sm"
                                                                data-icon="check_circle">check_circle</span> Makharijul
                                                        Huruf</li>
                                                <li class="flex gap-sm items-start"><span
                                                                class="material-symbols-outlined text-primary text-sm"
                                                                data-icon="check_circle">check_circle</span> Sifatul
                                                        Huruf</li>
                                                <li class="flex gap-sm items-start"><span
                                                                class="material-symbols-outlined text-primary text-sm"
                                                                data-icon="check_circle">check_circle</span> Kaidah Mad
                                                        &amp; Waqaf</li>
                                        </ul>
                                </div>
                                <!-- Amaliyah/Fajr -->
                                <div
                                        class="bg-white p-md rounded-xl border border-outline-variant/30 flex flex-col gap-md">
                                        <div class="flex items-center gap-md">
                                                <div class="w-1.5 h-12 bg-primary-container rounded-full"></div>
                                                <h4 class="font-h3 text-[22px] text-primary">Amaliyah Fajr</h4>
                                        </div>
                                        <ul class="space-y-sm text-on-surface-variant text-body-md">
                                                <li class="flex gap-sm items-start"><span
                                                                class="material-symbols-outlined text-primary-container text-sm"
                                                                data-icon="check_circle">check_circle</span> Dzikir Pagi
                                                        &amp; Petang</li>
                                                <li class="flex gap-sm items-start"><span
                                                                class="material-symbols-outlined text-primary-container text-sm"
                                                                data-icon="check_circle">check_circle</span> Kultum
                                                        Ba'da Subuh</li>
                                                <li class="flex gap-sm items-start"><span
                                                                class="material-symbols-outlined text-primary-container text-sm"
                                                                data-icon="check_circle">check_circle</span> Praktik
                                                        Ibadah Shalat</li>
                                        </ul>
                                </div>
                        </div>
                </div>
        </section>
        <!-- Kurikulum Umum & Kesantrian -->
        <section id="kurikulum" class="py-xl px-gutter bg-white scroll-mt-28">
                <div class="max-w-container-max mx-auto grid grid-cols-1 lg:grid-cols-2 gap-xl">
                        <!-- Kurikulum Umum -->
                        <div>
                                <h2 class="font-h2 text-h2 text-primary mb-lg border-l-4 border-secondary pl-md">
                                        Kurikulum Umum</h2>
                                <div class="space-y-md">
                                        <details class="group rounded-xl border border-outline-variant/40 bg-white p-md transition hover:bg-surface-container-lowest" open>
                                                <summary class="flex cursor-pointer list-none items-center justify-between gap-md">
                                                        <div>
                                                                <p class="font-label-caps text-label-caps text-secondary mb-xs">MATERI INTI</p>
                                                                <h5 class="font-body-lg font-bold text-on-surface">Bahasa Indonesia &amp; Matematika</h5>
                                                        </div>
                                                        <span class="material-symbols-outlined text-outline transition group-open:rotate-90 group-hover:text-primary">chevron_right</span>
                                                </summary>
                                                <p class="mt-sm text-body-md text-on-surface-variant">Penguatan literasi, numerasi, penalaran dasar, dan problem solving yang terintegrasi dengan adab belajar santri.</p>
                                        </details>
                                        <details class="group rounded-xl border border-outline-variant/40 bg-white p-md transition hover:bg-surface-container-lowest">
                                                <summary class="flex cursor-pointer list-none items-center justify-between gap-md">
                                                        <div>
                                                                <p class="font-label-caps text-label-caps text-secondary mb-xs">SAINS</p>
                                                                <h5 class="font-body-lg font-bold text-on-surface">IPAS (Ilmu Pengetahuan Alam &amp; Sosial)</h5>
                                                        </div>
                                                        <span class="material-symbols-outlined text-outline transition group-open:rotate-90 group-hover:text-primary">chevron_right</span>
                                                </summary>
                                                <p class="mt-sm text-body-md text-on-surface-variant">Pembelajaran observasi alam, sosial, dan lingkungan sekitar untuk menumbuhkan rasa syukur serta kepekaan santri.</p>
                                        </details>
                                        <details class="group rounded-xl border border-outline-variant/40 bg-white p-md transition hover:bg-surface-container-lowest">
                                                <summary class="flex cursor-pointer list-none items-center justify-between gap-md">
                                                        <div>
                                                                <p class="font-label-caps text-label-caps text-secondary mb-xs">LINGUISTIK</p>
                                                                <h5 class="font-body-lg font-bold text-on-surface">Bahasa Arab &amp; Inggris Dasar</h5>
                                                        </div>
                                                        <span class="material-symbols-outlined text-outline transition group-open:rotate-90 group-hover:text-primary">chevron_right</span>
                                                </summary>
                                                <p class="mt-sm text-body-md text-on-surface-variant">Pengenalan kosakata dan komunikasi dasar untuk menunjang pemahaman Al-Qur'an serta wawasan global santri.</p>
                                        </details>
                                </div>
                        </div>
                        <!-- Ekstrakurikuler -->
                        <div class="bg-surface-container-low rounded-2xl p-lg">
                                <h2 class="font-h2 text-h2 text-primary mb-lg">Kegiatan Kesantrian</h2>
                                <div class="grid grid-cols-2 gap-md">
                                        <div
                                                class="bg-white p-sm rounded-lg border border-outline-variant/50 text-center flex flex-col items-center">
                                                <div
                                                        class="w-12 h-12 bg-primary/5 rounded-full flex items-center justify-center mb-sm">
                                                        <span class="material-symbols-outlined text-primary"
                                                                data-icon="sports_martial_arts">sports_martial_arts</span>
                                                </div>
                                                <span class="font-label-caps text-label-caps">Tapak Siaga</span>
                                        </div>
                                        <div
                                                class="bg-white p-sm rounded-lg border border-outline-variant/50 text-center flex flex-col items-center">
                                                <div
                                                        class="w-12 h-12 bg-primary/5 rounded-full flex items-center justify-center mb-sm">
                                                        <span class="material-symbols-outlined text-primary"
                                                                data-icon="ads_click">ads_click</span>
                                                </div>
                                                <span class="font-label-caps text-label-caps">Memanah</span>
                                        </div>
                                        <div
                                                class="bg-white p-sm rounded-lg border border-outline-variant/50 text-center flex flex-col items-center">
                                                <div
                                                        class="w-12 h-12 bg-primary/5 rounded-full flex items-center justify-center mb-sm">
                                                        <span class="material-symbols-outlined text-primary"
                                                                data-icon="nature_people">nature_people</span>
                                                </div>
                                                <span class="font-label-caps text-label-caps">Pramuka Sako</span>
                                        </div>
                                        <div
                                                class="bg-white p-sm rounded-lg border border-outline-variant/50 text-center flex flex-col items-center">
                                                <div
                                                        class="w-12 h-12 bg-primary/5 rounded-full flex items-center justify-center mb-sm">
                                                        <span class="material-symbols-outlined text-primary"
                                                                data-icon="draw">draw</span>
                                                </div>
                                                <span class="font-label-caps text-label-caps">Kaligrafi</span>
                                        </div>
                                </div>
                                <div class="mt-lg p-md bg-secondary/10 border border-secondary/20 rounded-lg">
                                        <h6 class="font-bold text-primary mb-xs">Program Kemandirian</h6>
                                        <p class="text-on-surface-variant text-body-md">Santri dilatih untuk mandiri
                                                dalam mengelola keperluan pribadi (Self-Management) sejak dini di
                                                asrama.</p>
                                </div>
                        </div>
                </div>
        </section>
    @include('partials.site-footer')
<a href="{{ $cmsSettings['registration_url'] ?? config('services.ppdb_url', '#') }}" target="_blank" rel="noopener" class="floating-ppdb fixed z-50 rounded-full bg-gradient-to-r from-primary to-primary-container px-md py-sm text-sm font-bold uppercase tracking-[0.08em] text-on-primary shadow-2xl hover:scale-105 transition-transform">Daftar PPDB</a>
</body>

</html>
