@extends('admin.layout')
@section('title', 'Kelola Galeri')
@section('content')
    <div class="mb-6 flex items-center justify-between"><p class="text-slate-600">Kelola foto section galeri di halaman website.</p><a href="{{ route('admin.galleries.create') }}" class="rounded-xl bg-primary px-5 py-3 text-sm font-bold text-white">Tambah Galeri</a></div>
    <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-3">
        @foreach ($galleries as $gallery)
            <div class="overflow-hidden rounded-3xl bg-white shadow-sm"><img src="{{ $gallery->image_path }}" class="h-48 w-full object-cover"><div class="p-5"><p class="text-xs font-bold uppercase tracking-[0.12em] text-gold">{{ $gallery->section }} / #{{ $gallery->sort_order }}</p><h3 class="mt-2 font-extrabold text-primary">{{ $gallery->title }}</h3><p class="mt-2 line-clamp-2 text-sm text-slate-500">{{ $gallery->description }}</p><div class="mt-4 flex gap-3"><a href="{{ route('admin.galleries.edit', $gallery) }}" class="font-bold text-primary">Edit</a><form method="POST" action="{{ route('admin.galleries.destroy', $gallery) }}" onsubmit="return confirm('Hapus galeri ini?')">@csrf @method('DELETE')<button class="font-bold text-red-600">Hapus</button></form></div></div></div>
        @endforeach
    </div>
    <div class="mt-6">{{ $galleries->links() }}</div>
@endsection
