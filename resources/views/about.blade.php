@extends('layouts.app')
@section('title', 'Tentang Kami')
@section('meta_desc', 'Kenali lebih dekat Mangun Jaya - perusahaan plafon dan interior terpercaya dengan pengalaman lebih dari 10 tahun.')

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
    @media (max-width: 480px) { .values-grid { grid-template-columns: 1fr; } }
</style>
@endpush

<div class="page-hero">
    <div class="container">
        <div class="page-hero__eyebrow">Tentang Kami</div>
        <h1 class="page-hero__title">Dedikasi Kami untuk<br>Hunian Terbaik Anda</h1>
        <p class="page-hero__desc">Lebih dari satu dekade, kami telah menjadi mitra terpercaya dalam solusi plafon dan interior berkualitas.</p>
    </div>
</div>

<!-- STORY -->
<section class="section">
    <div class="container">
        <div class="grid-2" style="align-items:center;gap:var(--space-16);">
            <div class="reveal">
                <div class="section-header">
                    <div class="section-header__eyebrow">Kisah Kami</div>
                    <h2 class="section-header__title">Dari Bengkel Kecil<br>Menjadi Kepercayaan Ribuan Keluarga</h2>
                </div>
                <p style="color:var(--color-text-muted);line-height:1.8;margin-bottom:var(--space-4);">Mangun Jaya dimulai pada tahun 2014 dari sebuah bengkel kecil di Bekasi. Berangkat dari semangat untuk memberikan solusi interior yang terjangkau namun berkualitas, kami tumbuh menjadi salah satu penyedia plafon terpercaya di Jawa Barat.</p>
                <p style="color:var(--color-text-muted);line-height:1.8;margin-bottom:var(--space-6);">Dengan lebih dari 500 proyek yang telah selesai dan ratusan pelanggan setia, kami terus berinovasi menghadirkan produk dan layanan terbaik untuk setiap kebutuhan Anda.</p>
                <a href="{{ route('contact') }}" class="btn btn--primary">Hubungi Kami <i data-lucide="arrow-right" style="width:16px;height:16px;"></i></a>
            </div>
            <div class="reveal" style="border-radius:var(--radius-xl);overflow:hidden;aspect-ratio:1;background:var(--color-surface-offset);">
                <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=700&q=80" alt="Workshop Mangun Jaya" width="700" height="700" loading="lazy" style="width:100%;height:100%;object-fit:cover;">
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
                        ['2014', 'Pendirian', 'Mangun Jaya resmi berdiri di Bekasi dengan fokus pemasangan plafon gypsum.'],
                        ['2016', 'Ekspansi Produk', 'Mulai menyediakan plafon PVC dan GRC untuk memenuhi permintaan yang beragam.'],
                        ['2018', 'Tim Profesional', 'Membentuk tim instalasi bersertifikat dengan standar keamanan kerja tinggi.'],
                        ['2020', '300 Proyek', 'Menyelesaikan proyek ke-300 dan membuka toko material plafon.'],
                        ['2024', '500+ Proyek', 'Melampaui 500 proyek dengan ekspansi layanan ke seluruh Jabodetabek.'],
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
                        ['award', 'Kualitas', 'Material terbaik dan pengerjaan presisi di setiap proyek.'],
                        ['heart-handshake', 'Integritas', 'Jujur dalam penawaran harga dan transparan dalam proses.'],
                        ['users', 'Pelanggan', 'Kepuasan pelanggan adalah ukuran keberhasilan kami.'],
                        ['leaf', 'Inovasi', 'Terus belajar dan mengadopsi teknik terbaru di industri.'],
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
                ['Bapak Sugeng', 'Pendiri & Direktur', 'https://i.pravatar.cc/400?img=11'],
                ['Pak Hendra', 'Kepala Instalasi', 'https://i.pravatar.cc/400?img=12'],
                ['Bu Rina', 'Manajer Operasional', 'https://i.pravatar.cc/400?img=48'],
            ] as $member)
            <div class="team-card reveal">
                <div class="team-card__img">
                    <img src="{{ $member[2] }}" alt="{{ $member[0] }}" width="400" height="400" loading="lazy">
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
