<?php

namespace Tests\Feature;

use App\Models\ServicePage;
use App\Models\User;
use Database\Seeders\ServicePageSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminServicePagesTest extends TestCase
{
    use RefreshDatabase;

    protected User $adminUser;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(ServicePageSeeder::class);

        $this->adminUser = User::create([
            'name' => 'NazwaGraha Administrator',
            'email' => 'nazwagraha@gmail.com',
            'password' => Hash::make('*Kake1978#!!!'),
            'email_verified_at' => now(),
        ]);
    }

    /**
     * Test guest cannot access admin service pages backoffice.
     */
    public function test_guest_is_redirected_from_admin_service_pages(): void
    {
        $response = $this->get('/admin/service-pages');
        $response->assertRedirect('/admin/login');
    }

    /**
     * Test admin can view admin service pages and switch between sub-menus.
     */
    public function test_admin_can_view_service_pages_and_switch_tabs(): void
    {
        $response = $this->actingAs($this->adminUser)->get('/admin/service-pages');
        $response->assertStatus(200);
        $response->assertSee('Pengaturan Konten Sub-Menu Layanan');
        $response->assertSee('Jasa Pembuatan Website Murah');
        $response->assertSee('Jasa SEO Murah Bergaransi');
        $response->assertSee('Instalasi Jaringan LAN &amp; Wi-Fi', false);
        $response->assertSee('Pengadaan Komputer &amp; Hardware IT', false);
        $response->assertSee('Konsultan IT &amp; Maintenance', false);

        // Switch to SEO sub-menu tab
        $responseSeo = $this->actingAs($this->adminUser)->get('/admin/service-pages?slug=jasa-seo-murah');
        $responseSeo->assertStatus(200);
        $responseSeo->assertSee('Jasa SEO Murah Bergaransi');
    }

    /**
     * Test admin can update content and changes persist in database.
     */
    public function test_admin_can_update_service_page_content(): void
    {
        $page = ServicePage::where('slug', 'jasa-pembuatan-website-murah')->firstOrFail();

        $payload = [
            'service_title' => 'Jasa Pembuatan Website Murah',
            'eyebrow' => 'PROMO SPESIAL AKHIR TAHUN 2027',
            'hero_h1' => 'Bikin Website Bisnis Murah & Kilat PageSpeed 99',
            'hero_lead' => 'Solusi pembuatan website konversi tinggi dengan jaminan loading super kencang di seluruh gawai.',
            'hero_badges_text' => "Super Cepat\nGaransi 100%\nGratis Cloud SSL",
            'meta_title' => 'Website Murah Bogor | NazwaGraha Official',
            'meta_description' => 'Jasa website murah terpercaya di Bogor dan seluruh Indonesia.',
            'focus_keyword' => 'bikin website murah',
            'is_active' => '1',
            'packages' => [
                [
                    'name' => 'Paket Micro Landing Page',
                    'price' => 'Rp 350.000',
                    'badge' => 'Termurah',
                    'features_text' => "1 Halaman Cepat\nDomain Gratis\nWhatsApp Button",
                ],
                [
                    'name' => 'Paket Usaha Menengah',
                    'price' => 'Rp 850.000',
                    'badge' => 'Terpopuler',
                    'features_text' => "5 Halaman Responsif\nSEO On-Page\nEmail Bisnis",
                ],
                [
                    'name' => 'Paket Korporat Premium',
                    'price' => 'Rp 2.500.000',
                    'badge' => 'All In One',
                    'features_text' => "Custom Desain\nSpeed Optimization\nDedicated Server",
                ],
            ],
            'comparison' => [
                [
                    'feature' => 'Kecepatan Server',
                    'nazwagraha' => 'Cloud NVMe SSD LiteSpeed',
                    'others' => 'Shared Server Lemot',
                ],
            ],
            'faq_q' => ['Apakah ada garansi revisi?'],
            'faq_a' => ['Ya, kami memberikan garansi revisi sampai Anda puas.'],
        ];

        $response = $this->actingAs($this->adminUser)->put(route('admin.service-pages.update', $page->id), $payload);
        $response->assertRedirect(route('admin.service-pages.index', ['slug' => 'jasa-pembuatan-website-murah']));
        $response->assertSessionHas('success');

        $page->refresh();
        $this->assertEquals('Bikin Website Bisnis Murah & Kilat PageSpeed 99', $page->hero_h1);
        $this->assertEquals('PROMO SPESIAL AKHIR TAHUN 2027', $page->eyebrow);
        $this->assertEquals('Paket Micro Landing Page', $page->pricing_packages[0]['name']);
        $this->assertEquals('Cloud NVMe SSD LiteSpeed', $page->comparison_data[0]['nazwagraha']);
    }

    /**
     * Test updating content is immediately visible on the public page.
     */
    public function test_updated_content_is_reflected_on_public_page(): void
    {
        $page = ServicePage::where('slug', 'jasa-pembuatan-website-murah')->firstOrFail();
        $page->update([
            'hero_h1' => 'Judul Hero Custom Dari Admin Backoffice',
            'hero_lead' => 'Deskripsi hero unik terverifikasi live di front-end.',
            'eyebrow' => 'HOT DEAL NAZWAGRAHA',
        ]);

        $response = $this->get('/jasa-pembuatan-website-murah');
        $response->assertStatus(200);
        $response->assertSee('Judul Hero Custom Dari Admin Backoffice');
        $response->assertSee('Deskripsi hero unik terverifikasi live di front-end.');
        $response->assertSee('HOT DEAL NAZWAGRAHA');
    }

    /**
     * Test toggle active status deactivates page and redirects visitors.
     */
    public function test_toggle_status_can_deactivate_and_reactivate(): void
    {
        $page = ServicePage::where('slug', 'jasa-seo-murah')->firstOrFail();
        $this->assertTrue((bool) $page->is_active);

        // 1. Toggle to Inactive
        $toggleResponse = $this->actingAs($this->adminUser)->patch(route('admin.service-pages.toggle', $page->id));
        $toggleResponse->assertRedirect();
        $page->refresh();
        $this->assertFalse((bool) $page->is_active);

        // Admin can still preview even when deactivated
        $adminResponse = $this->actingAs($this->adminUser)->get('/jasa-seo-murah');
        $adminResponse->assertStatus(200);

        // Guest visits deactivated page -> should redirect to home with info message
        auth()->logout();
        $guestResponse = $this->get('/jasa-seo-murah');
        $guestResponse->assertRedirect(route('home'));
        $guestResponse->assertSessionHas('info');

        // 2. Toggle back to Active
        $toggleResponse2 = $this->actingAs($this->adminUser)->patch(route('admin.service-pages.toggle', $page->id));
        $toggleResponse2->assertRedirect();
        $page->refresh();
        $this->assertTrue((bool) $page->is_active);

        // Guest visits active page -> status 200
        auth()->logout();
        $guestResponse2 = $this->get('/jasa-seo-murah');
        $guestResponse2->assertStatus(200);
    }

    /**
     * Test all 5 public sub-menu pages load cleanly.
     */
    public function test_all_five_public_submenu_pages_load_cleanly(): void
    {
        $urls = [
            '/jasa-pembuatan-website-murah',
            '/jasa-seo-murah',
            '/instalasi-jaringan-lan',
            '/pengadaan-komputer',
            '/konsultan-it-maintenance',
        ];

        foreach ($urls as $url) {
            $response = $this->get($url);
            $response->assertStatus(200);
        }
    }

    /**
     * Test website service page displays all 4 pricing packages with complete attributes matching design.
     */
    public function test_website_service_page_displays_all_four_packages(): void
    {
        $response = $this->get('/jasa-pembuatan-website-murah');
        $response->assertStatus(200);

        // 1. Paket Landing Page Promo
        $response->assertSee('Paket Landing Page Promo');
        $response->assertSee('⚡ Hemat & Cepat');
        $response->assertSee('Rp 499.000');
        $response->assertSee('Rp 950.000');
        $response->assertSee('2 - 3 Hari Kerja');
        $response->assertSee('Pesan Landing Page ➔');

        // 2. Paket Company Profile Bisnis
        $response->assertSee('Paket Company Profile Bisnis');
        $response->assertSee('🔥 BEST SELLER • PALING LARIS');
        $response->assertSee('Rp 899.000');
        $response->assertSee('Rp 1.750.000');
        $response->assertSee('3 - 5 Hari Kerja');
        $response->assertSee('Pilih Paket Company Profile ➔');

        // 3. Paket Toko Online & Katalog WhatsApp
        $response->assertSee('Paket Toko Online &amp; Katalog WhatsApp', false);
        $response->assertSee('🛒 Siap Jualan Online');
        $response->assertSee('Rp 1.490.000');
        $response->assertSee('Rp 2.800.000');
        $response->assertSee('5 - 7 Hari Kerja');
        $response->assertSee('Pesan Toko Online ➔');

        // 4. Paket Custom Web & Portal Bisnis
        $response->assertSee('Paket Custom Web &amp; Portal Bisnis', false);
        $response->assertSee('⚙️ Enterprise &amp; Khusus', false);
        $response->assertSee('Rp 2.500.000+');
        $response->assertSee('Konsultasikan');
        $response->assertSee('Konsultasikan Kebutuhan ➔');

        // Verify backoffice view also renders all 4 packages for editing
        $adminResponse = $this->actingAs($this->adminUser)->get('/admin/service-pages?slug=jasa-pembuatan-website-murah');
        $adminResponse->assertStatus(200);
        $adminResponse->assertSee('Paket #1');
        $adminResponse->assertSee('Paket #2');
        $adminResponse->assertSee('Paket #3');
        $adminResponse->assertSee('Paket #4');
        $adminResponse->assertSee('Paket Custom Web &amp; Portal Bisnis', false);
    }
}
