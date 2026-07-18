<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = [
            ['name' => 'Plafon PVC', 'desc' => 'Anti air, anti rayap, ringan dan mudah dipasang. Pilihan terbaik untuk hunian, ruko, dan perkantoran.', 'icon' => 'layers'],
            ['name' => 'Wall Panel PVC', 'desc' => 'Panel dinding PVC estetis dan tahan lama, tersedia berbagai motif untuk interior modern.', 'icon' => 'layout-panel-left'],
            ['name' => 'Lis PVC', 'desc' => 'List profil PVC untuk finishing sudut plafon dan dinding, tampak rapi dan mewah.', 'icon' => 'minus-square'],
            ['name' => 'Hollow Galvanis', 'desc' => 'Rangka hollow baja galvanis anti karat, kuat dan presisi untuk konstruksi plafon dan partisi.', 'icon' => 'grid-2x2'],
            ['name' => 'Rangka Plafon', 'desc' => 'Rangka metal furing berkualitas tinggi untuk struktur plafon yang kokoh dan tahan lama.', 'icon' => 'frame'],
            ['name' => 'Aksesoris', 'desc' => 'Kelengkapan aksesoris pemasangan plafon, mulai dari klem, bracket, hingga komponen pendukung lainnya.', 'icon' => 'package'],
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
            [
                'name' => 'Plafon PVC',
                'desc' => 'Anti air, anti rayap, ringan dan mudah dipasang. Cocok untuk rumah, ruko, kantor, hingga proyek skala besar. Tersedia berbagai motif dan warna.',
                'tag' => 'Terlaris',
                'icon' => 'layers',
            ],
            [
                'name' => 'Wall Panel PVC',
                'desc' => 'Panel dinding PVC modern dan estetis. Tahan lembab, mudah dibersihkan, dan tersedia dalam berbagai pilihan motif untuk interior yang memukau.',
                'tag' => 'Populer',
                'icon' => 'layout-panel-left',
            ],
            [
                'name' => 'Lis PVC',
                'desc' => 'List profil PVC untuk finishing tepi plafon dan pertemuan dinding. Memberikan kesan rapi, bersih, dan mewah pada setiap sudut ruangan.',
                'tag' => null,
                'icon' => 'minus-square',
            ],
            [
                'name' => 'Hollow Galvanis',
                'desc' => 'Besi hollow baja galvanis anti karat dengan dimensi presisi. Ideal untuk rangka plafon, partisi, dan berbagai kebutuhan konstruksi bangunan.',
                'tag' => null,
                'icon' => 'grid-2x2',
            ],
            [
                'name' => 'Rangka Plafon',
                'desc' => 'Rangka metal furing dan channel berkualitas tinggi. Struktur rangka yang kuat, ringan, dan tahan lama untuk pemasangan plafon yang sempurna.',
                'tag' => null,
                'icon' => 'frame',
            ],
            [
                'name' => 'Aksesoris',
                'desc' => 'Kelengkapan aksesoris pemasangan plafon PVC dan wall panel, termasuk klem, bracket, dan berbagai komponen pendukung instalasi.',
                'tag' => null,
                'icon' => 'package',
            ],
            [
                'name' => 'Lem',
                'desc' => 'Lem khusus untuk pemasangan plafon PVC dan wall panel. Formula kuat dan tahan lama, memastikan material terpasang dengan aman dan rapi.',
                'tag' => null,
                'icon' => 'droplets',
            ],
            [
                'name' => 'Sekrup',
                'desc' => 'Sekrup berkualitas tinggi untuk instalasi rangka dan plafon. Tersedia berbagai ukuran sesuai kebutuhan proyek Anda.',
                'tag' => null,
                'icon' => 'settings-2',
            ],
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
            'name'    => 'required|string|max:100',
            'phone'   => 'required|string|max:20',
            'message' => 'required|string|max:1000',
        ]);

        // Di sini bisa ditambahkan logic kirim email / simpan ke DB
        return back()->with('success', 'Pesan Anda telah terkirim. Kami akan menghubungi Anda segera!');
    }
}
