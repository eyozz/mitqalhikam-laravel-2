<div data-mobile-menu class="mobile-menu-panel absolute left-0 right-0 top-full border-t border-[#bec9c1]/40 bg-white/95 px-6 py-4 shadow-xl backdrop-blur md:hidden">
    <div class="flex flex-col gap-3 text-sm font-semibold uppercase tracking-[0.1em]">
        <a class="rounded-xl px-3 py-2 text-[#004d34] hover:bg-[#004d34]/10" href="{{ route('home') }}">Beranda</a>
        <a class="rounded-xl px-3 py-2 text-[#3f4943] hover:bg-[#004d34]/10 hover:text-[#004d34]" href="{{ route('about') }}">Tentang Kami</a>
        <a class="rounded-xl px-3 py-2 text-[#3f4943] hover:bg-[#004d34]/10 hover:text-[#004d34]" href="{{ route('program') }}">Program</a>
        <a class="rounded-xl px-3 py-2 text-[#3f4943] hover:bg-[#004d34]/10 hover:text-[#004d34]" href="{{ route('news.index') }}">Berita</a>
        <a class="rounded-xl px-3 py-2 text-[#3f4943] hover:bg-[#004d34]/10 hover:text-[#004d34]" href="{{ route('contact') }}">Hubungi Kami</a>
        <a class="mt-2 rounded-xl bg-[#004d34] px-4 py-3 text-center text-white" href="{{ $cmsSettings['registration_url'] ?? config('services.ppdb_url', '#') }}" target="_blank" rel="noopener">Daftar Sekarang</a>
    </div>
</div>
