@extends('admin.layout')
@section('title', 'Kelola Berita')
@section('content')
    <div class="mb-6 flex items-center justify-between gap-4">
        <p class="text-slate-600">Kelola artikel, thumbnail, kategori, dan status publish.</p>
        <a href="{{ route('admin.news.create') }}" class="rounded-xl bg-primary px-5 py-3 text-sm font-bold text-white">Tambah Berita</a>
    </div>
    <div class="overflow-hidden rounded-3xl bg-white shadow-sm">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-50 text-xs uppercase tracking-[0.12em] text-slate-500"><tr><th class="p-4">Judul</th><th>Kategori</th><th>Status</th><th>Tanggal</th><th class="text-right pr-4">Aksi</th></tr></thead>
            <tbody class="divide-y">
                @foreach ($posts as $post)
                    <tr><td class="p-4 font-bold text-primary">{{ $post->title }}</td><td>{{ $post->category }}</td><td><span class="rounded-full px-3 py-1 text-xs font-bold {{ $post->status === 'published' ? 'bg-emerald-50 text-emerald-700' : 'bg-amber-50 text-amber-700' }}">{{ $post->status }}</span></td><td>{{ $post->published_at?->format('d M Y') ?: '-' }}</td><td class="pr-4 text-right"><a class="font-bold text-primary" href="{{ route('admin.news.edit', $post) }}">Edit</a><form method="POST" action="{{ route('admin.news.destroy', $post) }}" class="inline" onsubmit="return confirm('Hapus berita ini?')">@csrf @method('DELETE') <button class="ml-3 font-bold text-red-600">Hapus</button></form></td></tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-6">{{ $posts->links() }}</div>
@endsection
