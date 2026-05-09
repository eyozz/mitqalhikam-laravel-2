<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>{{ $post->title }} - MITQ Al Hikam</title>
    <meta name="description" content="{{ $post->excerpt }}" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Newsreader:ital,wght@0,400;0,500;0,600;1,400&display=swap" rel="stylesheet" />
    <script>tailwind.config={theme:{extend:{colors:{primary:'#004d34',secondary:'#735c00',background:'#f9f9ff'},fontFamily:{sans:['Inter'],serif:['Newsreader']}}}}</script>
</head>
<body class="bg-background text-slate-900 font-sans">
    <header class="sticky top-0 z-40 border-b bg-white/90 px-6 py-4 backdrop-blur">
        <div class="mx-auto flex max-w-6xl items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-3 font-bold text-primary"><img src="{{ asset('images/logo-al-hikam.svg') }}" class="h-11 w-11 rounded-full" alt="Logo">MITQ AL-HIKAM</a>
            <a href="{{ route('news.index') }}" class="text-sm font-semibold text-secondary">Kembali ke News</a>
        </div>
    </header>
    <main>
        <article class="mx-auto max-w-4xl px-6 py-12">
            <p class="text-xs font-bold uppercase tracking-[0.12em] text-secondary">{{ $post->category }} / {{ $post->published_at?->translatedFormat('d F Y') }}</p>
            <h1 class="mt-4 font-serif text-4xl leading-tight text-primary md:text-6xl">{{ $post->title }}</h1>
            <p class="mt-5 text-xl leading-8 text-slate-600">{{ $post->excerpt }}</p>
            <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="mt-8 h-[420px] w-full rounded-3xl object-cover shadow-xl">
            <div class="prose prose-lg mt-10 max-w-none prose-headings:font-serif prose-headings:text-primary prose-a:text-secondary">
                {!! $post->content !!}
            </div>
        </article>
        @if ($relatedPosts->isNotEmpty())
            <section class="bg-white px-6 py-12">
                <div class="mx-auto max-w-6xl">
                    <h2 class="font-serif text-3xl text-primary">Related Posts</h2>
                    <div class="mt-6 grid gap-6 md:grid-cols-3">
                        @foreach ($relatedPosts as $relatedPost)
                            <a href="{{ route('news.show', $relatedPost) }}" class="rounded-2xl border bg-background p-5 transition hover:-translate-y-1 hover:shadow-lg">
                                <p class="text-xs font-bold uppercase tracking-[0.1em] text-secondary">{{ $relatedPost->category }}</p>
                                <h3 class="mt-2 font-serif text-2xl text-primary">{{ $relatedPost->title }}</h3>
                            </a>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
    </main>
</body>
</html>
