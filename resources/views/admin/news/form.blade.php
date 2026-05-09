@extends('admin.layout')
@section('title', $post->exists ? 'Edit Berita' : 'Tambah Berita')
@section('content')
    <form method="POST" enctype="multipart/form-data" action="{{ $post->exists ? route('admin.news.update', $post) : route('admin.news.store') }}" class="grid gap-6 xl:grid-cols-[1fr_360px]">
        @csrf
        @if ($post->exists) @method('PUT') @endif
        <div class="rounded-3xl bg-white p-6 shadow-sm">
            <label class="font-bold">Judul</label>
            <input name="title" value="{{ old('title', $post->title) }}" required class="mt-2 w-full rounded-xl border-slate-200">
            <label class="mt-5 block font-bold">Slug</label>
            <input name="slug" value="{{ old('slug', $post->slug) }}" placeholder="otomatis dari judul jika kosong" class="mt-2 w-full rounded-xl border-slate-200">
            <label class="mt-5 block font-bold">Ringkasan</label>
            <textarea name="excerpt" required rows="3" class="mt-2 w-full rounded-xl border-slate-200">{{ old('excerpt', $post->excerpt) }}</textarea>
            <label class="mt-5 block font-bold">Konten</label>
            <textarea name="content" required rows="12" class="prose mt-2 w-full rounded-xl border-slate-200">{{ old('content', $post->content) }}</textarea>
        </div>
        <div class="space-y-6">
            <div class="rounded-3xl bg-white p-6 shadow-sm">
                <label class="font-bold">Kategori</label>
                <input name="category" value="{{ old('category', $post->category ?: 'Kegiatan') }}" required class="mt-2 w-full rounded-xl border-slate-200">
                <label class="mt-5 block font-bold">Status</label>
                <select name="status" class="mt-2 w-full rounded-xl border-slate-200"><option value="published" @selected(old('status', $post->status ?: 'published') === 'published')>Published</option><option value="draft" @selected(old('status', $post->status) === 'draft')>Draft</option></select>
                <label class="mt-5 block font-bold">Tanggal Publish</label>
                <input type="datetime-local" name="published_at" value="{{ old('published_at', $post->published_at?->format('Y-m-d\TH:i')) }}" class="mt-2 w-full rounded-xl border-slate-200">
                <label class="mt-5 flex items-center gap-2 font-bold"><input type="checkbox" name="is_featured" value="1" @checked(old('is_featured', $post->is_featured)) class="rounded text-primary"> Featured</label>
            </div>
            <div class="rounded-3xl bg-white p-6 shadow-sm">
                @if ($post->display_image)<img src="{{ $post->display_image }}" class="mb-4 h-40 w-full rounded-2xl object-cover">@endif
                <label class="font-bold">Upload Thumbnail</label>
                <input type="file" name="thumbnail" accept="image/*" class="mt-2 w-full rounded-xl border border-slate-200 p-2">
                <label class="mt-5 block font-bold">Atau URL/path gambar</label>
                <input name="image_url" value="{{ old('image_url', $post->image_url) }}" class="mt-2 w-full rounded-xl border-slate-200">
                <button class="mt-6 w-full rounded-xl bg-primary px-5 py-3 font-bold text-white">Simpan Berita</button>
            </div>
        </div>
    </form>
@endsection
