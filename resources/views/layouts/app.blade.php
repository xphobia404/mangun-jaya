<!DOCTYPE html>
<html lang="id" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mangun Jaya Plafon') - Solusi Plafon & Interior Terbaik</title>
    <meta name="description" content="@yield('meta_desc', 'Mangun Jaya menyediakan plafon gypsum, PVC, GRC berkualitas tinggi dengan pemasangan profesional di seluruh wilayah.')">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300..800&family=Fraunces:ital,opsz,wght@0,9..144,300..900;1,9..144,300..900&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
    <style>
        /* ===== DESIGN TOKENS ===== */
        :root, [data-theme="light"] {
            --color-bg: #f8f7f3;
            --color-surface: #faf9f6;
            --color-surface-2: #ffffff;
            --color-surface-offset: #f0ede6;
            --color-border: #e0dbd0;
            --color-divider: #ede9e2;
            --color-text: #1a1710;
            --color-text-muted: #6b6860;
            --color-text-faint: #b0ae9f;
            --color-text-inverse: #faf9f6;
            --color-primary: #b85c00;
            --color-primary-hover: #963d00;
            --color-primary-active: #6e2900;
            --color-primary-light: #fef3e8;
            --color-secondary: #2d5016;
            --color-secondary-hover: #1e3a0e;
            --color-accent-gold: #d4940a;
            --font-display: 'Fraunces', Georgia, serif;
            --font-body: 'Plus Jakarta Sans', system-ui, sans-serif;
            --text-xs: clamp(0.75rem, 0.7rem + 0.25vw, 0.875rem);
            --text-sm: clamp(0.875rem, 0.8rem + 0.35vw, 1rem);
            --text-base: clamp(1rem, 0.95rem + 0.25vw, 1.125rem);
            --text-lg: clamp(1.125rem, 1rem + 0.75vw, 1.5rem);
            --text-xl: clamp(1.5rem, 1.2rem + 1.25vw, 2.25rem);
            --text-2xl: clamp(2rem, 1.2rem + 2.5vw, 3.5rem);
            --text-hero: clamp(2.75rem, 1rem + 5.5vw, 5.5rem);
            --space-1: 0.25rem;
            --space-2: 0.5rem;
            --space-3: 0.75rem;
            --space-4: 1rem;
            --space-5: 1.25rem;
            --space-6: 1.5rem;
            --space-8: 2rem;
            --space-10: 2.5rem;
            --space-12: 3rem;
            --space-16: 4rem;
            --space-20: 5rem;
            --space-24: 6rem;
            --radius-sm: 0.375rem;
            --radius-md: 0.5rem;
            --radius-lg: 0.75rem;
            --radius-xl: 1rem;
            --radius-full: 9999px;
            --shadow-sm: 0 1px 3px oklch(0.15 0.02 60 / 0.07);
            --shadow-md: 0 4px 16px oklch(0.15 0.02 60 / 0.10);
            --shadow-lg: 0 12px 40px oklch(0.15 0.02 60 / 0.14);
            --transition: 180ms cubic-bezier(0.16, 1, 0.3, 1);
            --content-default: 1100px;
            --content-wide: 1280px;
        }
        [data-theme="dark"] {
            --color-bg: #131210;
            --color-surface: #1a1915;
            --color-surface-2: #201e1a;
            --color-surface-offset: #171512;
            --color-border: #2e2c26;
            --color-divider: #252320;
            --color-text: #e8e6df;
            --color-text-muted: #847f76;
            --color-text-faint: #504e48;
            --color-text-inverse: #131210;
            --color-primary: #f08030;
            --color-primary-hover: #f59040;
            --color-primary-active: #fba050;
            --color-primary-light: #2d1a08;
            --color-secondary: #7db84a;
            --color-secondary-hover: #96c960;
            --color-accent-gold: #f0b830;
            --shadow-sm: 0 1px 3px oklch(0 0 0 / 0.25);
            --shadow-md: 0 4px 16px oklch(0 0 0 / 0.35);
            --shadow-lg: 0 12px 40px oklch(0 0 0 / 0.5);
        }

        /* ===== BASE ===== */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; scroll-padding-top: 80px; -webkit-font-smoothing: antialiased; }
        body { font-family: var(--font-body); font-size: var(--text-base); color: var(--color-text); background: var(--color-bg); line-height: 1.65; min-height: 100dvh; }
        img { display: block; max-width: 100%; height: auto; }
        ul[role="list"] { list-style: none; }
        h1,h2,h3,h4,h5 { font-family: var(--font-display); line-height: 1.2; text-wrap: balance; }
        p { text-wrap: pretty; max-width: 68ch; }
        a { color: inherit; text-decoration: none; }
        button { cursor: pointer; background: none; border: none; font: inherit; color: inherit; }
        ::selection { background: oklch(from var(--color-primary) l c h / 0.2); }
        :focus-visible { outline: 2px solid var(--color-primary); outline-offset: 3px; border-radius: var(--radius-sm); }
        @media (prefers-reduced-motion: reduce) { *, *::before, *::after { animation-duration: 0.01ms !important; transition-duration: 0.01ms !important; } }

        /* ===== LAYOUT ===== */
        .container { max-width: var(--content-default); margin-inline: auto; padding-inline: clamp(var(--space-4), 4vw, var(--space-12)); }
        .container--wide { max-width: var(--content-wide); margin-inline: auto; padding-inline: clamp(var(--space-4), 4vw, var(--space-12)); }
        .section { padding-block: clamp(var(--space-12), 8vw, var(--space-24)); }
        .section--alt { background: var(--color-surface); }
        .section--dark { background: var(--color-text); color: var(--color-text-inverse); }

        /* ===== BUTTONS ===== */
        .btn { display: inline-flex; align-items: center; gap: var(--space-2); padding: 0.75rem 1.5rem; border-radius: var(--radius-md); font-size: var(--text-sm); font-weight: 600; font-family: var(--font-body); transition: background var(--transition), color var(--transition), box-shadow var(--transition), transform var(--transition); white-space: nowrap; }
        .btn:hover { transform: translateY(-1px); }
        .btn:active { transform: translateY(0); }
        .btn--primary { background: var(--color-primary); color: #fff; }
        .btn--primary:hover { background: var(--color-primary-hover); box-shadow: var(--shadow-md); }
        .btn--outline { border: 1.5px solid var(--color-primary); color: var(--color-primary); }
        .btn--outline:hover { background: var(--color-primary-light); }
        .btn--ghost { color: var(--color-text-muted); }
        .btn--ghost:hover { color: var(--color-text); background: var(--color-surface-offset); }
        .btn--white { background: #fff; color: var(--color-primary); }
        .btn--white:hover { background: var(--color-primary-light); box-shadow: var(--shadow-md); }
        .btn--lg { padding: 1rem 2rem; font-size: var(--text-base); }

        /* ===== BADGE ===== */
        .badge { display: inline-flex; align-items: center; gap: var(--space-1); padding: 0.3rem 0.75rem; border-radius: var(--radius-full); font-size: var(--text-xs); font-weight: 600; font-family: var(--font-body); letter-spacing: 0.04em; text-transform: uppercase; }
        .badge--primary { background: var(--color-primary-light); color: var(--color-primary); }
        .badge--gold { background: #fef9e8; color: #8a6000; }
        [data-theme="dark"] .badge--gold { background: #2a2000; color: var(--color-accent-gold); }

        /* ===== NAVBAR ===== */
        .navbar { position: fixed; top: 0; left: 0; right: 0; z-index: 100; background: oklch(from var(--color-bg) l c h / 0.92); backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px); border-bottom: 1px solid var(--color-border); transition: box-shadow var(--transition); }
        .navbar.scrolled { box-shadow: var(--shadow-md); }
        .navbar__inner { display: flex; align-items: center; gap: var(--space-8); height: 68px; }
        .navbar__logo { display: flex; align-items: center; gap: var(--space-3); flex-shrink: 0; }
        .navbar__logo-icon { width: 40px; height: 40px; }
        .navbar__logo-text { display: flex; flex-direction: column; line-height: 1.1; }
        .navbar__logo-name { font-family: var(--font-display); font-size: 1.1rem; font-weight: 700; color: var(--color-primary); }
        .navbar__logo-sub { font-size: var(--text-xs); color: var(--color-text-muted); font-weight: 500; }
        .navbar__nav { display: flex; align-items: center; gap: var(--space-1); margin-left: auto; }
        .navbar__link { padding: var(--space-2) var(--space-3); border-radius: var(--radius-md); font-size: var(--text-sm); font-weight: 500; color: var(--color-text-muted); transition: color var(--transition), background var(--transition); }
        .navbar__link:hover, .navbar__link.active { color: var(--color-text); background: var(--color-surface-offset); }
        .navbar__link.active { color: var(--color-primary); font-weight: 600; }
        .navbar__actions { display: flex; align-items: center; gap: var(--space-2); margin-left: var(--space-4); }
        .navbar__toggle { display: none; padding: var(--space-2); border-radius: var(--radius-md); color: var(--color-text-muted); }
        .navbar__toggle:hover { background: var(--color-surface-offset); color: var(--color-text); }
        .mobile-nav { display: none; position: fixed; inset: 0; top: 68px; background: var(--color-bg); z-index: 99; padding: var(--space-6) var(--space-4); flex-direction: column; gap: var(--space-2); overflow-y: auto; }
        .mobile-nav.open { display: flex; }
        .mobile-nav__link { padding: var(--space-3) var(--space-4); border-radius: var(--radius-md); font-size: var(--text-base); font-weight: 500; color: var(--color-text-muted); transition: color var(--transition), background var(--transition); }
        .mobile-nav__link:hover, .mobile-nav__link.active { color: var(--color-primary); background: var(--color-primary-light); }
        .mobile-nav__cta { margin-top: var(--space-4); }
        @media (max-width: 768px) { .navbar__nav, .navbar__actions { display: none; } .navbar__toggle { display: flex; align-items: center; justify-content: center; margin-left: auto; } }

        /* ===== WHATSAPP FLOAT ===== */
        .wa-float { position: fixed; bottom: var(--space-6); right: var(--space-6); z-index: 90; display: flex; align-items: center; gap: var(--space-2); background: #25d366; color: #fff; padding: var(--space-3) var(--space-4); border-radius: var(--radius-full); font-size: var(--text-sm); font-weight: 600; box-shadow: 0 4px 20px oklch(0.4 0.18 145 / 0.45); transition: transform var(--transition), box-shadow var(--transition); text-decoration: none; }
        .wa-float:hover { transform: translateY(-2px); box-shadow: 0 8px 32px oklch(0.4 0.18 145 / 0.55); }
        .wa-float span { display: none; }
        @media (min-width: 768px) { .wa-float span { display: inline; } }

        /* ===== FOOTER ===== */
        .footer { background: var(--color-text); color: var(--color-text-inverse); padding-block: var(--space-16) var(--space-8); }
        .footer a { color: oklch(from var(--color-text-inverse) l c h / 0.65); transition: color var(--transition); }
        .footer a:hover { color: var(--color-primary); }
        .footer__grid { display: grid; grid-template-columns: 1.6fr 1fr 1fr 1fr; gap: var(--space-12); margin-bottom: var(--space-12); }
        .footer__brand-name { font-family: var(--font-display); font-size: var(--text-lg); color: var(--color-primary); margin-bottom: var(--space-3); }
        .footer__desc { font-size: var(--text-sm); line-height: 1.7; color: oklch(from var(--color-text-inverse) l c h / 0.6); max-width: 30ch; }
        .footer__heading { font-family: var(--font-body); font-size: var(--text-sm); font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; color: oklch(from var(--color-text-inverse) l c h / 0.45); margin-bottom: var(--space-4); }
        .footer__links { display: flex; flex-direction: column; gap: var(--space-2); }
        .footer__link { font-size: var(--text-sm); }
        .footer__bottom { border-top: 1px solid oklch(from var(--color-text-inverse) l c h / 0.1); padding-top: var(--space-6); display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: var(--space-3); }
        .footer__copy { font-size: var(--text-xs); color: oklch(from var(--color-text-inverse) l c h / 0.4); }
        @media (max-width: 768px) { .footer__grid { grid-template-columns: 1fr 1fr; gap: var(--space-8); } }
        @media (max-width: 480px) { .footer__grid { grid-template-columns: 1fr; } }

        /* ===== THEME TOGGLE ===== */
        .theme-toggle { display: flex; align-items: center; justify-content: center; width: 38px; height: 38px; border-radius: var(--radius-md); color: var(--color-text-muted); transition: color var(--transition), background var(--transition); }
        .theme-toggle:hover { color: var(--color-text); background: var(--color-surface-offset); }

        /* ===== PAGE HERO (inner pages) ===== */
        .page-hero { background: linear-gradient(135deg, var(--color-text) 0%, oklch(0.22 0.04 45) 100%); color: var(--color-text-inverse); padding-block: clamp(var(--space-16), 10vw, var(--space-24)); margin-top: 68px; }
        .page-hero__eyebrow { font-size: var(--text-xs); font-weight: 600; text-transform: uppercase; letter-spacing: 0.1em; color: var(--color-primary); margin-bottom: var(--space-3); }
        .page-hero__title { font-family: var(--font-display); font-size: var(--text-2xl); font-weight: 800; margin-bottom: var(--space-4); }
        .page-hero__desc { font-size: var(--text-base); color: oklch(from var(--color-text-inverse) l c h / 0.7); max-width: 55ch; }

        /* ===== SECTION HEADER ===== */
        .section-header { margin-bottom: clamp(var(--space-8), 4vw, var(--space-12)); }
        .section-header__eyebrow { font-size: var(--text-xs); font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; color: var(--color-primary); margin-bottom: var(--space-2); }
        .section-header__title { font-family: var(--font-display); font-size: var(--text-xl); font-weight: 800; color: var(--color-text); line-height: 1.15; margin-bottom: var(--space-3); }
        .section-header__desc { font-size: var(--text-base); color: var(--color-text-muted); max-width: 60ch; }
        .section-header--center { text-align: center; }
        .section-header--center .section-header__desc { margin-inline: auto; }

        /* ===== CARDS ===== */
        .card { background: var(--color-surface-2); border: 1px solid oklch(from var(--color-text) l c h / 0.07); border-radius: var(--radius-xl); padding: var(--space-6); box-shadow: var(--shadow-sm); transition: box-shadow var(--transition), transform var(--transition); }
        .card:hover { box-shadow: var(--shadow-md); transform: translateY(-2px); }

        /* ===== GRID UTILITIES ===== */
        .grid-3 { display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-6); }
        .grid-2 { display: grid; grid-template-columns: repeat(2, 1fr); gap: var(--space-8); }
        @media (max-width: 900px) { .grid-3 { grid-template-columns: repeat(2, 1fr); } }
        @media (max-width: 600px) { .grid-3 { grid-template-columns: 1fr; } .grid-2 { grid-template-columns: 1fr; } }

        /* ===== DIVIDER ===== */
        hr { border: none; border-top: 1px solid var(--color-divider); }

        /* ===== SCROLL REVEAL ===== */
        .reveal { opacity: 0; transform: translateY(24px); transition: opacity 0.55s ease, transform 0.55s ease; }
        .reveal.visible { opacity: 1; transform: none; }
    </style>
    @stack('styles')
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar" id="navbar">
        <div class="container">
            <div class="navbar__inner">
                <a href="{{ route('home') }}" class="navbar__logo">
                    <svg class="navbar__logo-icon" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg" aria-label="Mangun Jaya Logo">
                        <rect width="40" height="40" rx="8" fill="var(--color-primary)"/>
                        <path d="M8 30 L14 14 L20 24 L26 14 L32 30" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                        <path d="M6 30 H34" stroke="white" stroke-width="2" stroke-linecap="round"/>
                        <path d="M20 8 L36 20 H4 L20 8Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none" opacity="0.6"/>
                    </svg>
                    <div class="navbar__logo-text">
                        <span class="navbar__logo-name">Mangun Jaya</span>
                        <span class="navbar__logo-sub">Plafon & Interior</span>
                    </div>
                </a>
                <nav class="navbar__nav" role="navigation" aria-label="Menu utama">
                    <a href="{{ route('home') }}" class="navbar__link {{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
                    <a href="{{ route('about') }}" class="navbar__link {{ request()->routeIs('about') ? 'active' : '' }}">Tentang</a>
                    <a href="{{ route('products') }}" class="navbar__link {{ request()->routeIs('products') ? 'active' : '' }}">Produk</a>
                    <a href="{{ route('gallery') }}" class="navbar__link {{ request()->routeIs('gallery') ? 'active' : '' }}">Galeri</a>
                    <a href="{{ route('contact') }}" class="navbar__link {{ request()->routeIs('contact') ? 'active' : '' }}">Kontak</a>
                </nav>
                <div class="navbar__actions">
                    <button class="theme-toggle" data-theme-toggle aria-label="Toggle tema">
                        <i data-lucide="sun" style="width:18px;height:18px;"></i>
                    </button>
                    <a href="https://wa.me/6282310719177" target="_blank" rel="noopener noreferrer" class="btn btn--primary" style="font-size:var(--text-sm);padding:0.6rem 1.2rem;">
                        <i data-lucide="message-circle" style="width:16px;height:16px;"></i>
                        WhatsApp
                    </a>
                </div>
                <button class="navbar__toggle" id="mobileToggle" aria-label="Buka menu" aria-expanded="false">
                    <i data-lucide="menu" style="width:22px;height:22px;"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Mobile Nav -->
    <div class="mobile-nav" id="mobileNav" role="dialog" aria-label="Menu mobile">
        <a href="{{ route('home') }}" class="mobile-nav__link {{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
        <a href="{{ route('about') }}" class="mobile-nav__link {{ request()->routeIs('about') ? 'active' : '' }}">Tentang Kami</a>
        <a href="{{ route('products') }}" class="mobile-nav__link {{ request()->routeIs('products') ? 'active' : '' }}">Produk</a>
        <a href="{{ route('gallery') }}" class="mobile-nav__link {{ request()->routeIs('gallery') ? 'active' : '' }}">Galeri</a>
        <a href="{{ route('contact') }}" class="mobile-nav__link {{ request()->routeIs('contact') ? 'active' : '' }}">Kontak</a>
        <div class="mobile-nav__cta">
            <a href="https://wa.me/6282310719177" target="_blank" rel="noopener noreferrer" class="btn btn--primary" style="width:100%;justify-content:center;">
                <i data-lucide="message-circle" style="width:18px;height:18px;"></i>
                Hubungi via WhatsApp
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <main id="main-content">
        @yield('content')
    </main>

    <!-- WhatsApp Float -->
    <a href="https://wa.me/6282310719177?text=Halo%20Mangun%20Jaya%2C%20saya%20ingin%20tanya%20mengenai%20plafon" target="_blank" rel="noopener noreferrer" class="wa-float" aria-label="Chat WhatsApp">
        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/>
        </svg>
        <span>Chat Sekarang</span>
    </a>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer__grid">
                <div>
                    <div class="footer__brand-name">Mangun Jaya</div>
                    <p class="footer__desc">Spesialis plafon dan interior terpercaya. Kualitas terbaik untuk hunian dan bangunan komersial Anda.</p>
                </div>
                <div>
                    <div class="footer__heading">Navigasi</div>
                    <nav class="footer__links" aria-label="Footer navigation">
                        <a href="{{ route('home') }}" class="footer__link">Beranda</a>
                        <a href="{{ route('about') }}" class="footer__link">Tentang Kami</a>
                        <a href="{{ route('products') }}" class="footer__link">Produk</a>
                        <a href="{{ route('gallery') }}" class="footer__link">Galeri</a>
                        <a href="{{ route('contact') }}" class="footer__link">Kontak</a>
                    </nav>
                </div>
                <div>
                    <div class="footer__heading">Produk</div>
                    <nav class="footer__links" aria-label="Produk navigation">
                        <a href="{{ route('products') }}" class="footer__link">Plafon Gypsum</a>
                        <a href="{{ route('products') }}" class="footer__link">Plafon PVC</a>
                        <a href="{{ route('products') }}" class="footer__link">Plafon GRC</a>
                        <a href="{{ route('products') }}" class="footer__link">Partisi Gypsum</a>
                        <a href="{{ route('products') }}" class="footer__link">Rangka Metal</a>
                    </nav>
                </div>
                <div>
                    <div class="footer__heading">Kontak</div>
                    <div class="footer__links" style="gap:var(--space-3);">
                        <a href="tel:+6282310719177" class="footer__link" style="display:flex;align-items:flex-start;gap:var(--space-2);">
                            <i data-lucide="phone" style="width:15px;height:15px;flex-shrink:0;margin-top:2px;"></i>
                            <span>+62 823-1071-9177</span>
                        </a>
                        <a href="https://wa.me/6282310719177" target="_blank" rel="noopener noreferrer" class="footer__link" style="display:flex;align-items:flex-start;gap:var(--space-2);">
                            <i data-lucide="message-circle" style="width:15px;height:15px;flex-shrink:0;margin-top:2px;"></i>
                            <span>WhatsApp</span>
                        </a>
                        <div style="display:flex;align-items:flex-start;gap:var(--space-2);color:oklch(from var(--color-text-inverse) l c h / 0.5);font-size:var(--text-sm);">
                            <i data-lucide="map-pin" style="width:15px;height:15px;flex-shrink:0;margin-top:2px;"></i>
                            <span>Jl. Raya Contoh No. 123<br>Bekasi, Jawa Barat</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__bottom">
                <p class="footer__copy">&copy; {{ date('Y') }} Mangun Jaya Plafon. Semua hak dilindungi.</p>
                <p class="footer__copy">Dibuat dengan ❤️ menggunakan Laravel</p>
            </div>
        </div>
    </footer>

    <script>
        // Lucide icons
        lucide.createIcons();

        // Theme toggle
        (function(){
            const t = document.querySelector('[data-theme-toggle]');
            const r = document.documentElement;
            let d = localStorage.getItem('theme') || (matchMedia('(prefers-color-scheme:dark)').matches ? 'dark' : 'light');
            r.setAttribute('data-theme', d);
            function updateIcon() {
                if(t) t.innerHTML = d === 'dark'
                    ? '<i data-lucide="sun" style="width:18px;height:18px;"></i>'
                    : '<i data-lucide="moon" style="width:18px;height:18px;"></i>';
                lucide.createIcons();
            }
            updateIcon();
            if(t) t.addEventListener('click', () => {
                d = d === 'dark' ? 'light' : 'dark';
                r.setAttribute('data-theme', d);
                try { localStorage.setItem('theme', d); } catch(e){}
                updateIcon();
            });
        })();

        // Navbar scroll effect
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            navbar.classList.toggle('scrolled', window.scrollY > 20);
        }, { passive: true });

        // Mobile nav toggle
        const mobileToggle = document.getElementById('mobileToggle');
        const mobileNav = document.getElementById('mobileNav');
        if(mobileToggle && mobileNav) {
            mobileToggle.addEventListener('click', () => {
                const open = mobileNav.classList.toggle('open');
                mobileToggle.setAttribute('aria-expanded', open);
                mobileToggle.innerHTML = open
                    ? '<i data-lucide="x" style="width:22px;height:22px;"></i>'
                    : '<i data-lucide="menu" style="width:22px;height:22px;"></i>';
                lucide.createIcons();
                document.body.style.overflow = open ? 'hidden' : '';
            });
        }

        // Scroll reveal
        const revealEls = document.querySelectorAll('.reveal');
        if(revealEls.length) {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach((e, i) => {
                    if(e.isIntersecting) {
                        setTimeout(() => e.target.classList.add('visible'), i * 60);
                        observer.unobserve(e.target);
                    }
                });
            }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });
            revealEls.forEach(el => observer.observe(el));
        }
    </script>
    @stack('scripts')
</body>
</html>
