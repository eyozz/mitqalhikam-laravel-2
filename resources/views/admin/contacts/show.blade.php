@extends('admin.layout')
@section('title', 'Detail Pesan Kontak')
@section('content')
    <article class="max-w-3xl rounded-3xl bg-white p-6 shadow-sm">
        <p class="text-xs font-bold uppercase tracking-[0.15em] text-gold">{{ $contact->created_at->format('d M Y H:i') }}</p>
        <h3 class="mt-2 text-2xl font-extrabold text-primary">{{ $contact->subject }}</h3>
        <div class="mt-5 grid gap-4 rounded-2xl bg-slate-50 p-5 md:grid-cols-2"><p><span class="font-bold">Nama:</span> {{ $contact->name }}</p><p><span class="font-bold">Email:</span> {{ $contact->email }}</p></div>
        <div class="prose mt-6 max-w-none"><p>{{ $contact->message }}</p></div>
        <a href="{{ route('admin.contacts.index') }}" class="mt-6 inline-block rounded-xl border border-slate-200 px-5 py-3 font-bold text-primary">Kembali</a>
    </article>
@endsection
