<style>
    html { scroll-behavior: smooth; }
    .mobile-menu-panel {
        max-height: 0;
        opacity: 0;
        overflow: hidden;
        transform: translateY(-8px);
        transition: max-height .32s ease, opacity .24s ease, transform .24s ease;
    }
    .mobile-menu-panel.is-open {
        max-height: 520px;
        opacity: 1;
        transform: translateY(0);
    }
    .floating-ppdb { bottom: max(1rem, env(safe-area-inset-bottom)); right: 1rem; }
    .floating-chat { bottom: calc(max(1rem, env(safe-area-inset-bottom)) + 4.25rem); right: 1rem; }
    @media (max-width: 767px) {
        .text-h1, .font-h1.text-h1, h1 { font-size: 40px !important; line-height: 1.15 !important; }
        .text-h2, .font-h2.text-h2, h2 { font-size: 32px !important; line-height: 1.22 !important; }
        .home-hero-section { padding-bottom: 50px !important; min-height: auto !important; padding-top: 40px !important; }
        .floating-ppdb { bottom: max(1rem, env(safe-area-inset-bottom)); right: .875rem; }
        .floating-chat { bottom: calc(max(1rem, env(safe-area-inset-bottom)) + 4rem); right: .875rem; }
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('[data-mobile-menu-button]').forEach((button) => {
            const header = button.closest('header, nav');
            const panel = header?.querySelector('[data-mobile-menu]');
            if (!panel) return;
            button.addEventListener('click', () => {
                const isOpen = panel.classList.toggle('is-open');
                button.setAttribute('aria-expanded', String(isOpen));
                const icon = button.querySelector('.material-symbols-outlined');
                if (icon) icon.textContent = isOpen ? 'close' : 'menu';
            });
        });

        document.querySelectorAll('[data-mobile-menu] a').forEach((link) => {
            link.addEventListener('click', () => {
                const panel = link.closest('[data-mobile-menu]');
                const header = panel?.closest('header, nav');
                const button = header?.querySelector('[data-mobile-menu-button]');
                panel?.classList.remove('is-open');
                button?.setAttribute('aria-expanded', 'false');
                const icon = button?.querySelector('.material-symbols-outlined');
                if (icon) icon.textContent = 'menu';
            });
        });
    });
</script>
