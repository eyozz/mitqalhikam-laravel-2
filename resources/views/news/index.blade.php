<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    @include('partials.favicon')
    <title>News - MITQ Al Hikam Surakarta</title>
    <meta name="description" content="Berita, kegiatan, dan dokumentasi terbaru MITQ Al-Hikam Surakarta." />
    <meta property="og:title" content="News - MITQ Al Hikam Surakarta" />
    <meta property="og:description" content="Berita, kegiatan, dan dokumentasi terbaru MITQ Al-Hikam Surakarta." />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries,line-clamp"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Newsreader:ital,wght@0,400;0,500;0,600;1,400&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <script>
        tailwind.config = { theme: { extend: { colors: { primary: '#004d34', secondary: '#735c00', background: '#f9f9ff', surface: '#f9f9ff', 'surface-container-low': '#f0f3ff', 'surface-container-lowest': '#ffffff', 'surface-container-highest': '#dce2f3', 'on-primary': '#ffffff', 'on-surface': '#151c27', 'on-surface-variant': '#3f4943', 'outline-variant': '#bec9c1', 'secondary-container': '#fed65b', 'on-secondary-container': '#745c00' }, fontFamily: { 'body-md': ['Inter'], h1: ['Newsreader'], h2: ['Newsreader'], h3: ['Newsreader'], 'label-caps': ['Inter'] }, spacing: { gutter: '24px', sm: '12px', md: '24px', lg: '48px', xl: '80px', 'container-max': '1200px' } } } }
    </script>
    <style>.material-symbols-outlined{font-variation-settings:'FILL' 0,'wght' 400,'GRAD' 0,'opsz' 24}.bg-pattern{background-image:url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M30 0l15 15-15 15-15-15z' fill='%23004d34' fill-opacity='0.025'/%3E%3C/svg%3E")}</style>
    @include('partials.responsive-fixes')
</head>
<body class="bg-background text-on-surface font-body-md overflow-x-hidden">
    <header class="fixed top-0 w-full flex justify-between items-center px-gutter py-4 bg-surface/95 backdrop-blur-sm z-50 border-b border-outline-variant/30 shadow-sm shadow-primary/5">
        <a href="{{ route('home') }}" class="flex items-center gap-sm"><img src="{{ $cmsSettings['site_logo'] ?? asset('images/logo.jpg') }}" alt="Logo MITQ Al-Hikam" class="w-12 h-12 object-cover rounded-full"><span class="font-semibold text-primary">{{ $cmsSettings['site_name'] ?? 'MITQ Al-Hikam' }}</span></a>
        <nav class="hidden md:flex items-center space-x-md text-xs font-semibold tracking-[0.1em] uppercase">
            <a class="text-on-surface-variant hover:text-primary" href="{{ route('home') }}">Beranda</a>
            <a class="text-on-surface-variant hover:text-primary" href="{{ route('about') }}">Tentang Kami</a>
            <a class="text-on-surface-variant hover:text-primary" href="{{ route('program') }}">Program</a>
            <a class="text-primary border-b-2 border-secondary pb-1" href="{{ route('news.index') }}">News</a>
            <a class="text-on-surface-variant hover:text-primary" href="{{ route('contact') }}">Hubungi Kami</a>
        </nav>
        <a href="{{ $cmsSettings['registration_url'] ?? config('services.ppdb_url', '#') }}" target="_blank" rel="noopener" class="hidden md:inline-flex bg-primary text-on-primary px-md py-sm rounded-lg text-xs font-semibold tracking-[0.1em] uppercase hover:bg-[#006747] transition-all">Daftar Sekarang</a>

        <button type="button" data-mobile-menu-button aria-expanded="false" aria-label="Buka menu navigasi" class="md:hidden inline-flex h-11 w-11 items-center justify-center rounded-xl border border-outline-variant/50 bg-white/80 text-primary shadow-sm transition hover:bg-primary hover:text-white">
            <span class="material-symbols-outlined">menu</span>
        </button>
        @include('partials.mobile-menu')
    </header>

    <main class="pt-24">
        <section class="bg-pattern px-gutter py-xl">
            <div class="max-w-container-max mx-auto grid lg:grid-cols-2 gap-lg items-center">
                <div>
                    <span class="inline-flex rounded-full bg-secondary-container px-sm py-2 text-xs font-bold tracking-[0.1em] text-on-secondary-container uppercase">Berita & Dokumentasi</span>
                    <h1 class="mt-md font-h1 text-5xl md:text-6xl leading-tight text-primary">Kabar Terbaru dari Lingkungan Qur'ani Al Hikam</h1>
                    <p class="mt-md text-lg leading-8 text-on-surface-variant">Ikuti publikasi kegiatan santri, program tahfizh, pembinaan adab, dan dokumentasi sekolah.</p>
                </div>
                @if ($featuredPost)
                    <a href="{{ route('news.show', $featuredPost) }}" class="group block overflow-hidden rounded-2xl border border-outline-variant bg-white shadow-xl">
                        <img src="{{ $featuredPost->display_image }}" alt="{{ $featuredPost->title }}" class="h-72 w-full object-cover transition duration-500 group-hover:scale-105">
                        <div class="p-md">
                            <p class="text-xs font-bold uppercase tracking-[0.1em] text-secondary">Featured / {{ $featuredPost->category }}</p>
                            <h2 class="mt-sm font-h2 text-3xl text-primary">{{ $featuredPost->title }}</h2>
                            <p class="mt-sm text-on-surface-variant">{{ $featuredPost->excerpt }}</p>
                        </div>
                    </a>
                @endif
            </div>
        </section>

        <section class="px-gutter py-lg bg-white">
            <div class="max-w-container-max mx-auto flex flex-col gap-md md:flex-row md:items-center md:justify-between">
                <div>
                    <h2 class="font-h2 text-4xl text-primary">Daftar Artikel</h2>
                    <p class="mt-xs text-on-surface-variant">Cari artikel berdasarkan judul, kategori, atau ringkasan.</p>
                </div>
                <form action="{{ route('news.index') }}" method="GET" class="flex w-full md:w-[420px] gap-sm">
                    <input name="search" value="{{ $search }}" placeholder="Cari artikel..." class="w-full rounded-xl border-outline-variant bg-surface-container-low px-sm py-3 focus:border-primary focus:ring-primary">
                    <button class="rounded-xl bg-primary px-md py-3 text-on-primary" type="submit">Cari</button>
                </form>
            </div>
        </section>

        <section class="px-gutter pb-xl bg-white">
            <div class="max-w-container-max mx-auto grid gap-md md:grid-cols-2 lg:grid-cols-3">
                @forelse ($posts as $post)
                    <article class="group flex flex-col overflow-hidden rounded-2xl border border-outline-variant/60 bg-surface-container-lowest shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                        <img src="{{ $post->display_image }}" alt="{{ $post->title }}" class="h-56 w-full object-cover transition duration-500 group-hover:scale-105">
                        <div class="flex flex-1 flex-col p-md">
                            <div class="flex items-center justify-between text-xs font-bold uppercase tracking-[0.1em] text-on-surface-variant">
                                <span>{{ $post->published_at?->translatedFormat('d F Y') }}</span>
                                <span class="rounded-full bg-primary/10 px-sm py-1 text-primary">{{ $post->category }}</span>
                            </div>
                            <h3 class="mt-sm font-h3 text-2xl text-primary">{{ $post->title }}</h3>
                            <p class="mt-sm flex-1 text-on-surface-variant line-clamp-3">{{ $post->excerpt }}</p>
                            <a class="mt-md inline-flex items-center gap-xs font-semibold text-secondary" href="{{ route('news.show', $post) }}">Baca Selengkapnya <span class="material-symbols-outlined text-base">arrow_forward</span></a>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full rounded-2xl border border-outline-variant bg-surface-container-low p-lg text-center text-on-surface-variant">Belum ada artikel yang cocok dengan pencarian.</div>
                @endforelse
            </div>
            <div class="max-w-container-max mx-auto mt-lg">{{ $posts->links() }}</div>
        </section>

        @if ($homeGalleries->isNotEmpty())
            <section class="px-gutter pb-xl bg-white">
                <div class="max-w-container-max mx-auto">
                    <div class="mb-md flex items-end justify-between gap-md">
                        <div>
                            <p class="text-xs font-bold uppercase tracking-[0.1em] text-secondary">Galeri</p>
                            <h2 class="font-h2 text-4xl text-primary">Dokumentasi Kegiatan</h2>
                        </div>
                        <a href="{{ route('contact') }}" class="text-sm font-bold text-secondary">Hubungi Kami</a>
                    </div>
                    <div class="grid gap-md md:grid-cols-3">
                        @foreach ($homeGalleries as $gallery)
                            <article class="group overflow-hidden rounded-2xl border border-outline-variant bg-surface-container-lowest shadow-sm">
                                <img src="{{ $gallery->image_path }}" alt="{{ $gallery->title }}" class="h-56 w-full object-cover transition duration-500 group-hover:scale-105">
                                <div class="p-md">
                                    <h3 class="font-h3 text-2xl text-primary">{{ $gallery->title }}</h3>
                                    <p class="mt-xs line-clamp-2 text-on-surface-variant">{{ $gallery->description }}</p>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
    </main>
    @include('partials.site-footer')

    <a href="{{ $cmsSettings['registration_url'] ?? config('services.ppdb_url', '#') }}" target="_blank" rel="noopener" class="floating-ppdb fixed z-50 rounded-full bg-gradient-to-r from-primary to-[#006747] px-md py-sm text-sm font-bold uppercase tracking-[0.08em] text-white shadow-2xl">Daftar PPDB</a>
</body>
</html>
