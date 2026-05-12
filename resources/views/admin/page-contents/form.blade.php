@extends('admin.layout')
@section('title', $content->exists ? 'Edit Konten Halaman' : 'Tambah Konten Halaman')
@section('content')
    <form method="POST" enctype="multipart/form-data" action="{{ $content->exists ? route('admin.page-contents.update', $content) : route('admin.page-contents.store') }}" class="max-w-4xl rounded-3xl bg-white p-6 shadow-sm">
        @csrf @if ($content->exists) @method('PUT') @endif
        <div class="grid gap-5 md:grid-cols-3"><div><label class="font-bold">Page</label><input name="page" value="{{ old('page', $content->page) }}" required placeholder="home" class="mt-2 w-full rounded-xl border-slate-200"></div><div><label class="font-bold">Section</label><input name="section" value="{{ old('section', $content->section) }}" required placeholder="hero" class="mt-2 w-full rounded-xl border-slate-200"></div><div><label class="font-bold">Field</label><input name="field" value="{{ old('field', $content->field) }}" required placeholder="title" class="mt-2 w-full rounded-xl border-slate-200"></div></div>
        <label class="mt-5 block font-bold">Tipe</label><select name="type" class="mt-2 w-full rounded-xl border-slate-200"><option value="text" @selected(old('type', $content->type ?: 'text') === 'text')>Text</option><option value="textarea" @selected(old('type', $content->type) === 'textarea')>Textarea</option><option value="html" @selected(old('type', $content->type) === 'html')>HTML</option><option value="image" @selected(old('type', $content->type) === 'image')>Image Path</option></select>
        <label class="mt-5 block font-bold">Value</label><textarea name="value" rows="8" class="mt-2 w-full rounded-xl border-slate-200">{{ old('value', $content->value) }}</textarea>
        <label class="mt-5 block font-bold">Upload Gambar</label>
        <input type="file" name="image_file" accept="image/*" class="mt-2 w-full rounded-xl border border-slate-200 p-3 text-sm">
        <p class="mt-2 text-sm text-slate-500">Opsional. Untuk tipe image, upload ini akan menggantikan value dengan path gambar di storage.</p>
        @if ($content->type === 'image' && $content->value)
            <div class="mt-4">
                <p class="mb-2 text-sm font-bold text-slate-600">Preview saat ini</p>
                <x-responsive-image src="{{ $content->value }}" alt="Preview {{ $content->field }}" class="h-32 w-32 rounded-2xl border border-slate-200 object-cover" width="128" height="128" sizes="128px" />
            </div>
        @endif
        <button class="mt-6 rounded-xl bg-primary px-5 py-3 font-bold text-white">Simpan Konten</button>
    </form>
@endsection
