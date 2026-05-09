@extends('admin.layout')
@section('title', 'Identitas Website & Link')
@section('content')
    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.settings.update') }}" class="space-y-6">
        @csrf @method('PUT')
        @foreach ($settings as $group => $items)
            <section class="rounded-3xl bg-white p-6 shadow-sm">
                <h3 class="mb-5 text-lg font-extrabold capitalize text-primary">{{ str_replace('_', ' ', $group) }}</h3>
                <div class="grid gap-5 md:grid-cols-2">
                    @foreach ($items as $setting)
                        <div class="{{ $setting->type === 'textarea' ? 'md:col-span-2' : '' }}">
                            <label class="font-bold">{{ str($setting->key)->replace('_', ' ')->title() }}</label>
                            @if ($setting->type === 'textarea')
                                <textarea name="settings[{{ $setting->key }}]" rows="4" class="mt-2 w-full rounded-xl border-slate-200">{{ old('settings.'.$setting->key, $setting->value) }}</textarea>
                            @else
                                <input name="settings[{{ $setting->key }}]" value="{{ old('settings.'.$setting->key, $setting->value) }}" class="mt-2 w-full rounded-xl border-slate-200">
                            @endif
                            @if ($setting->type === 'image' && $setting->value)
                                <img src="{{ $setting->value }}" class="mt-3 h-20 w-20 rounded-xl object-cover">
                            @endif
                        </div>
                    @endforeach
                </div>
            </section>
        @endforeach
        <section class="rounded-3xl bg-white p-6 shadow-sm">
            <h3 class="text-lg font-extrabold text-primary">Upload Logo Baru</h3>
            <input type="file" name="site_logo_upload" accept="image/*" class="mt-4 w-full rounded-xl border border-slate-200 p-3">
        </section>
        <button class="rounded-xl bg-primary px-6 py-3 font-bold text-white">Simpan Pengaturan</button>
    </form>
@endsection
