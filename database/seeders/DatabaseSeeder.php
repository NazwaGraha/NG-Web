<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Article;
use App\Models\Gallery;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Super User (Root Access - Always seeded, hidden in table)
        User::updateOrCreate(
            ['email' => 'nazwagraha@gmail.com'],
            [
                'name' => 'Super User NazwaGraha',
                'role' => 'super_user',
                'password' => Hash::make('*Kake1978#!!!'),
            ]
        );

        // 2. Supervisor User (Full Access)
        User::updateOrCreate(
            ['email' => 'supervisor@nazwagraha.com'],
            [
                'name' => 'Supervisor NazwaGraha',
                'role' => 'supervisor',
                'password' => Hash::make('Password123!'),
            ]
        );

        // 3. Admin User (Input & Edit Access, No Delete Privilege)
        User::updateOrCreate(
            ['email' => 'admin@nazwagraha.com'],
            [
                'name' => 'Administrator NazwaGraha',
                'role' => 'admin',
                'password' => Hash::make('Password123!'),
            ]
        );

        // 2. Categories
        $categories = [
            [
                'name' => 'Pembuatan Website',
                'slug' => 'pembuatan-website',
                'description' => 'Panduan dan wawasan seputar pembuatan website profesional, toko online, dan web app modern.'
            ],
            [
                'name' => 'Jaringan LAN & Server',
                'slug' => 'jaringan-lan-server',
                'description' => 'Solusi dan panduan instalasi jaringan kantor, Mikrotik, Wi-Fi bisnis, dan server rack.'
            ],
            [
                'name' => 'SEO & AI Search (GEO)',
                'slug' => 'seo-ai-search-geo',
                'description' => 'Strategi optimasi mesin pencari Google dan Generative Engine Optimization untuk AI seperti Perplexity & ChatGPT.'
            ],
            [
                'name' => 'Pengadaan Hardware IT',
                'slug' => 'pengadaan-hardware-it',
                'description' => 'Tips pengadaan komputer, laptop bisnis, UPS, dan infrastruktur IT instansi.'
            ],
            [
                'name' => 'Troubleshooting Komputer',
                'slug' => 'troubleshooting-komputer',
                'description' => 'Solusi praktis menangani kendala teknis PC, keamanan data, dan pemeliharaan berkala.'
            ],
        ];

        $catModels = [];
        foreach ($categories as $cat) {
            $catModels[$cat['slug']] = Category::firstOrCreate(['slug' => $cat['slug']], $cat);
        }

        // 3. Articles
        $articles = [
            [
                'category_id' => $catModels['pembuatan-website']->id,
                'title' => 'Panduan Lengkap Memilih Jasa Pembuatan Website Perusahaan Profesional di Tahun 2026',
                'slug' => 'panduan-memilih-jasa-pembuatan-website-perusahaan-2026',
                'excerpt' => 'Website bisnis bukan sekadar kartu nama digital, melainkan mesin konversi penjualan. Ketahui standar penting sebelum memilih vendor pembuatan web.',
                'content' => '<p>Di era digital saat ini, kehadiran website yang cepat dan kredibel menjadi penentu utama apakah calon klien akan menghubungi bisnis Anda atau berpindah ke kompetitor.</p><h3>1. Kecepatan Loading (Google Core Web Vitals)</h3><p>Riset Google menunjukkan bahwa lebih dari 53% pengunjung meninggalkan website yang memuat lebih dari 3 detik. Pastikan website Anda dibangun dengan arsitektur kode bersih dan lolos skor PageSpeed 90+.</p><h3>2. Desain Responsif & Mobile-First</h3><p>Mayoritas pengambil keputusan bisnis di Indonesia mencari informasi melalui smartphone. Tombol Call-to-Action (CTA) seperti WhatsApp harus mudah dijangkau oleh ibu jari.</p><h3>3. Kejelasan Legalitas & Garansi Maintenance</h3><p>Pilihlah vendor terpercaya seperti <strong>NazwaGraha Pratama</strong> yang menyediakan jaminan garansi pemeliharaan, keamanan hosting cloud, dan bantuan teknis responsif.</p>',
                'featured_image' => 'images/portfolio_web_collection.jpg',
                'meta_title' => 'Jasa Pembuatan Website Perusahaan Profesional Terbaik 2026',
                'meta_description' => 'Tips memilih vendor jasa pembuatan website bisnis profesional, cepat, bergaransi, dan ramah Google PageSpeed dari NazwaGraha Pratama.',
                'is_published' => true,
                'views' => 124,
                'published_at' => now(),
            ],
            [
                'category_id' => $catModels['seo-ai-search-geo']->id,
                'title' => 'Mengenal Generative Engine Optimization (GEO): Strategi Tampil di Rekomendasi ChatGPT & Perplexity',
                'slug' => 'mengenal-generative-engine-optimization-geo-ai-search',
                'excerpt' => 'Mesin pencari masa kini tidak hanya Google. Pelajari bagaimana GEO membuat bisnis Anda menjadi rujukan utama jawaban kecerdasan buatan.',
                'content' => '<p>Generative Engine Optimization (GEO) adalah evolusi dari SEO tradisional. Ketika pengguna bertanya pada ChatGPT, Gemini, atau Perplexity: <em>"Rekomendasi vendor IT terbaik di Bogor dan Jakarta?"</em>, sistem AI akan menelusuri entitas data terstruktur.</p><h3>Bagaimana Mengoptimalkan GEO?</h3><p>1. <strong>Penerapan Schema.org Mendalam:</strong> Gunakan skema LocalBusiness dan ITService yang terverifikasi.<br>2. <strong>Otoritas Topikal (Topical Authority):</strong> Sajikan informasi yang menjawab kebutuhan nyata calon klien.<br>3. <strong>Kutipan & Konsistensi Entitas:</strong> Pastikan nama bisnis, nomor telepon, dan alamat konsisten di seluruh internet.</p>',
                'featured_image' => 'images/web_mockup_showcase.jpg',
                'meta_title' => 'Apa Itu GEO (Generative Engine Optimization)? Panduan AI Search',
                'meta_description' => 'Pelajari teknik Generative Engine Optimization (GEO) agar website dan bisnis Anda direferensikan oleh ChatGPT, Perplexity, dan Gemini AI.',
                'is_published' => true,
                'views' => 98,
                'published_at' => now()->subDay(),
            ],
            [
                'category_id' => $catModels['jaringan-lan-server']->id,
                'title' => 'Pentingnya Penataan Kabel Jaringan (Cable Management) LAN & Server di Kantor',
                'slug' => 'pentingnya-penataan-kabel-jaringan-lan-server-kantor',
                'excerpt' => 'Kabel semrawut di lantai bukan hanya merusak estetika, tapi juga membahayakan keselamatan dan memperlambat penanganan saat internet bermasalah.',
                'content' => '<p>Instalasi jaringan kantor yang rapi menggunakan standar kabel Cat6, patch panel, dan rak server tertutup memberikan dampak langsung pada keandalan operasional perusahaan.</p><h3>Keuntungan Instalasi Jaringan Profesional:</h3><p>• <strong>Identifikasi Masalah Cepat:</strong> Setiap titik kabel terlabel jelas dengan nomor port.<br>• <strong>Sirkulasi Udara Server Optimal:</strong> Mencegah perangkat switch dan router mengalami overheating.<br>• <strong>Koneksi Wi-Fi Stabil:</strong> Pembagian bandwidth proporsional menggunakan router Mikrotik berkonfigurasi tepat.</p><p>Tim teknisi <strong>NazwaGraha Pratama</strong> siap melakukan survey lokasi on-site untuk merapikan dan mengoptimalkan jaringan kantor Anda.</p>',
                'featured_image' => 'images/lan_server_infrastructure.jpg',
                'meta_title' => 'Jasa Instalasi & Penataan Jaringan LAN Kantor Rapi Bergaransi',
                'meta_description' => 'Solusi instalasi jaringan LAN kantor, penataan kabel patch panel, setting Mikrotik, dan server rack profesional dari NazwaGraha Pratama.',
                'is_published' => true,
                'views' => 76,
                'published_at' => now()->subDays(2),
            ],
            [
                'category_id' => $catModels['pengadaan-hardware-it']->id,
                'title' => 'Strategi Pengadaan Komputer Kantor: Pilih PC Rakitan Spesifikasi Khusus atau PC Built-Up?',
                'slug' => 'strategi-pengadaan-komputer-kantor-rakitan-vs-built-up',
                'excerpt' => 'Menimbang efisiensi anggaran belanja IT perusahaan antara PC rakitan bergaransi komponen dan komputer branded untuk karyawan.',
                'content' => '<p>Pengadaan perangkat komputer kantor memerlukan perhitungan jangka panjang terkait kebutuhan komputasi, kemudahan upgrade, serta ketersediaan garansi resmi.</p><h3>1. Kebutuhan Staf Administrasi vs Tim Desain/Koding</h3><p>Staf administrasi membutuhkan prosesor hemat daya dengan SSD NVMe cepat, sementara tim teknis membutuhkan RAM minimal 16GB dan kartu grafis dedicated.</p><h3>2. Layanan Purna Jual & Servis Berkala</h3><p>Pastikan vendor pengadaan menyediakan unit cadangan serta layanan pemeliharaan berkala agar proses kerja kantor tidak terhenti saat terjadi kerusakan tak terduga.</p>',
                'featured_image' => 'images/it_hardware_procurement.jpg',
                'meta_title' => 'Jasa Pengadaan Komputer & Hardware IT Kantor Perusahaan',
                'meta_description' => 'Layanan pengadaan PC kantor, laptop bisnis, server, printer, dan UPS bergaransi resmi dari supplier terpercaya NazwaGraha Pratama.',
                'is_published' => true,
                'views' => 64,
                'published_at' => now()->subDays(3),
            ],
        ];

        foreach ($articles as $art) {
            Article::firstOrCreate(['slug' => $art['slug']], $art);
        }

        // 4. Galleries
        $galleries = [
            [
                'title' => 'Toko Online E-Commerce & Checkout Otomatis WhatsApp',
                'category' => 'website',
                'image_path' => 'images/portfolio_web_collection.webp',
                'description' => 'Website toko online dengan katalog dinamis, hitung ongkir otomatis, dan checkout order langsung ke WhatsApp admin.',
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Website Profil Perusahaan & Korporat Logistik',
                'category' => 'website',
                'image_path' => 'images/web_mockup_showcase.webp',
                'description' => 'Desain elegan, wibawa tinggi, skor kecepatan 95+ di Google PageSpeed, dan terindeks ranking 1 Google.',
                'is_featured' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Instalasi 35 Titik Kabel LAN & Server Rack Kantor',
                'category' => 'jaringan',
                'image_path' => 'images/lan_server_infrastructure.webp',
                'description' => 'Penataan kabel Cat6 terstruktur, setting router Mikrotik anti putus, dan manajemen patch panel server rapi.',
                'is_featured' => true,
                'sort_order' => 3,
            ],
            [
                'title' => 'Pengadaan 20 Unit PC Karyawan & Laptop Bergaransi',
                'category' => 'hardware',
                'image_path' => 'images/it_hardware_procurement.webp',
                'description' => 'Paket komputer kerja performa tinggi Core i5/i7 NVMe cepat dengan sistem operasi berlisensi siap pakai.',
                'is_featured' => true,
                'sort_order' => 4,
            ],
            [
                'title' => 'Aplikasi Web Kustom & Dashboard Monitoring Bisnis',
                'category' => 'website',
                'image_path' => 'images/hero_tech_ecosystem.webp',
                'description' => 'Sistem informasi operasional dan dashboard visualisasi analitik data terintegrasi cloud modern.',
                'is_featured' => true,
                'sort_order' => 5,
            ],
            [
                'title' => 'Teknisi IT & Konsultasi On-Site Kantor Jabodetabek',
                'category' => 'support',
                'image_path' => 'images/commercial_hero_workspace.webp',
                'description' => 'Layanan survey lokasi kantor dan troubleshooting berkala untuk memastikan operasional IT berjalan tanpa kendala.',
                'is_featured' => true,
                'sort_order' => 6,
            ],
        ];

        foreach ($galleries as $gal) {
            Gallery::updateOrCreate(['title' => $gal['title']], $gal);
        }
    }
}
