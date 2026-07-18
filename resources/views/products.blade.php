@extends('layouts.app')
@section('title', 'Produk')
@section('meta_desc', 'Temukan berbagai produk plafon dan interior berkualitas dari Mangun Jaya - gypsum, PVC, GRC, dan lebih banyak lagi.')

@section('content')
@push('styles')
<style>
    .product-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(min(320px,100%), 1fr)); gap: var(--space-6); }
    .product-item { background: var(--color-surface-2); border: 1px solid oklch(from var(--color-text) l c h / 0.07); border-radius: var(--radius-xl); overflow: hidden; transition: box-shadow var(--transition), transform var(--transition); }
    .product-item:hover { box-shadow: var(--shadow-md); transform: translateY(-3px); }
    .product-item__img { aspect-ratio: 16/9; background: var(--color-surface-offset); position: relative; overflow: hidden; }
    .product-item__img img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.45s ease; }
    .product-item:hover .product-item__img img { transform: scale(1.05); }
    .product-item__tag { position: absolute; top: var(--space-3); left: var(--space-3); }
    .product-item__body { padding: var(--space-5) var(--space-6) var(--space-6); }
    .product-item__name { font-family: var(--font-display); font-size: var(--text-lg); font-weight: 700; margin-bottom: var(--space-2); }
    .product-item__desc { font-size: var(--text-sm); color: var(--color-text-muted); line-height: 1.65; margin-bottom: var(--space-4); }
    .product-item__cta { display: inline-flex; align-items: center; gap: var(--space-2); font-size: var(--text-sm); font-weight: 600; color: var(--color-primary); transition: gap var(--transition); }
    .product-item__cta:hover { gap: var(--space-3); }
</style>
@endpush

<div class="page-hero">
    <div class="container">
        <div class="page-hero__eyebrow">Produk</div>
        <h1 class="page-hero__title">Produk &amp; Material<br>Berkualitas Tinggi</h1>
        <p class="page-hero__desc">Kami menyediakan berbagai jenis plafon dan material interior pilihan dengan standar kualitas terjamin.</p>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="product-grid">
            @php
            $images = [
                'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&q=80',
                'https://images.unsplash.com/photo-1600585154526-990dced4db0d?w=600&q=80',
                'https://images.unsplash.com/photo-1600566752355-35792bedcfea?w=600&q=80',
                'https://images.unsplash.com/photo-1600573472591-ee6981cf35b6?w=600&q=80',
                'https://images.unsplash.com/photo-1600047509807-ba8f99d2cdde?w=600&q=80',
                'https://images.unsplash.com/photo-1583847268964-b28dc8f51f92?w=600&q=80',
                'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=600&q=80',
                'https://images.unsplash.com/photo-1507089947368-19c1da9775ae?w=600&q=80',
            ];
            @endphp
            @foreach($products as $i => $product)
            <div class="product-item reveal">
                <div class="product-item__img">
                    <img src="{{ $images[$i % count($images)] }}" alt="{{ $product['name'] }}" width="600" height="338" loading="lazy">
                    @if($product['tag'])
                    <div class="product-item__tag">
                        <span class="badge badge--gold">{{ $product['tag'] }}</span>
                    </div>
                    @endif
                </div>
                <div class="product-item__body">
                    <h3 class="product-item__name">{{ $product['name'] }}</h3>
                    <p class="product-item__desc">{{ $product['desc'] }}</p>
                    <a href="https://wa.me/6282310719177?text=Halo%2C%20saya%20ingin%20tanya%20tentang%20{{ urlencode($product['name']) }}" target="_blank" rel="noopener noreferrer" class="product-item__cta">
                        Tanya Harga <i data-lucide="arrow-right" style="width:14px;height:14px;"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA -->
<section class="section section--alt">
    <div class="container" style="text-align:center;">
        <div class="section-header section-header--center">
            <div class="section-header__eyebrow">Butuh Konsultasi?</div>
            <h2 class="section-header__title">Tidak Yakin Produk<br>Mana yang Tepat?</h2>
            <p class="section-header__desc">Tim ahli kami siap membantu Anda memilih produk yang paling sesuai dengan kebutuhan dan anggaran.</p>
        </div>
        <a href="https://wa.me/6282310719177" target="_blank" rel="noopener noreferrer" class="btn btn--primary btn--lg reveal">
            <i data-lucide="message-circle" style="width:18px;height:18px;"></i>
            Konsultasi via WhatsApp
        </a>
    </div>
</section>
@endsection
