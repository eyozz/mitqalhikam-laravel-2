@extends('admin.layout')
@section('title', $link->exists ? 'Edit Footer Link' : 'Tambah Footer Link')
@section('content')
    <form method="POST" action="{{ $link->exists ? route('admin.footer-links.update', $link) : route('admin.footer-links.store') }}" class="max-w-3xl rounded-3xl bg-white p-6 shadow-sm">
        @csrf @if ($link->exists) @method('PUT') @endif
        <label class="font-bold">Label</label><input name="label" value="{{ old('label', $link->label) }}" required class="mt-2 w-full rounded-xl border-slate-200">
        <label class="mt-5 block font-bold">URL</label><input name="url" value="{{ old('url', $link->url) }}" required class="mt-2 w-full rounded-xl border-slate-200">
        <div class="mt-5 grid gap-5 md:grid-cols-3">
            <div>
                <label class="font-bold">Group</label>
                <select name="group" required class="mt-2 w-full rounded-xl border-slate-200">
                    @foreach (['quick_links' => 'Navigasi Footer', 'social' => 'Social Media'] as $value => $label)
                        <option value="{{ $value }}" @selected(old('group', $link->group ?: 'quick_links') === $value)>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="font-bold">Icon</label>
                <select name="icon" class="mt-2 w-full rounded-xl border-slate-200">
                    <option value="">Tidak pakai icon</option>
                    @foreach (['instagram' => 'Instagram', 'facebook' => 'Facebook', 'tiktok' => 'TikTok', 'youtube' => 'YouTube'] as $value => $label)
                        <option value="{{ $value }}" @selected(old('icon', $link->icon) === $value)>{{ $label }}</option>
                    @endforeach
                </select>
                <p class="mt-2 text-xs text-slate-500">Untuk icon footer sosial, gunakan group Social Media.</p>
            </div>
            <div>
                <label class="font-bold">Urutan</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $link->sort_order ?: 0) }}" required min="0" class="mt-2 w-full rounded-xl border-slate-200">
            </div>
        </div>
        <label class="mt-5 flex items-center gap-2 font-bold"><input type="checkbox" name="is_active" value="1" @checked(old('is_active', $link->is_active ?? true)) class="rounded text-primary"> Aktif</label>
        <button class="mt-6 rounded-xl bg-primary px-5 py-3 font-bold text-white">Simpan Link</button>
    </form>
@endsection
