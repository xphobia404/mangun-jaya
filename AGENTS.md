# Mangun Jaya Company Website

Ini adalah website company profile untuk **Mangun Jaya Plafon** - spesialis plafon dan interior.

## Tech Stack
- **Backend**: Laravel (PHP)
- **Frontend**: Blade templating + vanilla JS + CSS custom properties
- **Icons**: Lucide Icons (CDN)
- **Fonts**: Fraunces (display) + Plus Jakarta Sans (body) via Google Fonts

## Struktur Halaman
- `/` - Beranda (Hero, Produk, Why Us, Testimoni, CTA)
- `/tentang` - Tentang Kami (Story, Milestones, Tim, Nilai)
- `/produk` - Daftar Produk
- `/galeri` - Galeri Proyek (dengan filter & lightbox)
- `/kontak` - Halaman Kontak (form + maps)

## Konfigurasi yang Perlu Diupdate
1. **Nomor WhatsApp**: Ganti `6281234567890` di `layouts/app.blade.php` dan semua view
2. **Alamat**: Update di `contact.blade.php` dan footer
3. **Google Maps**: Update embed URL di `contact.blade.php`
4. **Foto Tim**: Ganti URL foto di `about.blade.php`
5. **Statistik**: Update angka di hero section `home.blade.php`

## Setup
```bash
cp .env.example .env
php artisan key:generate
php artisan serve
```
