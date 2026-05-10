<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('partials.favicon')
    <title>@yield('title', 'Admin CMS') - MITQ Al-Hikam</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,line-clamp"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script>tailwind.config={theme:{extend:{fontFamily:{sans:['Inter']},colors:{primary:'#004d34',gold:'#735c00',cream:'#f7f1e5'}}}}</script>
</head>
<body class="bg-slate-100 font-sans text-slate-900">
    <div class="min-h-screen lg:flex">
        <aside class="bg-primary text-white lg:fixed lg:inset-y-0 lg:w-72">
            <div class="flex items-center gap-3 px-6 py-6">
                <img src="{{ asset('images/logo.jpg') }}" alt="MITQ Al-Hikam" class="h-12 w-12 rounded-full object-cover bg-white">
                <div>
                    <p class="text-xs uppercase tracking-[0.2em] text-emerald-100">Admin CMS</p>
                    <h1 class="font-bold">MITQ Al-Hikam</h1>
                </div>
            </div>
            <nav class="space-y-1 px-4 pb-6 text-sm font-semibold">
                @php
                    $nav = [
                        ['Dashboard', 'admin.dashboard', 'admin'],
                        ['Berita', 'admin.news.index', 'admin/news'],
                        ['Galeri', 'admin.galleries.index', 'admin/galleries'],
                        ['Konten Halaman', 'admin.page-contents.index', 'admin/page-contents'],
                        ['Identitas & Link', 'admin.settings.index', 'admin/settings'],
                        ['Footer Links', 'admin.footer-links.index', 'admin/footer-links'],
                        ['Pesan Kontak', 'admin.contacts.index', 'admin/contacts'],
                    ];
                @endphp
                @foreach ($nav as [$label, $route, $pattern])
                    <a href="{{ route($route) }}" class="block rounded-xl px-4 py-3 transition {{ request()->is($pattern.'*') ? 'bg-white text-primary shadow' : 'text-emerald-50 hover:bg-white/10' }}">{{ $label }}</a>
                @endforeach
            </nav>
        </aside>

        <div class="flex-1 lg:pl-72">
            <header class="sticky top-0 z-30 border-b bg-white/90 backdrop-blur">
                <div class="flex items-center justify-between px-6 py-4">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-[0.15em] text-gold">Content Management System</p>
                        <h2 class="text-xl font-extrabold text-primary">@yield('title', 'Dashboard')</h2>
                    </div>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button class="rounded-xl border border-slate-200 px-4 py-2 text-sm font-bold text-slate-600 hover:border-primary hover:text-primary">Logout</button>
                    </form>
                </div>
            </header>

            <main class="px-6 py-8">
                @if (session('status'))
                    <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm font-semibold text-emerald-800">{{ session('status') }}</div>
                @endif
                @if ($errors->any())
                    <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-sm text-red-700">
                        <p class="font-bold">Ada input yang perlu diperbaiki:</p>
                        <ul class="mt-2 list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
