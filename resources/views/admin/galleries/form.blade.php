@extends('admin.layout')
@section('title', $gallery->exists ? 'Edit Galeri' : 'Tambah Galeri')
@section('content')
    <form method="POST" enctype="multipart/form-data" action="{{ $gallery->exists ? route('admin.galleries.update', $gallery) : route('admin.galleries.store') }}" class="max-w-3xl rounded-3xl bg-white p-6 shadow-sm">
        @csrf @if ($gallery->exists) @method('PUT') @endif
        @if ($gallery->image_path)<img src="{{ $gallery->image_path }}" class="mb-5 h-64 w-full rounded-2xl object-cover">@endif
        <label class="font-bold">Judul</label><input name="title" value="{{ old('title', $gallery->title) }}" required class="mt-2 w-full rounded-xl border-slate-200">
        <label class="mt-5 block font-bold">Deskripsi</label><textarea name="description" rows="3" class="mt-2 w-full rounded-xl border-slate-200">{{ old('description', $gallery->description) }}</textarea>
        <div class="mt-5 grid gap-5 md:grid-cols-2"><div><label class="font-bold">Section</label><input name="section" value="{{ old('section', $gallery->section ?: 'home') }}" required class="mt-2 w-full rounded-xl border-slate-200"></div><div><label class="font-bold">Urutan</label><input type="number" name="sort_order" value="{{ old('sort_order', $gallery->sort_order ?: 0) }}" required min="0" class="mt-2 w-full rounded-xl border-slate-200"></div></div>
        <label class="mt-5 block font-bold">Upload Gambar</label><input type="file" name="image" accept="image/*" class="mt-2 w-full rounded-xl border border-slate-200 p-2">
        <label class="mt-5 block font-bold">Atau path gambar</label><input name="image_path" value="{{ old('image_path', $gallery->image_path) }}" placeholder="/images/galeri/1.jpg" class="mt-2 w-full rounded-xl border-slate-200">
        <label class="mt-5 flex items-center gap-2 font-bold"><input type="checkbox" name="is_active" value="1" @checked(old('is_active', $gallery->is_active ?? true)) class="rounded text-primary"> Aktif</label>
        <button class="mt-6 rounded-xl bg-primary px-5 py-3 font-bold text-white">Simpan Galeri</button>
    </form>
@endsection
