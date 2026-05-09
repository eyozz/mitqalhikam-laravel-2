@extends('admin.layout')
@section('title', $content->exists ? 'Edit Konten Halaman' : 'Tambah Konten Halaman')
@section('content')
    <form method="POST" action="{{ $content->exists ? route('admin.page-contents.update', $content) : route('admin.page-contents.store') }}" class="max-w-4xl rounded-3xl bg-white p-6 shadow-sm">
        @csrf @if ($content->exists) @method('PUT') @endif
        <div class="grid gap-5 md:grid-cols-3"><div><label class="font-bold">Page</label><input name="page" value="{{ old('page', $content->page) }}" required placeholder="home" class="mt-2 w-full rounded-xl border-slate-200"></div><div><label class="font-bold">Section</label><input name="section" value="{{ old('section', $content->section) }}" required placeholder="hero" class="mt-2 w-full rounded-xl border-slate-200"></div><div><label class="font-bold">Field</label><input name="field" value="{{ old('field', $content->field) }}" required placeholder="title" class="mt-2 w-full rounded-xl border-slate-200"></div></div>
        <label class="mt-5 block font-bold">Tipe</label><select name="type" class="mt-2 w-full rounded-xl border-slate-200"><option value="text" @selected(old('type', $content->type ?: 'text') === 'text')>Text</option><option value="textarea" @selected(old('type', $content->type) === 'textarea')>Textarea</option><option value="html" @selected(old('type', $content->type) === 'html')>HTML</option><option value="image" @selected(old('type', $content->type) === 'image')>Image Path</option></select>
        <label class="mt-5 block font-bold">Value</label><textarea name="value" rows="8" class="mt-2 w-full rounded-xl border-slate-200">{{ old('value', $content->value) }}</textarea>
        <button class="mt-6 rounded-xl bg-primary px-5 py-3 font-bold text-white">Simpan Konten</button>
    </form>
@endsection
