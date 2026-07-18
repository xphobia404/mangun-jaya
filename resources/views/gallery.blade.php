@extends('layouts.app')
@section('title', 'Galeri')
@section('meta_desc', 'Lihat hasil proyek plafon dan interior terbaik dari Mangun Jaya - ratusan proyek sukses di berbagai jenis bangunan.')

@section('content')
@push('styles')
<style>
    .filter-bar { display: flex; gap: var(--space-2); flex-wrap: wrap; margin-bottom: var(--space-8); }
    .filter-btn { padding: var(--space-2) var(--space-4); border-radius: var(--radius-full); font-size: var(--text-sm); font-weight: 500; font-family: var(--font-body); border: 1.5px solid var(--color-border); color: var(--color-text-muted); background: var(--color-surface-2); transition: all var(--transition); cursor: pointer; }
    .filter-btn:hover, .filter-btn.active { background: var(--color-primary); border-color: var(--color-primary); color: #fff; }
    .gallery-grid { columns: 3 280px; column-gap: var(--space-4); }
    .gallery-item { break-inside: avoid; margin-bottom: var(--space-4); border-radius: var(--radius-lg); overflow: hidden; cursor: pointer; position: relative; }
    .gallery-item img { width: 100%; display: block; transition: transform 0.4s ease; }
    .gallery-item:hover img { transform: scale(1.04); }
    .gallery-item__overlay { position: absolute; inset: 0; background: oklch(0.1 0.02 40 / 0); display: flex; align-items: flex-end; padding: var(--space-4); transition: background 0.3s ease; }
    .gallery-item:hover .gallery-item__overlay { background: oklch(0.1 0.02 40 / 0.5); }
    .gallery-item__label { color: #fff; font-size: var(--text-sm); font-weight: 600; opacity: 0; transform: translateY(8px); transition: opacity 0.3s ease, transform 0.3s ease; }
    .gallery-item:hover .gallery-item__label { opacity: 1; transform: none; }
    /* Lightbox */
    .lightbox { position: fixed; inset: 0; background: oklch(0.05 0 0 / 0.92); z-index: 999; display: none; align-items: center;