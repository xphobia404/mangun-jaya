<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = [
            ['name' => 'Plafon Gypsum', 'desc' => 'Material ringan, mudah dibentuk, cocok untuk hunian modern.', 'icon' => 'home'],
            ['name' => 'Plafon PVC', 'desc' => 'Anti air, anti rayap, cocok untuk kamar mandi dan dapur.', 'icon' => 'droplets'],
            ['name' => 'Plafon GRC', 'desc' => 'Kuat dan tahan lama, ideal untuk bangunan komersial.', 'icon' => 'building-2'],
            ['name' => 'Partisi Gypsum', 'desc' => 'Pemisah ruangan fleksibel dengan finishing yang rapi.', 'icon' => 'layout'],
            ['name' => 'Rangka Metal', 'desc' => 'Rangka baja ringan untuk plafon dan partisi berkualitas tinggi.', 'icon' => 'grid'],
            ['name' => 'Aksesoris Plafon', 'desc' => 'List profil, lis plafon, dan aksesoris pendukung lainnya.', 'icon' => 'package'],
        ];

        $testimonials = [
            ['name' => 'Budi Santoso', 'role' => 'Pemilik Ruko', 'text' => 'Hasil pengerjaan sangat rapi dan profesional. Tim Mangun Jaya bekerja tepat waktu dan hasilnya memuaskan.'],
            ['name' => 'Sari Dewi', 'role' => 'Ibu Rumah Tangga', 'text' => 'Plafon rumah saya terlihat jauh lebih indah setelah menggunakan jasa Mangun Jaya. Harga juga sangat terjangkau.'],
            ['name' => 'Hendra Wijaya', 'role' => 'Kontraktor', 'text' => 'Sudah berkali-kali order material di sini. Kualitas terjamin dan pengiriman selalu on time.'],
        ];

        return view('home', compact('products', 'testimonials'));
    }

    public function about()
    {
        return view('about');
    }

    public function products()
    {
        $products = [
            ['name' => 'Plafon Gypsum', 'desc' => 'Material ringan, mudah dibentuk, ideal untuk desain interior modern. Tersedia dalam berbagai ukuran dan ketebalan.', 'tag' => 'Populer'],
            ['name' => 'Plafon PVC', 'desc' => 'Tahan air dan anti rayap, pilihan terbaik untuk area basah. Mudah dibersihkan dan tahan lama.', 'tag' => 'Terlaris'],
            ['name' => 'Plafon GRC', 'desc' => 'Kekuatan tinggi dengan bobot yang lebih ringan dibanding beton. Cocok untuk proyek komersial dan industrial.', 'tag' => null],
            ['name' => 'Plafon Akustik', 'desc' => 'Peredam suara terbaik untuk studio, ruang rapat, dan bioskop. Meningkatkan kenyamanan akustik ruangan.', 'tag' => null],
            ['name' => 'Partisi Gypsum', 'desc' => 'Pembagi ruangan yang fleksibel dan estetis. Instalasi cepat dengan hasil akhir yang halus dan bersih.', 'tag' => null],
            ['name' => 'Rangka Metal Furing', 'desc' => 'Rangka baja ringan anti karat untuk struktur plafon dan partisi. Kuat, ringan, dan presisi.', 'tag' => null],
            ['name' => 'List Plafon', 'desc' => 'Finishing tepi plafon dengan berbagai motif profil. Memberi kesan mewah dan rapi pada sudut ruangan.', 'tag' => null],
            ['name' => 'Compound & Compound Tools', 'desc' => 'Bahan pengisi dan perata sambungan gypsum. Hasil sambungan yang tidak terlihat dan mulus.', 'tag' => null],
        ];
        return view('products', compact('products'));
    }

    public function gallery()
    {
        $categories = ['Semua', 'Rumah Tinggal', 'Kantor', 'Ruko', 'Hotel'];
        return view('gallery', compact('categories'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function sendContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            'message' => 'required|string|max:1000',
        ]);

        // Di sini bisa ditambahkan logic kirim email / simpan ke DB
        return back()->with('success', 'Pesan Anda telah terkirim. Kami akan menghubungi Anda segera!');
    }
}
