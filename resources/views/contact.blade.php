@extends('layouts.app')
@section('title', 'Kontak')
@section('meta_desc', 'Hubungi Mangun Jaya untuk konsultasi gratis, survei, dan penawaran harga plafon terbaik. 1 Pusat + 4 Cabang di Bekasi.')

@section('content')
@push('styles')
<style>
    .contact-grid { display: grid; grid-template-columns: 1fr 1.4fr; gap: var(--space-12); align-items: start; }
    .contact-info__item { display: flex; gap: var(--space-4); align-items: flex-start; margin-bottom: var(--space-6); }
    .contact-info__icon { width: 44px; height: 44px; border-radius: var(--radius-md); background: var(--color-primary-light); display: flex; align-items: center; justify-content: center; color: var(--color-primary); flex-shrink: 0; }
    .contact-info__label { font-size: var(--text-xs); font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; color: var(--color-text-muted); margin-bottom: var(--space-1); }
    .contact-info__value { font-size: var(--text-base); font-weight: 500; color: var(--color-text); }
    .contact-info__value a { color: var(--color-primary); transition: color var(--transition); }
    .contact-info__value a:hover { color: var(--color-primary-hover); }
    .contact-form { background: var(--color-surface-2); border: 1px solid oklch(from var(--color-text) l c h / 0.07); border-radius: var(--radius-xl); padding: var(--space-8); box-shadow: var(--shadow-sm); }
    .form-group { margin-bottom: var(--space-5); }
    .form-label { display: block; font-size: var(--text-sm); font-weight: 600; color: var(--color-text); margin-bottom: var(--space-2); }
    .form-label span { color: var(--color-primary); }
    .form-control { width: 100%; padding: 0.75rem 1rem; font-size: var(--text-sm); font-family: var(--font-body); color: var(--color-text); background: var(--color-bg); border: 1.5px solid var(--color-border); border-radius: var(--radius-md); transition: border-color var(--transition), box-shadow var(--transition); appearance: none; }
    .form-control:focus { outline: none; border-color: var(--color-primary); box-shadow: 0 0 0 3px oklch(from var(--color-primary) l c h / 0.15); }
    .form-control::placeholder { color: var(--color-text-faint); }
    textarea.form-control { resize: vertical; min-height: 130px; }
    .form-error { font-size: var(--text-xs); color: #d32f2f; margin-top: var(--space-1); }
    .alert-success { background: #e8f5e9; border: 1px solid #a5d6a7; border-radius: var(--radius-md); padding: var(--space-4); font-size: var(--text-sm); color: #2e7d32; display: flex; align-items: center; gap: var(--space-2); margin-bottom: var(--space-6); }
    [data-theme="dark"] .alert-success { background: oklch(0.25 0.06 145 / 0.3); border-color: oklch(0.5 0.1 145 / 0.4); color: var(--color-success, #7db84a); }

    /* LOCATION TABS */
    .locations-section { margin-top: var(--space-16); }
    .locations-title { font-family: var(--font-display); font-size: var(--text-xl); font-weight: 800; margin-bottom: var(--space-2); }
    .locations-desc { font-size: var(--text-sm); color: var(--color-text-muted); margin-bottom: var(--space-8); }
    .loc-tabs { display: flex; gap: var(--space-2); flex-wrap: wrap; margin-bottom: var(--space-6); }
    .loc-tab { padding: var(--space-2) var(--space-4); border-radius: var(--radius-full); font-size: var(--text-sm); font-weight: 600; border: 1.5px solid var(--color-border); color: var(--color-text-muted); background: transparent; cursor: pointer; transition: all var(--transition); white-space: nowrap; }
    .loc-tab:hover { border-color: var(--color-primary); color: var(--color-primary); background: var(--color-primary-light); }
    .loc-tab.active { background: var(--color-primary); border-color: var(--color-primary); color: #fff; }
    .loc-panel { display: none; }
    .loc-panel.active { display: block; }
    .loc-card { display: grid; grid-template-columns: 1fr 1.8fr; gap: var(--space-8); align-items: start; background: var(--color-surface-2); border: 1px solid oklch(from var(--color-text) l c h / 0.07); border-radius: var(--radius-xl); padding: var(--space-8); box-shadow: var(--shadow-sm); }
    .loc-badge { display: inline-flex; align-items: center; gap: var(--space-1); padding: 0.25rem 0.75rem; border-radius: var(--radius-full); font-size: var(--text-xs); font-weight: 700; text-transform: uppercase; letter-spacing: 0.06em; margin-bottom: var(--space-3); }
    .loc-badge--pusat { background: var(--color-primary); color: #fff; }
    .loc-badge--cabang { background: var(--color-primary-light); color: var(--color-primary); }
    .loc-name { font-family: var(--font-display); font-size: var(--text-lg); font-weight: 700; margin-bottom: var(--space-2); }
    .loc-address { font-size: var(--text-sm); color: var(--color-text-muted); line-height: 1.75; margin-bottom: var(--space-5); }
    .loc-actions { display: flex; flex-direction: column; gap: var(--space-3); }
    .loc-map { border-radius: var(--radius-lg); overflow: hidden; border: 1px solid var(--color-border); aspect-ratio: 4/3; background: var(--color-surface-offset); }
    .loc-map iframe { width: 100%; height: 100%; border: none; display: block; }
    @media (max-width: 768px) {
        .contact-grid { grid-template-columns: 1fr; }
        .loc-card { grid-template-columns: 1fr; }
        .loc-map { aspect-ratio: 16/9; }
    }
</style>
@endpush

<div class="page-hero">
    <div class="container">
        <div class="page-hero__eyebrow">Kontak</div>
        <h1 class="page-hero__title">Hubungi Kami<br>Kapan Saja</h1>
        <p class="page-hero__desc">Dapatkan konsultasi gratis dan survei lokasi tanpa biaya. 1 Pusat + 4 Cabang siap melayani Anda di Bekasi.</p>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="contact-grid">
            <!-- Info -->
            <div class="reveal">
                <div class="section-header">
                    <div class="section-header__eyebrow">Informasi</div>
                    <h2 class="section-header__title" style="font-size:var(--text-xl);">Kami Siap<br>Melayani Anda</h2>
                </div>
                <div style="margin-top:var(--space-8);">
                    <div class="contact-info__item">
                        <div class="contact-info__icon"><i data-lucide="map-pin" style="width:20px;height:20px;"></i></div>
                        <div>
                            <div class="contact-info__label">Kantor Pusat</div>
                            <div class="contact-info__value">Jl. Raya Mangun Jaya No.197<br>Tambun Selatan, Kab. Bekasi 17510</div>
                        </div>
                    </div>
                    <div class="contact-info__item">
                        <div class="contact-info__icon"><i data-lucide="building-2" style="width:20px;height:20px;"></i></div>
                        <div>
                            <div class="contact-info__label">Jaringan</div>
                            <div class="contact-info__value">1 Pusat + 4 Cabang<br>di wilayah Bekasi Raya</div>
                        </div>
                    </div>
                    <div class="contact-info__item">
                        <div class="contact-info__icon"><i data-lucide="phone" style="width:20px;height:20px;"></i></div>
                        <div>
                            <div class="contact-info__label">Telepon</div>
                            <div class="contact-info__value"><a href="tel:+6282310719177">+62 823-1071-9177</a></div>
                        </div>
                    </div>
                    <div class="contact-info__item">
                        <div class="contact-info__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/></svg>
                        </div>
                        <div>
                            <div class="contact-info__label">WhatsApp</div>
                            <div class="contact-info__value"><a href="https://wa.me/6282310719177" target="_blank" rel="noopener noreferrer">+62 823-1071-9177</a></div>
                        </div>
                    </div>
                    <div class="contact-info__item">
                        <div class="contact-info__icon"><i data-lucide="clock" style="width:20px;height:20px;"></i></div>
                        <div>
                            <div class="contact-info__label">Jam Operasional</div>
                            <div class="contact-info__value">Senin – Sabtu: 08.00 – 17.00<br>Minggu: 09.00 – 14.00</div>
                        </div>
                    </div>
                </div>
                <div style="margin-top:var(--space-6);">
                    <a href="https://wa.me/6282310719177?text=Halo%20Mangun%20Jaya%2C%20saya%20ingin%20konsultasi" target="_blank" rel="noopener noreferrer" class="btn btn--primary btn--lg" style="width:100%;justify-content:center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/></svg>
                        Chat WhatsApp Sekarang
                    </a>
                </div>
            </div>

            <!-- Form -->
            <div class="contact-form reveal">
                <h2 style="font-family:var(--font-display);font-size:var(--text-xl);font-weight:700;margin-bottom:var(--space-2);">Kirim Pesan</h2>
                <p style="font-size:var(--text-sm);color:var(--color-text-muted);margin-bottom:var(--space-6);">Isi formulir di bawah dan kami akan menghubungi Anda segera.</p>

                @if(session('success'))
                <div class="alert-success">
                    <i data-lucide="check-circle" style="width:18px;height:18px;flex-shrink:0;"></i>
                    {{ session('success') }}
                </div>
                @endif

                <form action="{{ route('contact.send') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="form-label">Nama Lengkap <span>*</span></label>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Masukkan nama Anda" required autocomplete="name">
                        @error('name')<div class="form-error">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label for="phone" class="form-label">Nomor HP / WhatsApp <span>*</span></label>
                        <input type="tel" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" placeholder="Contoh: 0812-3456-7890" required autocomplete="tel">
                        @error('phone')<div class="form-error">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label for="subject" class="form-label">Kebutuhan</label>
                        <select id="subject" name="subject" class="form-control">
                            <option value="">-- Pilih kebutuhan --</option>
                            <option value="Plafon Gypsum" {{ old('subject')=='Plafon Gypsum'?'selected':'' }}>Plafon Gypsum</option>
                            <option value="Plafon PVC" {{ old('subject')=='Plafon PVC'?'selected':'' }}>Plafon PVC</option>
                            <option value="Plafon GRC" {{ old('subject')=='Plafon GRC'?'selected':'' }}>Plafon GRC</option>
                            <option value="Partisi Gypsum" {{ old('subject')=='Partisi Gypsum'?'selected':'' }}>Partisi Gypsum</option>
                            <option value="Lainnya" {{ old('subject')=='Lainnya'?'selected':'' }}>Lainnya</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message" class="form-label">Pesan <span>*</span></label>
                        <textarea id="message" name="message" class="form-control @error('message') is-invalid @enderror" placeholder="Ceritakan kebutuhan Anda..." required>{{ old('message') }}</textarea>
                        @error('message')<div class="form-error">{{ $message }}</div>@enderror
                    </div>
                    <button type="submit" class="btn btn--primary btn--lg" style="width:100%;justify-content:center;">
                        <i data-lucide="send" style="width:18px;height:18px;"></i>
                        Kirim Pesan
                    </button>
                </form>
            </div>
        </div>

        <!-- LOCATIONS SECTION -->
        <div class="locations-section reveal">
            <h2 class="locations-title">Lokasi Kami</h2>
            <p class="locations-desc">1 Kantor Pusat + 4 Cabang tersebar di Bekasi Raya — pilih lokasi terdekat dari Anda.</p>

            <!-- Tab Buttons -->
            <div class="loc-tabs" role="tablist" aria-label="Pilih lokasi">
                <button class="loc-tab active" role="tab" aria-selected="true" aria-controls="panel-pusat" data-panel="pusat">
                    ⭐ Pusat
                </button>
                <button class="loc-tab" role="tab" aria-selected="false" aria-controls="panel-cab1" data-panel="cab1">
                    Cabang 1 – Setu
                </button>
                <button class="loc-tab" role="tab" aria-selected="false" aria-controls="panel-cab2" data-panel="cab2">
                    Cabang 2 – Rw. Kalong
                </button>
                <button class="loc-tab" role="tab" aria-selected="false" aria-controls="panel-cab3" data-panel="cab3">
                    Cabang 3 – Rw. Kalong 2
                </button>
                <button class="loc-tab" role="tab" aria-selected="false" aria-controls="panel-cab4" data-panel="cab4">
                    Cabang 4 – Bekasi Timur
                </button>
            </div>

            <!-- Pusat -->
            <div id="panel-pusat" class="loc-panel active" role="tabpanel">
                <div class="loc-card">
                    <div>
                        <span class="loc-badge loc-badge--pusat"><i data-lucide="star" style="width:12px;height:12px;"></i> Kantor Pusat</span>
                        <div class="loc-name">Mangun Jaya Plafon Pusat</div>
                        <p class="loc-address">Depan Pabrik Konveksi,<br>Jl. Raya Mangun Jaya No.197, RT.004/RW.002<br>Kec. Tambun Selatan, Kab. Bekasi<br>Jawa Barat 17510</p>
                        <div class="loc-actions">
                            <a href="https://maps.app.goo.gl/Nhb4qf1c4UjyAedw9" target="_blank" rel="noopener noreferrer" class="btn btn--primary" style="justify-content:center;">
                                <i data-lucide="navigation" style="width:16px;height:16px;"></i>
                                Buka di Google Maps
                            </a>
                            <a href="https://wa.me/6282310719177?text=Halo%2C%20saya%20ingin%20ke%20kantor%20pusat%20Mangun%20Jaya" target="_blank" rel="noopener noreferrer" class="btn btn--outline" style="justify-content:center;">
                                <i data-lucide="message-circle" style="width:16px;height:16px;"></i>
                                Tanya via WhatsApp
                            </a>
                        </div>
                    </div>
                    <div class="loc-map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521422841093!2d107.00229997499826!3d-6.219887993771678!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6988c2e6f1c5c9%3A0x8b7b5c3d2e4f1a2b!2sJl.%20Raya%20Mangun%20Jaya%20No.197%2C%20Mangun%20Jaya%2C%20Kec.%20Tambun%20Sel.%2C%20Kabupaten%20Bekasi%2C%20Jawa%20Barat%2017510!5e0!3m2!1sid!2sid!4v1721332800000!5m2!1sid!2sid"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                            title="Peta Mangun Jaya Plafon Pusat - Tambun Selatan Bekasi">
                        </iframe>
                    </div>
                </div>
            </div>

            <!-- Cabang 1 -->
            <div id="panel-cab1" class="loc-panel" role="tabpanel">
                <div class="loc-card">
                    <div>
                        <span class="loc-badge loc-badge--cabang">Cabang 1</span>
                        <div class="loc-name">Cabang Setu – Cikarang Barat</div>
                        <p class="loc-address">Jl. Raya Setu No.33<br>Mekarwangi, Kec. Cikarang Barat<br>Kabupaten Bekasi 17530</p>
                        <div class="loc-actions">
                            <a href="https://maps.app.goo.gl/2F9LYTJMNnWBE3tu5" target="_blank" rel="noopener noreferrer" class="btn btn--primary" style="justify-content:center;">
                                <i data-lucide="navigation" style="width:16px;height:16px;"></i>
                                Buka di Google Maps
                            </a>
                            <a href="https://wa.me/6282310719177?text=Halo%2C%20saya%20ingin%20ke%20cabang%20Setu%20Mangun%20Jaya" target="_blank" rel="noopener noreferrer" class="btn btn--outline" style="justify-content:center;">
                                <i data-lucide="message-circle" style="width:16px;height:16px;"></i>
                                Tanya via WhatsApp
                            </a>
                        </div>
                    </div>
                    <div class="loc-map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.0!2d107.1372!3d-6.2950!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698f!2sJl.%20Raya%20Setu%20No.33%2C%20Mekarwangi%2C%20Kec.%20Cikarang%20Bar.%2C%20Kabupaten%20Bekasi%2C%20Jawa%20Barat%2017530!5e0!3m2!1sid!2sid!4v1721332801000!5m2!1sid!2sid"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                            title="Peta Mangun Jaya Cabang Setu - Cikarang Barat">
                        </iframe>
                    </div>
                </div>
            </div>

            <!-- Cabang 2 -->
            <div id="panel-cab2" class="loc-panel" role="tabpanel">
                <div class="loc-card">
                    <div>
                        <span class="loc-badge loc-badge--cabang">Cabang 2</span>
                        <div class="loc-name">Cabang Rw. Kalong – Tambun Utara</div>
                        <p class="loc-address">Jl. Raya Rw. Kalong No.131<br>Karangsatria, Kec. Tambun Utara<br>Kabupaten Bekasi, Jawa Barat 17510</p>
                        <div class="loc-actions">
                            <a href="https://maps.app.goo.gl/VJrd2So5zJmJvnjP8" target="_blank" rel="noopener noreferrer" class="btn btn--primary" style="justify-content:center;">
                                <i data-lucide="navigation" style="width:16px;height:16px;"></i>
                                Buka di Google Maps
                            </a>
                            <a href="https://wa.me/6282310719177?text=Halo%2C%20saya%20ingin%20ke%20cabang%20Rw.%20Kalong%20131%20Mangun%20Jaya" target="_blank" rel="noopener noreferrer" class="btn btn--outline" style="justify-content:center;">
                                <i data-lucide="message-circle" style="width:16px;height:16px;"></i>
                                Tanya via WhatsApp
                            </a>
                        </div>
                    </div>
                    <div class="loc-map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.0!2d107.0132!3d-6.1980!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698f!2sJl.%20Raya%20Rw.%20Kalong%20No.131%2C%20Karangsatria%2C%20Kec.%20Tambun%20Utara%2C%20Kabupaten%20Bekasi%2C%20Jawa%20Barat%2017510!5e0!3m2!1sid!2sid!4v1721332802000!5m2!1sid!2sid"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                            title="Peta Mangun Jaya Cabang Rw. Kalong 131 - Tambun Utara">
                        </iframe>
                    </div>
                </div>
            </div>

            <!-- Cabang 3 -->
            <div id="panel-cab3" class="loc-panel" role="tabpanel">
                <div class="loc-card">
                    <div>
                        <span class="loc-badge loc-badge--cabang">Cabang 3</span>
                        <div class="loc-name">Cabang Rw. Kalong – Depan O!Save</div>
                        <p class="loc-address">Jl. Raya Rw. Kalong Depan O!Save No.125<br>Karangsatria, Kec. Tambun Utara<br>Kabupaten Bekasi, Jawa Barat 17510</p>
                        <div class="loc-actions">
                            <a href="https://maps.app.goo.gl/fwH4JwovmWQZZkyr6" target="_blank" rel="noopener noreferrer" class="btn btn--primary" style="justify-content:center;">
                                <i data-lucide="navigation" style="width:16px;height:16px;"></i>
                                Buka di Google Maps
                            </a>
                            <a href="https://wa.me/6282310719177?text=Halo%2C%20saya%20ingin%20ke%20cabang%20Rw.%20Kalong%20125%20Mangun%20Jaya" target="_blank" rel="noopener noreferrer" class="btn btn--outline" style="justify-content:center;">
                                <i data-lucide="message-circle" style="width:16px;height:16px;"></i>
                                Tanya via WhatsApp
                            </a>
                        </div>
                    </div>
                    <div class="loc-map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.0!2d107.0125!3d-6.1975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698f!2sJl.%20Raya%20Rw.%20Kalong%20No.125%2C%20Karangsatria%2C%20Kec.%20Tambun%20Utara%2C%20Kabupaten%20Bekasi%2C%20Jawa%20Barat%2017510!5e0!3m2!1sid!2sid!4v1721332803000!5m2!1sid!2sid"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                            title="Peta Mangun Jaya Cabang Rw. Kalong 125 - Tambun Utara">
                        </iframe>
                    </div>
                </div>
            </div>

            <!-- Cabang 4 -->
            <div id="panel-cab4" class="loc-panel" role="tabpanel">
                <div class="loc-card">
                    <div>
                        <span class="loc-badge loc-badge--cabang">Cabang 4</span>
                        <div class="loc-name">Cabang Bekasi Timur – Aren Jaya</div>
                        <p class="loc-address">Samping Bengkel Resmi Suzuki,<br>Jl. Setia Mekar No.130, RT.010/RW.008<br>Aren Jaya, Kec. Bekasi Timur<br>Kota Bekasi, Jawa Barat 17111</p>
                        <div class="loc-actions">
                            <a href="https://maps.app.goo.gl/yA1G8uQhj9qNB4MbA" target="_blank" rel="noopener noreferrer" class="btn btn--primary" style="justify-content:center;">
                                <i data-lucide="navigation" style="width:16px;height:16px;"></i>
                                Buka di Google Maps
                            </a>
                            <a href="https://wa.me/6282310719177?text=Halo%2C%20saya%20ingin%20ke%20cabang%20Bekasi%20Timur%20Mangun%20Jaya" target="_blank" rel="noopener noreferrer" class="btn btn--outline" style="justify-content:center;">
                                <i data-lucide="message-circle" style="width:16px;height:16px;"></i>
                                Tanya via WhatsApp
                            </a>
                        </div>
                    </div>
                    <div class="loc-map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.0!2d107.0215!3d-6.2380!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698f!2sJl.%20Setia%20Mekar%20No.130%2C%20Aren%20Jaya%2C%20Kec.%20Bekasi%20Tim.%2C%20Kota%20Bks%2C%20Jawa%20Barat%2017111!5e0!3m2!1sid!2sid!4v1721332804000!5m2!1sid!2sid"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                            title="Peta Mangun Jaya Cabang Bekasi Timur - Aren Jaya">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

@push('scripts')
<script>
    // Location tab switcher
    const tabs = document.querySelectorAll('.loc-tab');
    const panels = document.querySelectorAll('.loc-panel');
    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            const target = tab.dataset.panel;
            tabs.forEach(t => { t.classList.remove('active'); t.setAttribute('aria-selected', 'false'); });
            panels.forEach(p => p.classList.remove('active'));
            tab.classList.add('active');
            tab.setAttribute('aria-selected', 'true');
            document.getElementById('panel-' + target).classList.add('active');
        });
    });
</script>
@endpush

@endsection
