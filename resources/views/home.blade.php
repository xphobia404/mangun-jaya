@extends('layouts.app')

@section('title', 'Beranda')
@section('meta_desc', 'Mangun Jaya Plafon - Distributor Plafon PVC Terpercaya. Menyediakan Plafon PVC, Wall Panel, Hollow Galvanis, dan Aksesoris Lengkap. Harga Pabrik!')

@section('content')
@push('styles')
<style>
    body { padding-top: 68px; }

    /* HERO */
    .hero {
        min-height: calc(100vh - 68px);
        display: grid;
        grid-template-columns: 1fr 1fr;
        align-items: center;
        gap: var(--space-12);
        padding-block: var(--space-16);
        position: relative;
        overflow: hidden;
    }
    .hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(ellipse 60% 70% at 70% 50%, oklch(from var(--color-primary) l c h / 0.07) 0%, transparent 70%);
        pointer-events: none;
    }
    .hero__content { position: relative; }
    .hero__eyebrow { display: inline-flex; align-items: center; gap: var(--space-2); font-size: var(--text-xs); font-weight: 600; text-transform: uppercase; letter-spacing: 0.1em; color: var(--color-primary); margin-bottom: var(--space-5); }
    .hero__eyebrow::before { content: ''; width: 24px; height: 2px; background: var(--color-primary); border-radius: 2px; }
    .hero__title { font-family: var(--font-display); font-size: var(--text-hero); font-weight: 800; line-height: 1.05; color: var(--color-text); margin-bottom: var(--space-6); }
    .hero__title em { font-style: italic; color: var(--color-primary); }
    .hero__desc { font-size: var(--text-base); color: var(--color-text-muted); max-width: 52ch; line-height: 1.75; margin-bottom: var(--space-3); }
    .hero__desc-sub { font-size: var(--text-sm); color: var(--color-text-muted); max-width: 52ch; line-height: 1.7; margin-bottom: var(--space-5); }
    .hero__harga-pabrik { display: inline-flex; align-items: center; gap: var(--space-2); margin-bottom: var(--space-6); }
    .harga-pabrik-badge {
        display: inline-flex;
        align-items: center;
        gap: var(--space-2);
        background: linear-gradient(135deg, #d4000a 0%, #ff2d20 50%, #d4000a 100%);
        color: #fff;
        font-family: var(--font-display);
        font-size: clamp(1.1rem, 2vw, 1.5rem);
        font-weight: 900;
        font-style: italic;
        letter-spacing: 0.03em;
        padding: 0.55rem 1.2rem 0.55rem 1rem;
        border-radius: var(--radius-md);
        box-shadow: 0 4px 18px oklch(0.4 0.22 25 / 0.45), inset 0 1px 0 oklch(1 0 0 / 0.2);
        text-transform: uppercase;
        position: relative;
        overflow: hidden;
        animation: pulse-badge 2.2s ease-in-out infinite;
    }
    .harga-pabrik-badge::before {
        content: '';
        position: absolute;
        top: 0; left: -100%;
        width: 60%;
        height: 100%;
        background: linear-gradient(90deg, transparent, oklch(1 0 0 / 0.18), transparent);
        animation: shimmer-badge 2.8s ease-in-out infinite;
    }
    .harga-pabrik-badge i { flex-shrink: 0; }
    @keyframes pulse-badge {
        0%, 100% { box-shadow: 0 4px 18px oklch(0.4 0.22 25 / 0.45), inset 0 1px 0 oklch(1 0 0 / 0.2); }
        50% { box-shadow: 0 6px 28px oklch(0.4 0.22 25 / 0.65), inset 0 1px 0 oklch(1 0 0 / 0.2); }
    }
    @keyframes shimmer-badge {
        0% { left: -100%; }
        60%, 100% { left: 150%; }
    }
    .hero__ctas { display: flex; gap: var(--space-3); flex-wrap: wrap; }
    .hero__stats { display: flex; gap: var(--space-8); margin-top: var(--space-10); padding-top: var(--space-8); border-top: 1px solid var(--color-divider); }
    .hero__stat-num { font-family: var(--font-display); font-size: var(--text-xl); font-weight: 800; color: var(--color-text); line-height: 1; }
    .hero__stat-label { font-size: var(--text-xs); color: var(--color-text-muted); margin-top: var(--space-1); }

    /* Hero visual — dikecilkan agar sejajar konten kiri */
    .hero__visual {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .hero__image-wrap {
        border-radius: var(--radius-xl);
        overflow: hidden;
        /* Ubah dari 4/5 ke 3/4 agar foto lebih pendek & sejajar teks */
        aspect-ratio: 3/4;
        /* Batasi max-height agar tidak melebihi tinggi konten kiri */
        max-height: 560px;
        width: 100%;
        background: var(--color-surface-offset);
        box-shadow: var(--shadow-lg);
        position: relative;
    }
    .hero__image-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center top;
    }
    .hero__badge-float {
        position: absolute;
        bottom: var(--space-5);
        left: calc(-1 * var(--space-6));
        background: var(--color-surface-2);
        border: 1px solid var(--color-border);
        border-radius: var(--radius-lg);
        padding: var(--space-3) var(--space-4);
        box-shadow: var(--shadow-lg);
        display: flex;
        align-items: center;
        gap: var(--space-3);
    }
    .hero__badge-icon { width: 36px; height: 36px; background: var(--color-primary-light); border-radius: var(--radius-md); display: flex; align-items: center; justify-content: center; color: var(--color-primary); flex-shrink: 0; }
    .hero__badge-text strong { display: block; font-size: var(--text-sm); font-weight: 700; color: var(--color-text); }
    .hero__badge-text span { font-size: var(--text-xs); color: var(--color-text-muted); }

    @media (max-width: 768px) {
        .hero { grid-template-columns: 1fr; min-height: auto; padding-block: var(--space-12) var(--space-8); }
        .hero__visual { display: none; }
        .hero__stats { gap: var(--space-6); }
    }

    /* MARQUEE */
    .marquee-wrap { background: var(--color-primary); color: #fff; padding-block: var(--space-3); overflow: hidden; }
    .marquee-track { display: flex; gap: var(--space-8); animation: marquee 25s linear infinite; white-space: nowrap; }
    .marquee-track:hover { animation-play-state: paused; }
    .marquee-item { display: flex; align-items: center; gap: var(--space-2); font-size: var(--text-sm); font-weight: 500; flex-shrink: 0; }
    @keyframes marquee { from { transform: translateX(0); } to { transform: translateX(-50%); } }

    /* PRODUCTS SECTION */
    .product-card { background: var(--color-surface-2); border: 1px solid oklch(from var(--color-text) l c h / 0.07); border-radius: var(--radius-xl); padding: var(--space-6); transition: box-shadow var(--transition), transform var(--transition); }
    .product-card:hover { box-shadow: var(--shadow-md); transform: translateY(-3px); }
    .product-card__icon { width: 48px; height: 48px; background: var(--color-primary-light); border-radius: var(--radius-md); display: flex; align-items: center; justify-content: center; color: var(--color-primary); margin-bottom: var(--space-4); }
    .product-card__name { font-family: var(--font-display); font-size: var(--text-lg); font-weight: 700; margin-bottom: var(--space-2); }
    .product-card__desc { font-size: var(--text-sm); color: var(--color-text-muted); line-height: 1.65; }

    /* WHY US */
    .why-grid { display: grid; grid-template-columns: 1fr 1.2fr; gap: var(--space-16); align-items: center; }
    .why-list { display: flex; flex-direction: column; gap: var(--space-5); margin-top: var(--space-8); }
    .why-item { display: flex; gap: var(--space-4); align-items: flex-start; }
    .why-item__icon { width: 44px; height: 44px; border-radius: var(--radius-md); background: var(--color-primary-light); display: flex; align-items: center; justify-content: center; color: var(--color-primary); flex-shrink: 0; }
    .why-item__title { font-weight: 700; margin-bottom: var(--space-1); font-size: var(--text-base); }
    .why-item__desc { font-size: var(--text-sm); color: var(--color-text-muted); line-height: 1.65; }
    .why-image { border-radius: var(--radius-xl); overflow: hidden; aspect-ratio: 4/5; background: var(--color-surface-offset); }
    .why-image img { width: 100%; height: 100%; object-fit: cover; }
    @media (max-width: 768px) { .why-grid { grid-template-columns: 1fr; } .why-image { display: none; } }

    /* TESTIMONIALS */
    .testi-card { background: var(--color-surface-2); border: 1px solid oklch(from var(--color-text) l c h / 0.07); border-radius: var(--radius-xl); padding: var(--space-6); }
    .testi-card__quote { font-size: var(--text-base); color: var(--color-text-muted); line-height: 1.75; margin-bottom: var(--space-5); font-style: italic; }
    .testi-card__author { display: flex; align-items: center; gap: var(--space-3); }
    .testi-card__avatar { width: 40px; height: 40px; border-radius: var(--radius-full); background: var(--color-primary-light); display: flex; align-items: center; justify-content: center; font-family: var(--font-display); font-weight: 700; font-size: var(--text-base); color: var(--color-primary); flex-shrink: 0; }
    .testi-card__name { font-weight: 700; font-size: var(--text-sm); }
    .testi-card__role { font-size: var(--text-xs); color: var(--color-text-muted); }
    .testi-stars { color: var(--color-accent-gold); display: flex; gap: 2px; margin-bottom: var(--space-3); }

    /* CTA SECTION */
    .cta-section { background: linear-gradient(135deg, oklch(0.23 0.06 40) 0%, oklch(0.30 0.08 40) 100%); color: #fff; text-align: center; padding-block: clamp(var(--space-16), 8vw, var(--space-24)); }
    .cta-section__title { font-family: var(--font-display); font-size: var(--text-2xl); font-weight: 800; margin-bottom: var(--space-4); color: #fff; }
    .cta-section__desc { font-size: var(--text-base); color: oklch(1 0 0 / 0.7); max-width: 55ch; margin-inline: auto; margin-bottom: var(--space-8); }
    .cta-section__actions { display: flex; gap: var(--space-3); justify-content: center; flex-wrap: wrap; }
</style>
@endpush

<!-- HERO -->
<section class="hero">
    <div class="container" style="display:contents;">
        <div class="hero__content" style="padding-left:clamp(var(--space-4),4vw,var(--space-12));">
            <div class="hero__eyebrow reveal">Distributor Plafon PVC Terpercaya</div>
            <h1 class="hero__title reveal">Plafon <em>Indah</em>,<br>Rumah Sempurna</h1>
            <p class="hero__desc reveal">Mangun Jaya Plafon &mdash; Distributor Plafon PVC Terpercaya dan Berkualitas.</p>
            <p class="hero__desc-sub reveal">Menyediakan Plafon PVC, Wall Panel, Hollow Galvanis, dan Aksesoris Lengkap untuk Rumah, Ruko, Perkantoran hingga Proyek Skala Besar.</p>
            <div class="hero__harga-pabrik reveal">
                <div class="harga-pabrik-badge">
                    <i data-lucide="tag" style="width:20px;height:20px;"></i>
                    HARGA PABRIK !!!
                </div>
            </div>
            <div class="hero__ctas reveal">
                <a href="{{ route('products') }}" class="btn btn--primary btn--lg">
                    <i data-lucide="package" style="width:18px;height:18px;"></i>
                    Lihat Produk
                </a>
                <a href="https://wa.me/6282310719177" target="_blank" rel="noopener noreferrer" class="btn btn--outline btn--lg">
                    <i data-lucide="message-circle" style="width:18px;height:18px;"></i>
                    Konsultasi Gratis
                </a>
            </div>
            <div class="hero__stats reveal">
                <div>
                    <div class="hero__stat-num">103K</div>
                    <div class="hero__stat-label">Produk Terjual</div>
                </div>
                <div>
                    <div class="hero__stat-num">6+</div>
                    <div class="hero__stat-label">Tahun Pengalaman</div>
                </div>
                <div>
                    <div class="hero__stat-num">98%</div>
                    <div class="hero__stat-label">Kepuasan Klien</div>
                </div>
            </div>
        </div>
        <div class="hero__visual reveal" style="padding-right:clamp(var(--space-4),4vw,var(--space-12));">
            <div class="hero__image-wrap">
                <img src="image/hero-bg.png" alt="Plafon PVC Mangun Jaya" width="560" height="746" loading="eager">
            </div>
            <div class="hero__badge-float">
                <div class="hero__badge-icon"><i data-lucide="shield-check" style="width:20px;height:20px;"></i></div>
                <div class="hero__badge-text">
                    <strong>Bergaransi</strong>
                    <span>Garansi pengerjaan 1 tahun</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- MARQUEE -->
<div class="marquee-wrap" aria-hidden="true">
    <div class="marquee-track">
        @foreach(['Plafon PVC', 'Wall Panel', 'Hollow Galvanis', 'Plafon Gypsum', 'Plafon GRC', 'Partisi Gypsum', 'Rangka Metal', 'List Plafon', 'Plafon Akustik', 'Aksesoris Plafon', 'Plafon PVC', 'Wall Panel', 'Hollow Galvanis', 'Plafon Gypsum', 'Plafon GRC', 'Partisi Gypsum', 'Rangka Metal', 'List Plafon', 'Plafon Akustik', 'Aksesoris Plafon'] as $item)
        <div class="marquee-item">
            <i data-lucide="check-circle" style="width:14px;height:14px;"></i>
            {{ $item }}
        </div>
        @endforeach
    </div>
</div>

<!-- PRODUCTS -->
<section class="section">
    <div class="container">
        <div class="section-header section-header--center">
            <div class="section-header__eyebrow">Produk & Layanan</div>
            <h2 class="section-header__title">Solusi Lengkap untuk<br>Setiap Kebutuhan</h2>
            <p class="section-header__desc">Kami menyediakan berbagai jenis plafon dan material interior dengan kualitas terjamin dan harga kompetitif.</p>
        </div>
        <div class="grid-3">
            @foreach($products as $product)
            <div class="product-card reveal">
                <div class="product-card__icon">
                    <i data-lucide="{{ $product['icon'] }}" style="width:22px;height:22px;"></i>
                </div>
                <h3 class="product-card__name">{{ $product['name'] }}</h3>
                <p class="product-card__desc">{{ $product['desc'] }}</p>
            </div>
            @endforeach
        </div>
        <div style="text-align:center;margin-top:var(--space-10);">
            <a href="{{ route('products') }}" class="btn btn--outline btn--lg">Lihat Semua Produk <i data-lucide="arrow-right" style="width:16px;height:16px;"></i></a>
        </div>
    </div>
</section>

<!-- WHY US -->
<section class="section section--alt">
    <div class="container">
        <div class="why-grid">
            <div>
                <div class="section-header">
                    <div class="section-header__eyebrow">Mengapa Kami</div>
                    <h2 class="section-header__title">Kepercayaan Dibangun<br>dari Kualitas</h2>
                    <p class="section-header__desc">Lebih dari satu dekade melayani pelanggan dengan standar tertinggi dalam material dan pemasangan.</p>
                </div>
                <div class="why-list">
                    <div class="why-item reveal">
                        <div class="why-item__icon"><i data-lucide="award" style="width:20px;height:20px;"></i></div>
                        <div>
                            <div class="why-item__title">Material Premium</div>
                            <p class="why-item__desc">Semua material berasal dari brand terpercaya dengan sertifikasi kualitas SNI.</p>
                        </div>
                    </div>
                    <div class="why-item reveal">
                        <div class="why-item__icon"><i data-lucide="users" style="width:20px;height:20px;"></i></div>
                        <div>
                            <div class="why-item__title">Tim Profesional</div>
                            <p class="why-item__desc">Tenaga ahli berpengalaman yang terlatih dalam pemasangan presisi dan rapi.</p>
                        </div>
                    </div>
                    <div class="why-item reveal">
                        <div class="why-item__icon"><i data-lucide="clock" style="width:20px;height:20px;"></i></div>
                        <div>
                            <div class="why-item__title">Tepat Waktu</div>
                            <p class="why-item__desc">Kami berkomitmen menyelesaikan setiap proyek sesuai jadwal yang disepakati.</p>
                        </div>
                    </div>
                    <div class="why-item reveal">
                        <div class="why-item__icon"><i data-lucide="shield-check" style="width:20px;height:20px;"></i></div>
                        <div>
                            <div class="why-item__title">Garansi Pengerjaan</div>
                            <p class="why-item__desc">Setiap pekerjaan dilindungi garansi 1 tahun untuk ketenangan pikiran Anda.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="why-image reveal">
                <img src="https://images.unsplash.com/photo-1581858726788-75bc0f6a952d?w=700&q=80" alt="Tim profesional Mangun Jaya sedang memasang plafon" width="700" height="875" loading="lazy">
            </div>
        </div>
    </div>
</section>

<!-- TESTIMONIALS -->
<section class="section">
    <div class="container">
        <div class="section-header section-header--center">
            <div class="section-header__eyebrow">Testimoni</div>
            <h2 class="section-header__title">Kata Mereka</h2>
            <p class="section-header__desc">Kepuasan pelanggan adalah prioritas utama kami.</p>
        </div>
        <div class="grid-3">
            @foreach($testimonials as $t)
            <div class="testi-card reveal">
                <div class="testi-stars">
                    @for($i=0;$i<5;$i++)<i data-lucide="star" style="width:14px;height:14px;fill:currentColor;"></i>@endfor
                </div>
                <p class="testi-card__quote">&ldquo;{{ $t['text'] }}&rdquo;</p>
                <div class="testi-card__author">
                    <div class="testi-card__avatar">{{ substr($t['name'], 0, 1) }}</div>
                    <div>
                        <div class="testi-card__name">{{ $t['name'] }}</div>
                        <div class="testi-card__role">{{ $t['role'] }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta-section">
    <div class="container">
        <h2 class="cta-section__title reveal">Siap Mempercantik<br>Rumah Anda?</h2>
        <p class="cta-section__desc reveal">Konsultasikan kebutuhan plafon Anda dengan tim ahli kami. Gratis survei dan estimasi biaya.</p>
        <div class="cta-section__actions reveal">
            <a href="https://wa.me/6282310719177" target="_blank" rel="noopener noreferrer" class="btn btn--white btn--lg">
                <i data-lucide="message-circle" style="width:18px;height:18px;"></i>
                Chat WhatsApp
            </a>
            <a href="{{ route('contact') }}" class="btn btn--lg" style="border:1.5px solid oklch(1 0 0 / 0.4);color:#fff;">
                <i data-lucide="phone" style="width:18px;height:18px;"></i>
                Hubungi Kami
            </a>
        </div>
    </div>
</section>
@endsection
