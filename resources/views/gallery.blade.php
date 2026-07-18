@extends('layouts.app')
@section('title', 'Galeri')
@section('meta_desc', 'Lihat hasil proyek plafon dan interior terbaik dari Mangun Jaya.')

@section('content')
@push('styles')
<style>
    .filter-bar { display: flex; gap: var(--space-2); flex-wrap: wrap; margin-bottom: var(--space-8); }
    .filter-btn { padding: var(--space-2) var(--space-4); border-radius: var(--radius-full); font-size: var(--text-sm); font-weight: 500; font-family: var(--font-body); border: 1.5px solid var(--color-border); color: var(--color-text-muted); background: var(--color-surface-2); transition: all var(--transition); cursor: pointer; }
    .filter-btn:hover, .filter-btn.active { background: var(--color-primary); border-color: var(--color-primary); color: #fff; }
    .gallery-grid { columns: 3 260px; column-gap: var(--space-4); }
    .gallery-item { break-inside: avoid; margin-bottom: var(--space-4); border-radius: var(--radius-lg); overflow: hidden; cursor: pointer; position: relative; background: var(--color-surface-offset); }
    .gallery-item img { width: 100%; display: block; transition: transform 0.4s ease; }
    .gallery-item:hover img { transform: scale(1.05); }
    .gallery-item__overlay { position: absolute; inset: 0; background: oklch(0.1 0.02 40 / 0); display: flex; align-items: flex-end; padding: var(--space-4); transition: background 0.3s ease; }
    .gallery-item:hover .gallery-item__overlay { background: oklch(0.1 0.02 40 / 0.55); }
    .gallery-item__label { color: #fff; font-size: var(--text-sm); font-weight: 600; opacity: 0; transform: translateY(6px); transition: opacity 0.3s ease, transform 0.3s ease; }
    .gallery-item:hover .gallery-item__label { opacity: 1; transform: none; }
    .lightbox { position: fixed; inset: 0; background: oklch(0.05 0 0 / 0.93); z-index: 999; display: none; align-items: center; justify-content: center; padding: var(--space-6); }
    .lightbox.open { display: flex; }
    .lightbox__img { max-width: 90vw; max-height: 85vh; border-radius: var(--radius-lg); object-fit: contain; }
    .lightbox__close { position: absolute; top: var(--space-4); right: var(--space-4); color: #fff; background: oklch(1 0 0 / 0.15); border-radius: var(--radius-md); padding: var(--space-2); transition: background var(--transition); }
    .lightbox__close:hover { background: oklch(1 0 0 / 0.3); }
</style>
@endpush

<div class="page-hero">
    <div class="container">
        <div class="page-hero__eyebrow">Galeri</div>
        <h1 class="page-hero__title">Karya-Karya<br>Terbaik Kami</h1>
        <p class="page-hero__desc">Ratusan proyek telah kami selesaikan dengan standar kualitas tertinggi di berbagai jenis bangunan.</p>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="filter-bar" role="group" aria-label="Filter kategori">
            @foreach($categories as $cat)
            <button class="filter-btn {{ $loop->first ? 'active' : '' }}" data-filter="{{ $cat }}">{{ $cat }}</button>
            @endforeach
        </div>
        <div class="gallery-grid" id="galleryGrid">
            @php
            $galleryItems = [
                ['url' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=600&q=80', 'label' => 'Plafon Gypsum - Rumah Modern', 'cat' => 'Rumah Tinggal'],
                ['url' => 'https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?w=600&q=80', 'label' => 'Ruang Tamu Minimalis', 'cat' => 'Rumah Tinggal'],
                ['url' => 'https://images.unsplash.com/photo-1560448075-cbc16bb4af8e?w=600&q=80', 'label' => 'Kantor Modern Jakarta', 'cat' => 'Kantor'],
                ['url' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=600&q=80', 'label' => 'Ruang Meeting Profesional', 'cat' => 'Kantor'],
                ['url' => 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=600&q=80', 'label' => 'Lobby Ruko Premium', 'cat' => 'Ruko'],
                ['url' => 'https://images.unsplash.com/photo-1616046229478-9901c5536a45?w=600&q=80', 'label' => 'Kamar Tidur Mewah', 'cat' => 'Rumah Tinggal'],
                ['url' => 'https://images.unsplash.com/photo-1582037928769-181f2644ecb7?w=600&q=80', 'label' => 'Koridor Hotel Bintang 4', 'cat' => 'Hotel'],
                ['url' => 'https://images.unsplash.com/photo-1540518614846-7eded433c457?w=600&q=80', 'label' => 'Kamar Mandi Plafon PVC', 'cat' => 'Rumah Tinggal'],
                ['url' => 'https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=600&q=80', 'label' => 'Ruang Keluarga Nyaman', 'cat' => 'Rumah Tinggal'],
                ['url' => 'https://images.unsplash.com/photo-1505693314120-0d443867891c?w=600&q=80', 'label' => 'Showroom Ruko Bekasi', 'cat' => 'Ruko'],
                ['url' => 'https://images.unsplash.com/photo-1564540586988-aa4e53c3d799?w=600&q=80', 'label' => 'Restoran Hotel', 'cat' => 'Hotel'],
                ['url' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&q=80', 'label' => 'Dapur Modern Minimalis', 'cat' => 'Rumah Tinggal'],
            ];
            @endphp
            @foreach($galleryItems as $item)
            <div class="gallery-item reveal" data-category="{{ $item['cat'] }}" onclick="openLightbox('{{ $item['url'] }}', '{{ $item['label'] }}')">
                <img src="{{ $item['url'] }}" alt="{{ $item['label'] }}" width="600" height="400" loading="lazy">
                <div class="gallery-item__overlay">
                    <span class="gallery-item__label">{{ $item['label'] }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Lightbox -->
<div class="lightbox" id="lightbox" role="dialog" aria-label="Tampilan foto" onclick="closeLightbox()">
    <button class="lightbox__close" onclick="closeLightbox()" aria-label="Tutup">
        <i data-lucide="x" style="width:24px;height:24px;"></i>
    </button>
    <img class="lightbox__img" id="lightboxImg" src="" alt="" loading="lazy">
</div>

@push('scripts')
<script>
function openLightbox(src, alt) {
    const lb = document.getElementById('lightbox');
    const img = document.getElementById('lightboxImg');
    img.src = src; img.alt = alt;
    lb.classList.add('open');
    document.body.style.overflow = 'hidden';
    lucide.createIcons();
}
function closeLightbox() {
    document.getElementById('lightbox').classList.remove('open');
    document.body.style.overflow = '';
}
document.addEventListener('keydown', (e) => { if(e.key === 'Escape') closeLightbox(); });

// Filter
const filterBtns = document.querySelectorAll('.filter-btn');
const galleryItems = document.querySelectorAll('.gallery-item');
filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        filterBtns.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        const filter = btn.dataset.filter;
        galleryItems.forEach(item => {
            const show = filter === 'Semua' || item.dataset.category === filter;
            item.style.display = show ? 'block' : 'none';
        });
    });
});
</script>
@endpush
@endsection
