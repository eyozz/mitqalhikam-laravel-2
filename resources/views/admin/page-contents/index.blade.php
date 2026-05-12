@extends('admin.layout')
@section('title', 'Konten Halaman')
@section('content')
    <div class="mb-6 flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
        <div>
            <p class="text-slate-600">Edit teks hero, section, konten tiap halaman, dan profil pimpinan.</p>
            <div class="mt-3 flex flex-wrap gap-2 text-sm font-bold">
                <a href="{{ route('admin.page-contents.index', ['page' => 'about', 'section' => 'leadership']) }}" class="rounded-full bg-emerald-50 px-4 py-2 text-primary">Leadership About</a>
                <a href="{{ route('admin.page-contents.index') }}" class="rounded-full bg-slate-100 px-4 py-2 text-slate-600">Semua Konten</a>
            </div>
        </div>
        <a href="{{ route('admin.page-contents.create') }}" class="rounded-xl bg-primary px-5 py-3 text-center text-sm font-bold text-white">Tambah Konten</a>
    </div>

    <form method="GET" class="mb-5 grid gap-3 rounded-3xl bg-white p-4 shadow-sm md:grid-cols-[1fr_1fr_2fr_auto]">
        <input name="page" value="{{ request('page') }}" placeholder="Filter page, contoh: about" class="rounded-xl border-slate-200">
        <input name="section" value="{{ request('section') }}" placeholder="Filter section, contoh: leadership" class="rounded-xl border-slate-200">
        <input name="search" value="{{ request('search') }}" placeholder="Cari field/value" class="rounded-xl border-slate-200">
        <button class="rounded-xl bg-primary px-5 py-3 text-sm font-bold text-white">Filter</button>
    </form>

    @if (request('page') === 'about' && request('section') === 'leadership')
        <div class="mb-5 rounded-3xl border border-emerald-100 bg-emerald-50 p-5 text-sm text-slate-700">
            <p class="font-bold text-primary">Field profil pimpinan yang bisa diedit:</p>
            <p class="mt-2 leading-7"><code>pembina_name</code>, <code>pembina_photo</code>, <code>pengawas_name</code>, <code>pengawas_photo</code>, <code>ketua_yayasan_name</code>, <code>ketua_yayasan_photo</code>, <code>kepala_sekolah_name</code>, <code>kepala_sekolah_photo</code>.</p>
            <p class="mt-2">Untuk foto, edit field bertipe image lalu isi URL/path manual di Value atau upload lewat Upload Gambar.</p>
        </div>
    @endif

    <div class="overflow-hidden rounded-3xl bg-white shadow-sm">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-50 text-xs uppercase tracking-[0.12em] text-slate-500">
                <tr><th class="p-4">Page</th><th>Section</th><th>Field</th><th>Value</th><th class="text-right pr-4">Aksi</th></tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($contents as $content)
                    <tr>
                        <td class="p-4 font-bold text-primary">{{ $content->page }}</td>
                        <td>{{ $content->section }}</td>
                        <td>{{ $content->field }}</td>
                        <td class="max-w-md truncate text-slate-500">
                            @if ($content->type === 'image' && $content->value)
                                <div class="flex items-center gap-3"><x-responsive-image src="{{ $content->value }}" alt="{{ $content->field }}" class="h-12 w-12 rounded-xl object-cover" width="48" height="48" sizes="48px" /><span class="truncate">{{ $content->value }}</span></div>
                            @else
                                {{ $content->value }}
                            @endif
                        </td>
                        <td class="pr-4 text-right">
                            <a href="{{ route('admin.page-contents.edit', $content) }}" class="font-bold text-primary">Edit</a>
                            <form method="POST" action="{{ route('admin.page-contents.destroy', $content) }}" class="inline" onsubmit="return confirm('Hapus konten ini?')">@csrf @method('DELETE')<button class="ml-3 font-bold text-red-600">Hapus</button></form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="p-6 text-center text-slate-500">Belum ada konten yang cocok dengan filter.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-6">{{ $contents->links() }}</div>
@endsection
