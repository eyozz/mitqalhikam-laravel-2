<footer class="w-full border-t border-[#bec9c1]/50 bg-[#dce2f3] px-6 py-20">
    <div class="mx-auto grid max-w-[1200px] grid-cols-1 gap-8 md:grid-cols-3">
        <div class="flex flex-col gap-3">
            <div class="font-serif text-3xl font-semibold text-[#004d34]">{{ $cmsSettings['site_name'] ?? 'MITQ Al-Hikam' }}</div>
            <p class="text-base leading-7 text-[#3f4943]">{{ $cmsSettings['footer_description'] ?? 'Lembaga pendidikan tahfizh dasar yang berfokus pada Al-Quran, adab, dan pembinaan karakter santri.' }}</p>
            <div class="mt-4 flex gap-3">
                @forelse (($footerLinks['social'] ?? collect()) as $socialLink)
                    <a class="flex h-10 w-10 items-center justify-center rounded-full border border-[#6f7a72] text-[#004d34] transition hover:bg-[#004d34] hover:text-white" href="{{ $socialLink->url }}" target="_blank" rel="noopener" aria-label="{{ $socialLink->label }}">
                        <span class="material-symbols-outlined text-base">{{ $socialLink->icon === 'youtube' ? 'play_circle' : ($socialLink->icon === 'facebook' ? 'public' : 'photo_camera') }}</span>
                    </a>
                @empty
                    <a class="flex h-10 w-10 items-center justify-center rounded-full border border-[#6f7a72] text-[#004d34] transition hover:bg-[#004d34] hover:text-white" href="#" aria-label="Instagram"><span class="material-symbols-outlined text-base">photo_camera</span></a>
                    <a class="flex h-10 w-10 items-center justify-center rounded-full border border-[#6f7a72] text-[#004d34] transition hover:bg-[#004d34] hover:text-white" href="#" aria-label="Facebook"><span class="material-symbols-outlined text-base">public</span></a>
                    <a class="flex h-10 w-10 items-center justify-center rounded-full border border-[#6f7a72] text-[#004d34] transition hover:bg-[#004d34] hover:text-white" href="#" aria-label="YouTube"><span class="material-symbols-outlined text-base">play_circle</span></a>
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
