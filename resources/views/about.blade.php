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

    /* STORY SECTION */
    .story-brand { font-family: var(--font-display); font-size: var(--text-xl); font-weight: 900; letter-spacing: 0.04em; color: var(--color-primary); text-transform: uppercase; margin-bottom: var(--space-3); }
    .story-tagline { font-size: var(--text-base); font-weight: 600; color: var(--color-text); margin-bottom: var(--space-6); line-height: 1.6; }
    .story-body p { color: var(--color-text-muted); line-height: 1.85; margin-bottom: var(--space-4); font-size: var(--text-base); }
    .story-body p:last-child { margin-bottom: 0; }
    .story-salam { margin-top: var(--space-6); padding-top: var(--space-6); border-top: 1px solid var(--color-divider); }
    .story-salam p { color: var(--color-text-muted); font-size: var(--text-sm); line-height: 1.8; margin-bottom: 0; }
    .story-salam strong { color: var(--color-text); display: block; margin-top: var(--space-1); }
    .story-komitmen { margin-top: var(--space-5); padding: var(--space-5); background: var(--color-primary-light, oklch(from var(--color-primary) 0.95 0.02 192)); border-left: 3px solid var(--color-primary); border-radius: var(--radius-md); }
    .story-komitmen p { font-size: var(--text-sm); color: var(--color-text-muted); line-height: 1.75; margin: 0; font-style: italic; }

    /* CEO CARD */
    .ceo-card { display: flex; align-items: center; gap: var(--space-4); margin-top: var(--space-6); padding: var(--space-4); background: var(--color-surface-2); border: 1px solid oklch(from var(--color-text) l c h / 0.07); border-radius: var(--radius-lg); }
    .ceo-card__avatar { width: 56px; height: 56px; border-radius: var(--radius-full); overflow: hidden; flex-shrink: 0; background: var(--color-surface-offset); }
    .ceo-card__avatar img { width: 100%; height: 100%; object-fit: cover; }
    .ceo-card__name { font-weight: 700; font-size: var(--text-base); color: var(--color-text); }
    .ceo-card__role { font-size: var(--text-sm); color: var(--color-primary); font-weight: 500; }

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
        <div class="grid-2" style="align-items:start;gap:var(--space-16);">
            <div class="reveal">
                <div class="section-header">
                    <div class="section-header__eyebrow">Kisah Kami</div>
                    <h2 class="section-header__title">Mangun Jaya<br>Plafon</h2>
                </div>

                <p class="story-tagline">Kami berkomitmen untuk menyediakan produk-produk bagi pelanggan kami dengan kualitas terbaik</p>
                <p style="color:var(--color-text-muted);font-size:var(--text-base);margin-bottom:var(--space-5);">Selamat datang di Mangun Jaya Plafon.</p>

                <div class="story-body">
                    <p>Sejak berdiri pada <strong style="color:var(--color-text);">30 Juli 2020</strong>, Mangun Jaya Plafon berkomitmen menjadi penyedia material plafon dan interior bangunan yang berkualitas, terpercaya, dan mampu memenuhi kebutuhan masyarakat. Kami percaya bahwa setiap bangunan membutuhkan material yang tidak hanya indah secara visual, tetapi juga kuat, tahan lama, dan memberikan kenyamanan.</p>
                    <p>Dengan mengutamakan kualitas produk, pelayanan terbaik, dan kepuasan pelanggan, kami siap menjadi mitra terpercaya untuk mewujudkan hunian maupun bangunan impian Anda.</p>
                    <p>Terima kasih atas kepercayaan yang diberikan kepada Mangun Jaya Plafon.</p>
                </div>

                <div class="story-salam">
                    <p>Salam Hormat,<strong>Mangun Jaya Plafon</strong></p>
                </div>

                <div class="story-komitmen">
                    <p>Kami berkomitmen membangun kemitraan yang terpercaya dengan mengutamakan kebutuhan pelanggan serta memberikan produk dan layanan terbaik di setiap proses.</p>
                </div>

                <div class="ceo-card">
                    <div class="ceo-card__avatar">
                        <img src="{{ asset('image/ceo.jpg') }}" alt="Andre Saputra, S.T. - CEO & Co-founder Mangun Jaya Plafon" width="56" height="56" loading="lazy" onerror="this.style.display='none';this.parentElement.innerHTML='<svg viewBox=\'0 0 56 56\' fill=\'none\' xmlns=\'http://www.w3.org/2000/svg\'><rect width=\'56\' height=\'56\' fill=\'var(--color-surface-offset)\'/><circle cx=\'28\' cy=\'22\' r=\'10\' fill=\'var(--color-text-faint)\'/><ellipse cx=\'28\' cy=\'44\' rx=\'16\' ry=\'10\' fill=\'var(--color-text-faint)\'/></svg>';">
                    </div>
                    <div>
                        <div class="ceo-card__name">Andre Saputra, S.T.</div>
                        <div class="ceo-card__role">CEO &amp; Co-founder</div>
                    </div>
                </div>

                <div style="margin-top:var(--space-6);">
                    <a href="{{ route('contact') }}" class="btn btn--primary">Hubungi Kami <i data-lucide="arrow-right" style="width:16px;height:16px;"></i></a>
                </div>
            </div>

            <div class="reveal" style="border-radius:var(--radius-xl);overflow:hidden;aspect-ratio:1;background:var(--color-surface-offset);">
                <img src="{{ asset('image/store.png') }}" alt="Toko Mangun Jaya Plafon" width="700" height="700" loading="lazy" style="width:100%;height:100%;object-fit:cover;" onerror="this.src='https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=700&q=80'">
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
                        ['2020', 'Pendirian', 'Mangun Jaya Plafon resmi berdiri pada 30 Juli 2020, berkomitmen menjadi penyedia material plafon berkualitas.'],
                        ['2021', 'Ekspansi Produk', 'Mulai menyediakan Wall Panel PVC, Hollow Galvanis, dan aksesoris lengkap.'],
                        ['2022', 'Kepercayaan Pelanggan', 'Ratusan pelanggan setia dari Bekasi dan sekitar Jabodetabek.'],
                        ['2023', 'Tim Profesional', 'Memperkuat tim dengan tenaga ahli berpengalaman di bidang distribusi material bangunan.'],
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
                        ['award', 'Kualitas', 'Material terbaik dan produk berkualitas di setiap transaksi.'],
                        ['heart-handshake', 'Integritas', 'Jujur dalam penawaran harga dan transparan dalam proses.'],
                        ['users', 'Pelanggan', 'Kepuasan pelanggan adalah ukuran keberhasilan kami.'],
                        ['leaf', 'Komitmen', 'Berkomitmen memberikan pelayanan dan produk terbaik di setiap proses.'],
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
