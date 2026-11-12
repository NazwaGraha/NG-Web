<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Faq;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class NazwaGrahaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Site Settings
        $settings = [
            'site_name' => 'NazwaGraha',
            'tagline' => 'Jasa Pembuatan Website Murah & Konsultan IT Murah',
            'phone' => '081298506111',
            'phone_display' => '0812 98 506 111',
            'whatsapp' => '081298506111',
            'email' => 'nazwagraha@gmail.com',
            'address' => 'Jl. Banjarwangi 1 Blok A2 no.9 RT.2 RW.2 Banjarwangi Ciawi Bogor, Jawa Barat',
            'subdistrict' => 'Ciawi',
            'city' => 'Bogor',
            'province' => 'Jawa Barat',
            'postal_code' => '16720',
            'country' => 'Indonesia',
            'geo_latitude' => '-6.6698',
            'geo_longitude' => '106.8532',
            'geo_region' => 'ID-JB',
            'geo_placename' => 'Bogor, Jawa Barat',
            'meta_title' => 'Jasa Pembuatan Website Murah & Konsultan IT Murah Bogor | NazwaGraha',
            'meta_description' => 'Jasa pembuatan website murah & konsultan IT murah terpercaya di Bogor, Ciawi, Jabodetabek & seluruh Indonesia. Solusi web profesional, SEO ranking 1 Google, jaringan LAN, & IT support bergaransi.',
            'meta_keywords' => 'jasa pembuatan website murah, konsultan it murah, jasa website bogor, jasa website ciawi, konsultan it bogor, jasa seo murah, maintenance komputer kantor, pasang jaringan lan murah, web company profile murah, pembuatan landing page murah',
            'hero_eyebrow' => 'PARTNER TEKNOLOGI BISNIS ANDA • BOGOR & NASIONAL',
            'hero_title' => 'Jasa Pembuatan Website Murah & Konsultan IT Murah',
            'hero_lead' => 'Solusi teknologi terpercaya dan terjangkau untuk membantu bisnis Anda bekerja lebih efisien, tampil profesional, ranking 1 di Google, dan banjir orderan di era digital.',
            'working_hours' => 'Senin - Sabtu: 08.00 - 21.00 WIB (Fast Response WhatsApp)',
            'canonical_url' => 'https://nazwagraha.com/',
        ];

        foreach ($settings as $key => $value) {
            SiteSetting::updateOrCreate(['key' => $key], ['value' => $value, 'group' => 'general']);
        }

        // 2. Services
        $services = [
            [
                'slug' => 'jasa-pembuatan-website-murah',
                'name' => 'Jasa Pembuatan Website Murah',
                'badge' => 'Terlaris',
                'short_description' => 'Website company profile, landing page, katalog, hingga toko online yang dirancang profesional, loading cepat, dan nyaman di semua perangkat.',
                'price_starting_from' => 'Mulai Rp 499.000',
                'icon_svg' => '<svg viewBox="0 0 48 48" aria-hidden="true"><rect x="5" y="7" width="38" height="27" rx="3"/><path d="M16 41h16M24 34v7M18 17l-5 4 5 4m12-8 5 4-5 4m-5-8-3 8"/></svg>',
                'features' => [
                    'Desain Modern & Mobile-First',
                    'Skor 95+ di Google PageSpeed',
                    'Gratis Domain & SSL Cepat',
                    'Tombol WhatsApp & Call to Action Tajam',
                    'Struktur SEO Friendly Sejak Awal',
                    'Garansi Revisi & Panduan Penggunaan',
                ],
                'sort_order' => 1,
            ],
            [
                'slug' => 'jasa-seo-murah',
                'name' => 'Jasa SEO Murah Bergaransi',
                'badge' => 'Target Ranking 1',
                'short_description' => 'Optimasi teknis dan konten website untuk mendongkrak visibilitas bisnis Anda ke peringkat atas Google dan menjaring pelanggan potensial tanpa henti.',
                'price_starting_from' => 'Mulai Rp 750.000',
                'icon_svg' => '<svg viewBox="0 0 48 48" aria-hidden="true"><circle cx="20" cy="20" r="13"/><path d="m30 30 11 11M14 20h12m-6-6v12"/></svg>',
                'features' => [
                    'Riset Kata Kunci Tertarget & Niat Beli Tinggi',
                    'Optimasi On-Page, Metadata & Schema Markup',
                    'GEO SEO & Google Bisnis Profil (Lokal Bogor & Nasional)',
                    'Perbaikan Kecepatan Loading & Core Web Vitals',
                    'Laporan Kinerja Bulanan Transparan',
                ],
                'sort_order' => 2,
            ],
            [
                'slug' => 'instalasi-jaringan-lan',
                'name' => 'Instalasi Jaringan (LAN) & Wi-Fi',
                'badge' => 'Stabil & Rapi',
                'short_description' => 'Perencanaan dan instalasi jaringan kabel UTP/STP, router Mikrotik, switch, dan access point agar konektivitas internet kantor stabil dan tertata rapi.',
                'price_starting_from' => 'Konsultasi & Survei',
                'icon_svg' => '<svg viewBox="0 0 48 48" aria-hidden="true"><rect x="17" y="4" width="14" height="10" rx="2"/><rect x="4" y="34" width="12" height="10" rx="2"/><rect x="32" y="34" width="12" height="10" rx="2"/><path d="M24 14v10M10 34v-7h28v7"/></svg>',
                'features' => [
                    'Penarikan Kabel Jaringan Rapi & Berlabel',
                    'Konfigurasi Router Mikrotik / Cisco',
                    'Manajemen Bandwidth & Pembagian Beban',
                    'Pemasangan Server & Rack Cabinet',
                    'Garansi Instalasi & Troubleshooting Cepat',
                ],
                'sort_order' => 3,
            ],
            [
                'slug' => 'pengadaan-komputer-murah',
                'name' => 'Pengadaan Komputer & Hardware IT',
                'badge' => 'Harga Terbaik',
                'short_description' => 'Penyediaan komputer PC kantor, laptop bisnis, printer, UPS, dan perangkat pendukung IT sesuai spesifikasi dan anggaran perusahaan.',
                'price_starting_from' => 'Sesuai Kebutuhan',
                'icon_svg' => '<svg viewBox="0 0 48 48" aria-hidden="true"><rect x="5" y="7" width="38" height="27" rx="3"/><path d="M17 41h14m-7-7v7M12 13h24"/></svg>',
                'features' => [
                    'Spesifikasi Disesuaikan Kebutuhan Kerja',
                    'Unit Bergaransi Resmi Distributor',
                    'Sudah Termasuk Instalasi OS & Software Dasar',
                    'Pengantaran & Pemasangan Langsung di Kantor',
                    'Harga Kompetitif untuk Pengadaan Skala Kecil hingga Besar',
                ],
                'sort_order' => 4,
            ],
            [
                'slug' => 'konsultan-it-murah-maintenance',
                'name' => 'Konsultan IT Murah & Maintenance',
                'badge' => 'Solutif',
                'short_description' => 'Layanan konsultasi arsitektur IT, audit sistem, perawatan berkala, serta perbaikan kendala hardware/software demi kelancaran operasional usaha Anda.',
                'price_starting_from' => 'Mulai Rp 350.000',
                'icon_svg' => '<svg viewBox="0 0 48 48" aria-hidden="true"><path d="M29 7a12 12 0 0 0 12 15L25 38l-8-8L33 14A12 12 0 0 0 29 7Z"/><path d="m8 9 8 8m-8-8 5-5m-5 5-5 5m13 24 5 5"/></svg>',
                'features' => [
                    'Konsultasi Solusi IT Efisien & Hemat Biaya',
                    'Maintenance Rutin Bulanan / Panggilan Darurat',
                    'Pembersihan Virus, Malware & Optimasi Sistem',
                    'Backup Data Berkala & Pengamanan File',
                    'Bisa Kunjungan Langsung (On-Site) maupun Remote Support',
                ],
                'sort_order' => 5,
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(['slug' => $service['slug']], $service);
        }

        // 3. Portfolios
        $portfolios = [
            [
                'title' => 'PT Samudera Logistik Prima',
                'slug' => 'pt-samudera-logistik-prima',
                'category' => 'Website Company Profile Korporat',
                'client' => 'Klien NazwaGraha',
                'image' => 'assets/images/portfolio-1.webp',
                'description' => 'Website profil perusahaan logistik modern dengan fitur pelacakan armada cepat, katalog rute, dan kecepatan akses di bawah 1 detik.',
                'project_url' => 'https://nazwagraha.com/jasa-pembuatan-website-murah',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Klinik Pratama Sehat Medika',
                'slug' => 'klinik-pratama-sehat-medika',
                'category' => 'Website Layanan Medis & SEO Lokal Ciawi',
                'client' => 'Klien NazwaGraha',
                'image' => 'assets/images/portfolio-2.webp',
                'description' => 'Website profil klinik, jadwal praktik dokter, pendaftaran antrean via WhatsApp, dan optimasi Google Maps lokal hingga ranking 1.',
                'project_url' => 'https://nazwagraha.com/jasa-seo-murah',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'CV Anugerah Teknik Mandiri',
                'slug' => 'cv-anugerah-teknik-mandiri',
                'category' => 'Website Katalog Mesin & SEO Ranking 1',
                'client' => 'Klien NazwaGraha',
                'image' => 'assets/images/portfolio-3.webp',
                'description' => 'Katalog digital mesin dan suku cadang industri dengan sistem Request for Quotation (RFQ) instan dan integrasi WhatsApp.',
                'project_url' => 'https://nazwagraha.com/jasa-pembuatan-website-murah',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Sentra Niaga & Coworking Hub',
                'slug' => 'sentra-niaga-coworking-hub',
                'category' => 'Instalasi Jaringan LAN 36 Titik & Wi-Fi',
                'client' => 'Klien NazwaGraha',
                'image' => 'assets/images/portfolio-4.webp',
                'description' => 'Penarikan kabel UTP Cat6 berlabel, konfigurasi Router Mikrotik dual ISP load-balancing, access point roaming, dan server rack 15U.',
                'project_url' => 'https://nazwagraha.com/instalasi-jaringan-lan',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'Firma Hukum & Konsultan Pajak Artha',
                'slug' => 'firma-hukum-konsultan-artha',
                'category' => 'Pengadaan 12 PC Kantor All-in-One',
                'client' => 'Klien NazwaGraha',
                'image' => 'assets/images/portfolio-1.webp',
                'description' => 'Pengadaan 12 unit PC All-in-One Core i5 SSD, 4 laptop bisnis slim, printer network, dan setup software kantor legal.',
                'project_url' => 'https://nazwagraha.com/pengadaan-komputer',
                'sort_order' => 5,
                'is_active' => true,
            ],
            [
                'title' => 'PT Berkah Pangan Nusantara',
                'slug' => 'pt-berkah-pangan-nusantara',
                'category' => 'Konsultan IT & Maintenance Rutin',
                'client' => 'Klien NazwaGraha',
                'image' => 'assets/images/portfolio-2.webp',
                'description' => 'Kontrak pemeliharaan rutin infrastruktur IT, proteksi antivirus server, backup otomatis NAS Synology, dan on-call emergency.',
                'project_url' => 'https://nazwagraha.com/konsultan-it-maintenance',
                'sort_order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($portfolios as $portfolio) {
            Portfolio::updateOrCreate(['slug' => $portfolio['slug']], $portfolio);
        }

        // 4. Articles
        $articles = [
            [
                'title' => 'Hal yang Perlu Disiapkan Sebelum Membuat Website Bisnis Murah tapi Berkualitas',
                'slug' => 'hal-yang-perlu-disiapkan-sebelum-membuat-website-bisnis',
                'category' => 'WEBSITE',
                'excerpt' => 'Kenali tujuan bisnis, target pengunjung, dan materi penting agar pembuatan website murah Anda tetap menghasilkan tampilan premium dan mendatangkan pelanggan.',
                'content' => 'Memiliki website saat ini bukan lagi sekadar pelengkap, melainkan aset utama bisnis. Sebelum memulai pengerjaan website, pastikan Anda telah menyiapkan profil usaha, keunggulan produk, target pembeli, dan kontak pemesanan cepat seperti WhatsApp.',
                'image' => 'assets/images/article-1.webp',
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Mengapa SEO Penting untuk Visibilitas Bisnis dan Menembus Ranking 1 Google?',
                'slug' => 'mengapa-seo-penting-untuk-visibilitas-bisnis-online',
                'category' => 'SEO',
                'excerpt' => 'Memahami fondasi SEO on-page, GEO targeting lokal, dan bagaimana konten relevan membantu calon pelanggan menemukan jasa Anda tanpa biaya iklan terus-menerus.',
                'content' => 'SEO (Search Engine Optimization) adalah strategi jangka panjang terbaik untuk mendapatkan orderan secara konsisten. Dengan optimasi kata kunci seperti jasa pembuatan website murah dan konsultan IT murah, website Anda akan tampil di posisi atas saat calon konsumen membutuhkan solusi segera.',
                'image' => 'assets/images/article-2.webp',
                'published_at' => now()->subDays(12),
            ],
            [
                'title' => 'Tips Menjaga Jaringan Kantor (LAN) & Perangkat IT Tetap Stabil Bebas Kendala',
                'slug' => 'tips-menjaga-jaringan-kantor-tetap-stabil',
                'category' => 'INFRASTRUKTUR IT',
                'excerpt' => 'Langkah praktis mengelola router, penataan kabel LAN rapi, dan perawatan berkala komputer kantor agar operasional tim tidak terganggu.',
                'content' => 'Konektivitas internet yang lambat atau sering putus dapat merugikan produktivitas kerja. Penataan kabel LAN yang rapi, pemilihan access point yang tepat, serta maintenance hardware secara berkala adalah kunci stabilitas infrastruktur kantor Anda.',
                'image' => 'assets/images/article-3.webp',
                'published_at' => now()->subDays(20),
            ],
        ];

        foreach ($articles as $article) {
            Article::updateOrCreate(['slug' => $article['slug']], $article);
        }

        // 5. FAQs
        $faqs = [
            [
                'question' => 'Berapa biaya jasa pembuatan website murah di NazwaGraha?',
                'answer' => 'Biaya pembuatan website di NazwaGraha sangat terjangkau, mulai dari Rp 499.000 untuk landing page atau website profil bisnis sederhana. Kami juga menyediakan paket kustom sesuai fitur spesifik yang Anda butuhkan tanpa biaya tersembunyi.',
                'sort_order' => 1,
            ],
            [
                'question' => 'Apakah website yang dibuat dijamin responsif dan cepat dibuka di smartphone?',
                'answer' => 'Ya, tentu saja! Seluruh website yang kami kembangkan mengusung pendekatan Mobile-First dan ditargetkan meraih skor performa 95+ di Google PageSpeed Insights, sehingga sangat cepat diakses dan nyaman dibuka dari smartphone, tablet, maupun desktop.',
                'sort_order' => 2,
            ],
            [
                'question' => 'Bagaimana layanan jasa SEO murah NazwaGraha membantu mencapai ranking 1 Google?',
                'answer' => 'Kami mengoptimalkan website Anda secara menyeluruh: mulai dari struktur kode semantik, kecepatan rendering, riset kata kunci dengan niat beli tinggi (seperti "Jasa pembuatan website murah" dan "Konsultan IT Murah"), optimasi GEO lokal Google Maps, hingga konten yang menjawab kebutuhan calon pelanggan Anda.',
                'sort_order' => 3,
            ],
            [
                'question' => 'Apakah melayani instalasi jaringan LAN, pengadaan komputer, dan maintenance IT di wilayah Bogor & Ciawi?',
                'answer' => 'Ya, kantor kami berlokasi di Banjarwangi, Ciawi, Bogor. Kami siap melayani kunjungan langsung (on-site) untuk wilayah Ciawi, Kota/Kabupaten Bogor, Jabodetabek, Sukabumi, dan sekitarnya, serta siap melayani pengadaan perangkat IT dan konsultasi online ke seluruh Indonesia.',
                'sort_order' => 4,
            ],
            [
                'question' => 'Bagaimana cara memulai konsultasi dan memesan jasa di NazwaGraha?',
                'answer' => 'Sangat mudah! Anda cukup klik tombol WhatsApp (0812 98 506 111) atau mengisi formulir konsultasi cepat di website ini. Tim kami akan langsung merespons untuk mendiskusikan kebutuhan, memberikan rekomendasi solusi tepat, serta penawaran harga terbaik.',
                'sort_order' => 5,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::updateOrCreate(['question' => $faq['question']], $faq);
        }
    }
}
