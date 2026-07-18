@extends('layouts.app')
@section('title', 'Tentang Kami')
@section('meta_desc', 'Mangun Jaya Plafon - Distributor plafon PVC terpercaya sejak 2020. Menyediakan Plafon PVC, Wall Panel, Hollow Galvanis, dan Aksesoris Lengkap.')

@section('content')
@push('styles')
<style>
    .team-card { background: var(--color-surface-2); border: 1px solid oklch(from var(--color-text) l c h / 0.07); border-radius: var(--radius-xl); overflow: hidden; }
    .team-card__img { aspect-ratio: 1; background: var(--color-surface-offset); overflow: hidden; }
    .team-card__img img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s ease; }
    .team-card:hover .team-card__img img { transform: scale(1.04); }
    .team-card__body { padding: var(--space-4) var(--space-5); }
    .team-card__name { font-family: var(--font-display); font-size: var(--text-lg); font-weight: 700; }
    .team-card__role { font-size: var(--text-sm); color: var(--color-primary); font-weight: 500; margin-top: var(--space-1); }
    .milestone-line { position: relative; padding-left: var(--space-10); }
    .milestone-line::before { content: ''; position: absolute; left: 18px; top: 8px; bottom: 0; width: 2px; background: var(--color-border); }
    .milestone { position: relative; padding-bottom: var(--space-8); }
    .milestone__dot { position: absolute; left: calc(-1 * var(--space-10) + 12px); top: 4px; width: 14px; height: 14px; border-radius: var(--radius-full); background: var(--color-primary); border: 3px solid var(--color-bg); z-index: 1; }
    .milestone__year { font-size: var(--text-xs); font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; color: var(--color-primary); margin-bottom: var(--space-1); }
    .milestone__title { font-weight: 700; font-size: var(--text-base); margin-bottom: var(--space-1); }
    .milestone__desc { font-size: var(--text-sm); color: var(--color-text-muted); }
    .values-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: var(--space-4); }
    .value-card { background: var(--color-surface-2); border: 1px solid oklch(from var(--color-text) l c h / 0.07); border-radius: var(--radius-lg); padding: var(--space-5); }
    .value-card__icon { width: 40px; height: 40px; border-radius: var(--radius-md); background: var(--color-primary-light); display: flex; align-items: center; justify-content: center; color: var(--color-primary); margin-bottom: var(--space-3); }
    .value-card__title { font-weight: 700; margin-bottom: var(--space-2); }
    .value-card__desc { font-size: var(--text-sm); color: var(--color-text-muted); line-height: 1.65; }

    /* STORY LAYOUT — kiri & kanan sejajar stretch */
    .story-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: var(--space-16);
        align-items: stretch;
    }
    .story-left {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    .story-right {
        border-radius: var(--radius-xl);
        overflow: hidden;
        background: var(--color-surface-offset);
        min-height: 480px;
    }
    .story-right img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    /* STORY TEKS */
    .story-intro { font-size: var(--text-base); color: var(--color-text-muted); line-height: 1.8; margin-bottom: var(--space-5); }
    .story-points { list-style: none; padding: 0; margin: 0 0 var(--space-5); display: flex; flex-direction: column; gap: var(--space-3); }
    .story-points li { display: flex; align-items: flex-start; gap: var(--space-3); font-size: var(--text-sm); color: var(--color-text-muted); line-height: 1.65; }
    .story-points li::before { content: ''; width: 6px; height: 6px; border-radius: 50%; background: var(--color-primary); flex-shrink: 0; margin-top: 8px; }
    .story-points li strong { color: var(--color-text); display: block; font-size: var(--text-sm); margin-bottom: 2px; }
    .story-quote { padding: var(--space-4) var(--space-5); background: oklch(from var(--color-primary) 0.96 0.02 192); border-left: 3px solid var(--color-primary); border-radius: var(--radius-md); margin-bottom: var(--space-6); }
    .story-quote p { font-size: var(--text-sm); color: var(--color-text-muted); line-height: 1.75; margin: 0; font-style: italic; }

    /* CEO CARD */
    .ceo-card {
        display: flex;
        align-items: center;
        gap: var(--space-4);
        padding: var(--space-4) var(--space-5);
        background: var(--color-surface-2);
        border: 1px solid oklch(from var(--color-text) l c h / 0.08);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-sm);
    }
    .ceo-card__avatar {
        width: 64px;
        height: 64px;
        border-radius: var(--radius-full);
        overflow: hidden;
        flex-shrink: 0;
        background: var(--color-surface-offset);
        border: 2px solid var(--color-primary-highlight, oklch(from var(--color-primary) 0.88 0.06 192));
    }
    .ceo-card__avatar img { width: 100%; height: 100%; object-fit: cover; }
    .ceo-card__info { flex: 1; }
    .ceo-card__name { font-family: var(--font-display); font-weight: 700; font-size: var(--text-base); color: var(--color-text); line-height: 1.2; }
    .ceo-card__role { font-size: var(--text-xs); color: var(--color-primary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.06em; margin-top: var(--space-1); }
    .ceo-card__quote { font-size: var(--text-xs); color: var(--color-text-muted); line-height: 1.6; margin-top: var(--space-2); font-style: italic; }
    .ceo-card__sig { display: flex; align-items: center; justify-content: flex-end; }
    .ceo-card__sig-icon { width: 32px; height: 32px; border-radius: var(--radius-full); background: var(--color-primary); display: flex; align-items: center; justify-content: center; color: #fff; flex-shrink: 0; }

    @media (max-width: 768px) {
        .story-grid { grid-template-columns: 1fr; }
        .story-right { min-height: 280px; aspect-ratio: 4/3; }
    }
    @media (max-width: 480px) { .values-grid { grid-template-columns: 1fr; } }
</style>
@endpush

<div class="page-hero">
    <div class="container">
        <div class="page-hero__eyebrow">Tentang Kami</div>
        <h1 class="page-hero__title">Dedikasi Kami untuk<br>Hunian Terbaik Anda</h1>
        <p class="page-hero__desc">Distributor plafon PVC terpercaya sejak 2020 &mdash; melayani rumah, ruko, perkantoran hingga proyek skala besar.</p>
    </div>
</div>

<!-- STORY -->
<section class="section">
    <div class="container">
        <div class="story-grid">

            {{-- KIRI: teks --}}
            <div class="story-left reveal">
                <div>
                    <div class="section-header">
                        <div class="section-header__eyebrow">Kisah Kami</div>
                        <h2 class="section-header__title">Mangun Jaya Plafon</h2>
                    </div>

                    <p class="story-intro">Berdiri sejak <strong style="color:var(--color-text);">30 Juli 2020</strong>, Mangun Jaya Plafon hadir sebagai distributor material plafon dan interior yang berkualitas, terpercaya, dan terjangkau &mdash; untuk rumah, ruko, perkantoran, hingga proyek skala besar.</p>

                    <ul class="story-points">
                        <li>
                            <span><strong>Produk Lengkap & Berkualitas</strong>Plafon PVC, Wall Panel, Hollow Galvanis, Rangka, Lis, Lem, Sekrup &mdash; semua tersedia dalam satu tempat.</span>
                        </li>
                        <li>
                            <span><strong>Harga Langsung Pabrik</strong>Tanpa perantara, kami memastikan harga paling kompetitif untuk setiap produk yang kami sediakan.</span>
                        </li>
                        <li>
                            <span><strong>Pelayanan Terpercaya</strong>Kami mengutamakan kepuasan pelanggan dengan layanan responsif dan pengiriman tepat waktu.</span>
                        </li>
                        <li>
                            <span><strong>Mitra untuk Semua Skala</strong>Dari renovasi rumah hingga proyek konstruksi besar, kami siap menjadi mitra material terpercaya Anda.</span>
                        </li>
                    </ul>

                    <div class="story-quote">
                        <p>&ldquo;Kami berkomitmen membangun kemitraan yang terpercaya dengan mengutamakan kebutuhan pelanggan serta memberikan produk dan layanan terbaik di setiap proses.&rdquo;</p>
                    </div>
                </div>

                {{-- CEO CARD --}}
                <div>
                    <div class="ceo-card">
                        <div class="ceo-card__avatar">
                            <img src="{{ asset('image/ceo.jpg') }}" alt="Andre Saputra, S.T." width="64" height="64" loading="lazy" onerror="this.onerror=null;this.src='https://i.pravatar.cc/64?img=11';">
                        </div>
                        <div class="ceo-card__info">
                            <div class="ceo-card__name">Andre Saputra, S.T.</div>
                            <div class="ceo-card__role">CEO &amp; Co-founder</div>
                            <div class="ceo-card__quote">&ldquo;Kualitas bukan pilihan &mdash; itu standar kami.&rdquo;</div>
                        </div>
                        <div class="ceo-card__sig">
                            <div class="ceo-card__sig-icon">
                                <i data-lucide="quote" style="width:16px;height:16px;"></i>
                            </div>
                        </div>
                    </div>

                    <div style="margin-top:var(--space-5);">
                        <a href="{{ route('contact') }}" class="btn btn--primary">Hubungi Kami <i data-lucide="arrow-right" style="width:16px;height:16px;"></i></a>
                    </div>
                </div>
            </div>

            {{-- KANAN: foto toko --}}
            <div class="story-right reveal">
                <img src="{{ asset('image/store.png') }}" alt="Toko Mangun Jaya Plafon" width="700" height="900" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=700&q=80'">
            </div>

        </div>
    </div>
</section>

<!-- MILESTONES -->
<section class="section section--alt">
    <div class="container">
        <div class="grid-2" style="gap:var(--space-16);align-items:start;">
            <div>
                <div class="section-header">
                    <div class="section-header__eyebrow">Perjalanan Kami</div>
                    <h2 class="section-header__title">Milestone<br>Mangun Jaya</h2>
                </div>
                <div class="milestone-line">
                    @foreach([
                        ['2020', 'Pendirian', 'Mangun Jaya Plafon resmi berdiri pada 30 Juli 2020 di Bekasi.'],
                        ['2021', 'Ekspansi Produk', 'Menambahkan Wall Panel PVC, Hollow Galvanis, dan aksesoris lengkap.'],
                        ['2022', 'Kepercayaan Pelanggan', 'Ratusan pelanggan setia dari Bekasi dan Jabodetabek.'],
                        ['2023', 'Tim Profesional', 'Memperkuat tim distribusi dan layanan pelanggan.'],
                        ['2024', 'Proyek Skala Besar', 'Melayani perkantoran, ruko, dan proyek konstruksi skala besar.'],
                    ] as $m)
                    <div class="milestone reveal">
                        <div class="milestone__dot"></div>
                        <div class="milestone__year">{{ $m[0] }}</div>
                        <div class="milestone__title">{{ $m[1] }}</div>
                        <p class="milestone__desc">{{ $m[2] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            <div>
                <div class="section-header">
                    <div class="section-header__eyebrow">Nilai Kami</div>
                    <h2 class="section-header__title">Prinsip yang<br>Kami Junjung</h2>
                </div>
                <div class="values-grid">
                    @foreach([
                        ['award', 'Kualitas', 'Produk terbaik dengan standar kualitas di setiap transaksi.'],
                        ['heart-handshake', 'Integritas', 'Jujur dalam harga dan transparan dalam setiap proses.'],
                        ['users', 'Pelanggan', 'Kepuasan pelanggan adalah ukuran keberhasilan kami.'],
                        ['leaf', 'Komitmen', 'Pelayanan dan produk terbaik di setiap proses tanpa kompromi.'],
                    ] as $v)
                    <div class="value-card reveal">
                        <div class="value-card__icon"><i data-lucide="{{ $v[0] }}" style="width:20px;height:20px;"></i></div>
                        <div class="value-card__title">{{ $v[1] }}</div>
                        <p class="value-card__desc">{{ $v[2] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- TEAM -->
<section class="section">
    <div class="container">
        <div class="section-header section-header--center">
            <div class="section-header__eyebrow">Tim Kami</div>
            <h2 class="section-header__title">Orang-orang di Balik<br>Karya Terbaik</h2>
        </div>
        <div class="grid-3">
            @foreach([
                ['Andre Saputra, S.T.', 'CEO & Co-founder', 'image/ceo.jpg', true],
                ['Pak Hendra', 'Kepala Operasional', 'https://i.pravatar.cc/400?img=12', false],
                ['Bu Rina', 'Manajer Penjualan', 'https://i.pravatar.cc/400?img=48', false],
            ] as $member)
            <div class="team-card reveal">
                <div class="team-card__img">
                    @if($member[3])
                        <img src="{{ asset($member[2]) }}" alt="{{ $member[0] }}" width="400" height="400" loading="lazy" onerror="this.src='https://i.pravatar.cc/400?img=11'">
                    @else
                        <img src="{{ $member[2] }}" alt="{{ $member[0] }}" width="400" height="400" loading="lazy">
                    @endif
                </div>
                <div class="team-card__body">
                    <div class="team-card__name">{{ $member[0] }}</div>
                    <div class="team-card__role">{{ $member[1] }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
