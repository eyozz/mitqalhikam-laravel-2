@extends('admin.layout')
@section('title', 'Dashboard')
@section('content')
    <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-4">
        @foreach ([['Berita', $newsCount], ['Published', $publishedNewsCount], ['Galeri', $galleryCount], ['Pesan', $messageCount], ['Settings', $settingCount], ['Konten Page', $pageContentCount], ['Footer Links', $footerLinkCount]] as [$label, $count])
            <div class="rounded-3xl border border-white bg-white p-6 shadow-sm">
                <p class="text-sm font-bold uppercase tracking-[0.12em] text-slate-400">{{ $label }}</p>
                <p class="mt-3 text-4xl font-extrabold text-primary">{{ $count }}</p>
            </div>
        @endforeach
    </div>
    <div class="mt-8 rounded-3xl bg-white p-6 shadow-sm">
        <h3 class="text-lg font-extrabold text-primary">Pesan Kontak Terbaru</h3>
        <div class="mt-4 divide-y">
            @forelse ($latestMessages as $message)
                <a href="{{ route('admin.contacts.show', $message) }}" class="block py-4 hover:text-primary">
                    <p class="font-bold">{{ $message->name }} - {{ $message->subject }}</p>
                    <p class="text-sm text-slate-500">{{ $message->email }} / {{ $message->created_at->format('d M Y H:i') }}</p>
                </a>
            @empty
                <p class="py-4 text-slate-500">Belum ada pesan kontak.</p>
            @endforelse
        </div>
    </div>
@endsection
