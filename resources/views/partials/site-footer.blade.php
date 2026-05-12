<footer class="w-full border-t border-[#bec9c1]/50 bg-[#dce2f3] px-6 py-20">
    <div class="mx-auto grid max-w-[1200px] grid-cols-1 gap-8 md:grid-cols-3">
        <div class="flex flex-col gap-3">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <x-responsive-image src="{{ $cmsSettings['site_logo'] ?? asset('images/logo.jpg') }}" alt="Logo {{ $cmsSettings['site_name'] ?? 'MITQ Al-Hikam' }}" class="h-14 w-14 rounded-2xl border border-white/70 bg-white object-cover shadow-sm" width="56" height="56" sizes="56px" />
                <div class="font-serif text-3xl font-semibold text-[#004d34]">{{ $cmsSettings['site_name'] ?? 'MITQ Al-Hikam' }}</div>
            </a>
            <p class="text-base leading-7 text-[#3f4943]">{{ $cmsSettings['footer_description'] ?? 'Lembaga pendidikan tahfizh dasar yang berfokus pada Al-Quran, adab, dan pembinaan karakter santri.' }}</p>
            <div class="mt-4 flex gap-3">
                @forelse (($footerLinks['social'] ?? collect()) as $socialLink)
                    <a class="flex h-10 w-10 items-center justify-center rounded-full border border-[#6f7a72] text-[#004d34] transition hover:bg-[#004d34] hover:text-white" href="{{ $socialLink->url }}" target="_blank" rel="noopener" aria-label="{{ $socialLink->label }}">
                        @switch($socialLink->icon)
                            @case('facebook')
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M14 8.5h2.5V5.2A22.8 22.8 0 0 0 13.1 5c-3.4 0-5.7 2-5.7 5.7V14H4v3.7h3.4V23h4.2v-5.3H15l.6-3.7h-4v-3c0-1.1.3-2.5 2.4-2.5Z"/></svg>
                                @break
                            @case('tiktok')
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M16.7 2c.3 2.6 1.8 4.2 4.3 4.4v3.7a7.8 7.8 0 0 1-4.3-1.3v6.8c0 8.7-9.5 11.4-13.3 5.2-2.5-4-.9-11.1 7-11.4v3.9c-.8.1-1.7.3-2.4.8-2.3 1.5-1.9 5.8.7 6.7 2.7 1 4.5-1 4.5-4V2h3.5Z"/></svg>
                                @break
                            @case('youtube')
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M21.6 7.2s-.2-1.5-.8-2.1c-.8-.8-1.6-.8-2-1C16 3.9 12 3.9 12 3.9s-4 0-6.8.2c-.4.1-1.3.1-2 .9-.6.7-.8 2.2-.8 2.2S2 9 2 10.9v1.8c0 1.9.4 3.7.4 3.7s.2 1.5.8 2.1c.8.8 1.8.8 2.3.9 1.7.2 6.5.2 6.5.2s4 0 6.8-.2c.4-.1 1.3-.1 2-.9.6-.6.8-2.1.8-2.1s.4-1.9.4-3.7v-1.8c0-1.9-.4-3.7-.4-3.7ZM10 14.7V8.4l5.8 3.2L10 14.7Z"/></svg>
                                @break
                            @default
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M7.8 2h8.4A5.8 5.8 0 0 1 22 7.8v8.4a5.8 5.8 0 0 1-5.8 5.8H7.8A5.8 5.8 0 0 1 2 16.2V7.8A5.8 5.8 0 0 1 7.8 2Zm-.2 2A3.6 3.6 0 0 0 4 7.6v8.8A3.6 3.6 0 0 0 7.6 20h8.8a3.6 3.6 0 0 0 3.6-3.6V7.6A3.6 3.6 0 0 0 16.4 4H7.6Zm9.7 1.5a1.3 1.3 0 1 1 0 2.6 1.3 1.3 0 0 1 0-2.6ZM12 7a5 5 0 1 1 0 10 5 5 0 0 1 0-10Zm0 2a3 3 0 1 0 0 6 3 3 0 0 0 0-6Z"/></svg>
                        @endswitch
                    </a>
                @empty
                    @foreach (['instagram', 'facebook', 'tiktok', 'youtube'] as $fallbackIcon)
                        <a class="flex h-10 w-10 items-center justify-center rounded-full border border-[#6f7a72] text-[#004d34] transition hover:bg-[#004d34] hover:text-white" href="#" aria-label="{{ ucfirst($fallbackIcon) }}"><span class="text-xs font-bold">{{ strtoupper(substr($fallbackIcon, 0, 2)) }}</span></a>
                    @endforeach
                @endforelse
            </div>
        </div>
        <div class="flex flex-col gap-3">
            <h4 class="text-xs font-bold uppercase tracking-[0.1em] text-[#004d34]">Navigasi</h4>
            @forelse (($footerLinks['quick_links'] ?? collect()) as $footerLink)
                <a class="text-base text-[#3f4943] transition hover:translate-x-1 hover:text-[#004d34]" href="{{ $footerLink->url }}">{{ $footerLink->label }}</a>
            @empty
                <a class="text-base text-[#3f4943] transition hover:translate-x-1 hover:text-[#004d34]" href="{{ route('home') }}">Beranda</a>
                <a class="text-base text-[#3f4943] transition hover:translate-x-1 hover:text-[#004d34]" href="{{ route('program') }}">Program</a>
                <a class="text-base text-[#3f4943] transition hover:translate-x-1 hover:text-[#004d34]" href="{{ route('news.index') }}">News</a>
            @endforelse
        </div>
        <div class="flex flex-col gap-3">
            <h4 class="text-xs font-bold uppercase tracking-[0.1em] text-[#004d34]">Kontak</h4>
            <p class="text-base leading-7 text-[#3f4943]">{{ $cmsSettings['footer_address'] ?? 'Surakarta, Jawa Tengah' }}</p>
            <p class="text-base text-[#3f4943]">{{ $cmsSettings['footer_phone'] ?? '+62 812-0000-0000' }}</p>
            <p class="text-base text-[#3f4943]">{{ $cmsSettings['footer_email'] ?? 'info@mitqalhikam.sch.id' }}</p>
            <p class="mt-4 text-base text-[#3f4943]">© {{ date('Y') }} {{ $cmsSettings['site_name'] ?? 'MITQ Al-Hikam' }}. All Rights Reserved.</p>
        </div>
    </div>
</footer>
