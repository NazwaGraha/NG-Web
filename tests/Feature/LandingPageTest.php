<?php

namespace Tests\Feature;

use App\Models\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LandingPageTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Article::create([
            'title' => 'Berapa Biaya Jasa Pembuatan Website di Bogor Tahun 2026?',
            'slug' => 'biaya-jasa-pembuatan-website-bogor-2026',
            'category' => 'WEBSITE',
            'focus_keyword' => 'biaya jasa pembuatan website bogor',
            'geo_target' => 'Bogor, Ciawi, Jabodetabek',
            'meta_title' => 'Berapa Biaya Jasa Pembuatan Website di Bogor? Panduan 2026 | NazwaGraha',
            'meta_description' => 'Cari tahu rincian biaya jasa pembuatan website murah di Bogor.',
            'reading_time' => '6 Menit Baca',
            'author' => 'Affandi - Tim IT NazwaGraha',
            'image' => 'assets/images/article-1.webp',
            'excerpt' => 'Panduan transparan estimasi biaya pembuatan website murah di Bogor tahun 2026.',
            'content' => '<p>Konten artikel lengkap biaya website...</p>',
            'published_at' => now(),
            'is_published' => true,
        ]);

        for ($i = 2; $i <= 15; $i++) {
            Article::create([
                'title' => "Artikel Tes Ke-{$i} NazwaGraha",
                'slug' => "artikel-tes-ke-{$i}-nazwagraha",
                'category' => $i % 2 === 0 ? 'WEBSITE' : 'SEO & DIGITAL',
                'excerpt' => "Ringkasan artikel tes ke-{$i} untuk pengujian.",
                'content' => "<p>Isi konten lengkap dari artikel ke-{$i}.</p>",
                'image' => 'assets/images/article-1.webp',
                'published_at' => now()->subDays($i),
                'is_published' => true,
            ]);
        }
    }
    /**
     * Test homepage loads with 200 OK and contains essential SEO & GEO elements.
     */
    public function test_homepage_loads_with_seo_and_geo(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Jasa Pembuatan Website Murah');
        $response->assertSee('Konsultan IT Murah');
        $response->assertSee('Jl. Banjarwangi 1 Blok A2 no.9 RT.2 RW.2 Banjarwangi Ciawi Bogor, Jawa Barat');
        $response->assertSee('0812 98 506 111');
        $response->assertSee('nazwagraha@gmail.com');
        $response->assertSee('geo.region', false);
        $response->assertSee('geo.placename', false);
        $response->assertSee('schema.org', false);
        $response->assertSee('hasMap', false);
        $response->assertSee('maps.google.com', false);

        // Social Proof, Realistic Portfolios & Reviews
        $response->assertSee('PT Samudera Logistik Prima');
        $response->assertSee('Klinik Pratama Sehat Medika');
        $response->assertSee('Hendra Wijaya, S.T.');
        $response->assertSee('dr. Ratna Kartika');
        $response->assertSee('aggregateRating', false);

        // Google Analytics 4 & Google Tag Manager (GTM-MFR9ZXF)
        $response->assertSee('GTM-MFR9ZXF', false);
        $response->assertSee('googletagmanager.com/gtm.js?id=GTM-MFR9ZXF', false);
        $response->assertSee('click_whatsapp', false);
        $response->assertSee('generate_lead', false);

        // News & Edukasi Section with Mobile-Friendly Card UI
        $response->assertSee('NEWS & EDUKASI TEKNOLOGI', false);
        $response->assertSee('news-thumb-link', false);
        $response->assertSee('news-category-badge', false);
        $response->assertSee('news-meta', false);
        $response->assertSee('news-read-more', false);
        $response->assertSee('btn-news-explore', false);
        $response->assertSee(route('articles.index'), false);
    }

    /**
     * Test homepage dynamically and automatically displays the 3 latest published articles from database.
     */
    public function test_homepage_always_displays_the_3_latest_published_articles(): void
    {
        // 1. Create a brand new published article
        $latestArticle = Article::create([
            'title' => 'Teknologi AI Terbaru untuk Meningkatkan Penjualan Bisnis Bogor',
            'slug' => 'teknologi-ai-terbaru-penjualan-bisnis-bogor',
            'category' => 'AI & Bisnis',
            'excerpt' => 'Panduan implementasi kecerdasan buatan untuk otomatisasi customer service dan penjualan di Bogor.',
            'content' => '<p>Konten artikel lengkap seputar AI bisnis.</p>',
            'image' => 'assets/images/article-1.webp',
            'is_published' => true,
            'published_at' => now()->subMinute(), // live now
        ]);

        // 2. Create a future scheduled article that should NOT appear yet
        $futureArticle = Article::create([
            'title' => 'Prediksi Tren Cloud Hosting Indonesia 2030',
            'slug' => 'prediksi-tren-cloud-hosting-2030',
            'category' => 'Cloud',
            'excerpt' => 'Artikel masa depan yang belum tayang.',
            'content' => '<p>Konten rahasia.</p>',
            'image' => 'assets/images/article-2.webp',
            'is_published' => true,
            'published_at' => now()->addDays(5),
        ]);

        $response = $this->get('/');
        $response->assertStatus(200);

        // The newly published article MUST be visible on the homepage
        $response->assertSee('Teknologi AI Terbaru untuk Meningkatkan Penjualan Bisnis Bogor');
        $response->assertSee('/teknologi-ai-terbaru-penjualan-bisnis-bogor', false);

        // The future scheduled article MUST NOT be visible on the homepage
        $response->assertDontSee('Prediksi Tren Cloud Hosting Indonesia 2030');
    }

    /**
     * Test sitemap.xml returns 200 with XML content, only canonical URLs, and no hash fragments.
     */
    public function test_sitemap_returns_valid_xml(): void
    {
        $response = $this->get('/sitemap.xml');

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/xml; charset=utf-8');
        $response->assertSee('<urlset', false);
        $response->assertSee('/jasa-pembuatan-website-murah', false);
        $response->assertSee('/jasa-seo-murah', false);
        $response->assertSee('/instalasi-jaringan-lan', false);
        $response->assertSee('/pengadaan-komputer', false);
        $response->assertSee('/konsultan-it-maintenance', false);
        $response->assertDontSee('/#website', false);
        $response->assertDontSee('/#services', false);
    }

    /**
     * Test dedicated website service page loads with 200 OK and all core sections.
     */
    public function test_dedicated_website_service_page_loads_successfully(): void
    {
        $response = $this->get('/jasa-pembuatan-website-murah');

        $response->assertStatus(200);
        $response->assertSee('Jasa Pembuatan Website Murah, Profesional & Bergaransi');
        $response->assertSee('Paket Landing Page Promo');
        $response->assertSee('Paket Company Profile Bisnis');
        $response->assertSee('Paket Toko Online & Katalog WhatsApp');
        $response->assertSee('Paket Custom Web & Portal Bisnis');
        $response->assertSee('Rp 499.000');
        $response->assertSee('Rp 899.000');
        $response->assertSee('Rp 1.490.000');
        $response->assertSee('Rp 2.500.000+');
        $response->assertSee('PageSpeed 95+');
        $response->assertSee('schema.org', false);
        $response->assertSee('G-5GYSVPFZ48', false);
        $response->assertSee('click_whatsapp', false);
    }

    /**
     * Test dedicated seo service page loads with 200 OK and all core sections.
     */
    public function test_dedicated_seo_service_page_loads_successfully(): void
    {
        $response = $this->get('/jasa-seo-murah');

        $response->assertStatus(200);
        $response->assertSee('Jasa SEO Murah', false);
        $response->assertSee('Paket SEO Lokal & UMKM', false);
        $response->assertSee('Paket SEO Bisnis Berkembang', false);
        $response->assertSee('Paket SEO Agresif / Korporat', false);
        $response->assertSee('Paket Audit SEO & Quick Fix', false);
        $response->assertSee('Rp 750.000');
        $response->assertSee('Rp 1.500.000');
        $response->assertSee('Rp 2.750.000');
        $response->assertSee('Rp 499.000');
        $response->assertSee('White-Hat', false);
        $response->assertSee('schema.org', false);
    }

    /**
     * Test dedicated network service page loads with 200 OK and all core sections.
     */
    public function test_dedicated_network_service_page_loads_successfully(): void
    {
        $response = $this->get('/instalasi-jaringan-lan');

        $response->assertStatus(200);
        $response->assertSee('Jasa Instalasi Jaringan LAN', false);
        $response->assertSee('Paket LAN Kantor Skala Kecil', false);
        $response->assertSee('Paket LAN & Wi-Fi Bisnis Terpadu', false);
        $response->assertSee('Paket Enterprise & Server Rack', false);
        $response->assertSee('Paket Perapian & Troubleshooting', false);
        $response->assertSee('Rp 1.250.000');
        $response->assertSee('Rp 2.500.000');
        $response->assertSee('Rp 4.500.000+');
        $response->assertSee('Rp 650.000');
        $response->assertSee('schema.org', false);
    }

    /**
     * Test dedicated hardware service page loads with 200 OK and all core sections.
     */
    public function test_dedicated_hardware_service_page_loads_successfully(): void
    {
        $response = $this->get('/pengadaan-komputer');

        $response->assertStatus(200);
        $response->assertSee('Jasa Pengadaan Komputer', false);
        $response->assertSee('Paket PC Kantor & Administrasi', false);
        $response->assertSee('Paket Laptop Bisnis & Operasional', false);
        $response->assertSee('Paket PC Desain & Workstation Berat', false);
        $response->assertSee('Rp 3.850.000', false);
        $response->assertSee('Rp 5.200.000', false);
        $response->assertSee('Rp 8.500.000', false);
        $response->assertSee('schema.org', false);
    }

    /**
     * Test dedicated maintenance service page loads with 200 OK and all core sections.
     */
    public function test_dedicated_maintenance_service_page_loads_successfully(): void
    {
        $response = $this->get('/konsultan-it-maintenance');

        $response->assertStatus(200);
        $response->assertSee('Jasa Konsultan IT & Maintenance', false);
        $response->assertSee('Paket Maintenance Panggilan (On-Call)', false);
        $response->assertSee('Paket IT Support Bulanan UMKM', false);
        $response->assertSee('Paket IT Outsourcing Korporasi', false);
        $response->assertSee('Rp 350.000', false);
        $response->assertSee('Rp 1.250.000', false);
        $response->assertSee('Rp 2.750.000', false);
        $response->assertSee('schema.org', false);
    }

    /**
     * Test homepage has link to all service pages in dropdown and services section.
     */
    public function test_homepage_has_link_to_service_pages(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee(route('services.website'), false);
        $response->assertSee(route('services.seo'), false);
        $response->assertSee(route('services.network'), false);
        $response->assertSee(route('services.hardware'), false);
        $response->assertSee(route('services.maintenance'), false);
    }

    /**
     * Test inquiry submission redirects to WhatsApp.
     */
    public function test_inquiry_submission_redirects_to_whatsapp(): void
    {
        $response = $this->post('/inquiry', [
            'name' => 'Ahmad Fauzi',
            'whatsapp' => '081298506111',
            'service_name' => 'Jasa Pembuatan Website Murah',
            'company_name' => 'PT Sukses Mandiri',
            'budget_range' => '1 Juta - 3 Juta',
            'message' => 'Mohon info pembuatan website company profile murah.',
        ]);

        $response->assertStatus(302);
        $this->assertStringContainsString('https://wa.me/6281298506111', $response->headers->get('Location'));
    }

    /**
     * Test inquiry AJAX request returns JSON with whatsapp_url.
     */
    public function test_inquiry_ajax_request_returns_json(): void
    {
        $response = $this->postJson('/inquiry', [
            'name' => 'Siti Nurhaliza',
            'whatsapp' => '081298506111',
            'service_name' => 'Konsultan IT Murah & Maintenance',
            'message' => 'Butuh maintenance jaringan kantor di Ciawi Bogor.',
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'status',
            'message',
            'whatsapp_url',
        ]);
    }

    /**
     * Test article detail page loads with 200 OK and contains rich SEO & GEO elements.
     */
    public function test_article_detail_page_loads_with_seo_and_geo(): void
    {
        // Root-level article slug
        $response = $this->get('/biaya-jasa-pembuatan-website-bogor-2026');

        $response->assertStatus(200);
        $response->assertSee('Berapa Biaya Jasa Pembuatan Website di Bogor Tahun 2026?');
        $response->assertSee('biaya jasa pembuatan website bogor', false);
        $response->assertSee('Bogor, Ciawi, Jabodetabek');
        $response->assertSee('BlogPosting', false);
        $response->assertSee('BreadcrumbList', false);
        $response->assertSee('schema.org', false);
        $response->assertSee('GTM-MFR9ZXF', false);
        $response->assertSee('click_whatsapp', false);

        // Legacy /berita/{slug} URL 301 permanent redirect
        $legacyRedirect = $this->get('/berita/biaya-jasa-pembuatan-website-bogor-2026');
        $legacyRedirect->assertStatus(301);
        $legacyRedirect->assertRedirect('/biaya-jasa-pembuatan-website-bogor-2026');
    }

    /**
     * Test sitemap.xml dynamically includes published articles from database.
     */
    public function test_sitemap_includes_database_articles(): void
    {
        $response = $this->get('/sitemap.xml');

        $response->assertStatus(200);
        $response->assertSee('/berita', false);
        $response->assertSee('/biaya-jasa-pembuatan-website-bogor-2026', false);
        $response->assertSee('/artikel-tes-ke-2-nazwagraha', false);
        $response->assertSee('/artikel-tes-ke-3-nazwagraha', false);
    }

    /**
     * Test News & Events index page loads with 9 article cards and pagination.
     */
    public function test_news_and_events_index_page_loads_with_pagination(): void
    {
        $response = $this->get('/berita');

        $response->assertStatus(200);
        $response->assertSee('Wawasan, Berita &');
        $response->assertSee('Edukasi Teknologi');
        $response->assertSee('GTM-MFR9ZXF', false);
        $response->assertSee('CollectionPage', false);

        // Verify pagination controls exist (since 15 articles total with 9 per page)
        $response->assertSee('Menampilkan', false);
        $response->assertSee('dari total <strong>15</strong> Artikel', false);
        $response->assertSee('page=2', false);
    }

    /**
     * Test News & Events page 2 loads properly with the remaining articles.
     */
    public function test_news_and_events_second_page_loads(): void
    {
        $response = $this->get('/berita?page=2');

        $response->assertStatus(200);
        $response->assertSee('page=1', false);
        $response->assertSee('Menampilkan <strong>10 - 15</strong> dari total <strong>15</strong> Artikel', false);
    }

    /**
     * Test News & Events category filter works as expected.
     */
    public function test_news_and_events_category_filter_works(): void
    {
        $response = $this->get('/berita?category=WEBSITE');

        $response->assertStatus(200);
        $response->assertSee('Berapa Biaya Jasa Pembuatan Website di Bogor Tahun 2026?');
    }
}
