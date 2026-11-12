<?php

namespace Tests\Feature;

use App\Models\Portfolio;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminPortfolioTest extends TestCase
{
    use RefreshDatabase;

    protected User $adminUser;

    protected function setUp(): void
    {
        parent::setUp();

        $this->adminUser = User::create([
            'name' => 'NazwaGraha Administrator',
            'email' => 'nazwagraha@gmail.com',
            'password' => Hash::make('*Kake1978#!!!'),
            'email_verified_at' => now(),
        ]);
    }

    public function test_guest_cannot_access_portfolio_admin_routes(): void
    {
        $response = $this->get('/admin/portfolios');
        $response->assertRedirect('/admin/login');

        $responseCreate = $this->get('/admin/portfolios/create');
        $responseCreate->assertRedirect('/admin/login');
    }

    public function test_admin_can_view_portfolio_index_page(): void
    {
        Portfolio::create([
            'title' => 'PT Samudera Logistik Prima',
            'slug' => 'pt-samudera-logistik-prima',
            'category' => 'WEBSITE COMPANY PROFILE KORPORAT',
            'badge' => 'WEBSITE COMPANY PROFILE KORPORAT',
            'client' => 'PT Samudera Logistik Prima',
            'description' => 'Website profil perusahaan logistik modern dengan fitur pelacakan armada cepat.',
            'image' => 'assets/images/portfolio-1.webp',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        $response = $this->actingAs($this->adminUser)->get('/admin/portfolios');

        $response->assertStatus(200);
        $response->assertSee('Portofolio &amp; Proyek Nyata', false);
        $response->assertSee('PT Samudera Logistik Prima');
        $response->assertSee('WEBSITE COMPANY PROFILE KORPORAT');
    }

    public function test_admin_can_view_portfolio_create_page(): void
    {
        $response = $this->actingAs($this->adminUser)->get('/admin/portfolios/create');

        $response->assertStatus(200);
        $response->assertSee('Tambah Portofolio');
        $response->assertSee('Klik untuk pilih kategori cepat:');
    }

    public function test_admin_can_store_new_portfolio(): void
    {
        $payload = [
            'title' => 'Klinik Pratama Sehat Medika',
            'client' => 'Klinik Pratama Sehat Medika',
            'category' => 'Website Dokter & Klinik',
            'badge' => 'WEBSITE LAYANAN MEDIS & SEO LOKAL CIAWI',
            'description' => 'Website profil klinik, jadwal praktik dokter, pendaftaran antrean via WhatsApp.',
            'image_url' => 'assets/images/portfolio-2.webp',
            'project_url' => 'https://wa.me/6287781077755',
            'sort_order' => 2,
            'is_active' => '1',
        ];

        $response = $this->actingAs($this->adminUser)->post('/admin/portfolios', $payload);

        $response->assertRedirect('/admin/portfolios');
        $this->assertDatabaseHas('portfolios', [
            'title' => 'Klinik Pratama Sehat Medika',
            'client' => 'Klinik Pratama Sehat Medika',
            'badge' => 'WEBSITE LAYANAN MEDIS & SEO LOKAL CIAWI',
            'sort_order' => 2,
            'is_active' => 1,
        ]);
    }

    public function test_admin_can_store_portfolio_with_uploaded_image(): void
    {
        $file = UploadedFile::fake()->image('custom_project.jpg', 800, 600);

        $payload = [
            'title' => 'CV Anugerah Teknik Mandiri',
            'client' => 'CV Anugerah Teknik Mandiri',
            'category' => 'Website Katalog & Manufaktur',
            'badge' => 'WEBSITE KATALOG MESIN & SEO RANKING 1',
            'description' => 'Katalog digital mesin dan suku cadang industri dengan sistem Request for Quotation.',
            'image_file' => $file,
            'sort_order' => 3,
            'is_active' => '1',
        ];

        $response = $this->actingAs($this->adminUser)->post('/admin/portfolios', $payload);

        $response->assertRedirect('/admin/portfolios');
        $portfolio = Portfolio::where('title', 'CV Anugerah Teknik Mandiri')->first();
        $this->assertNotNull($portfolio);
        $this->assertStringContainsString('assets/images/portfolios/', $portfolio->image);
        $this->assertFileExists(public_path($portfolio->image));

        // Cleanup created file
        if (file_exists(public_path($portfolio->image))) {
            @unlink(public_path($portfolio->image));
        }
    }

    public function test_admin_can_view_portfolio_edit_page(): void
    {
        $portfolio = Portfolio::create([
            'title' => 'Sentra Niaga & Coworking Hub',
            'slug' => 'sentra-niaga-coworking-hub',
            'category' => 'Jaringan LAN & Wi-Fi',
            'badge' => 'INSTALASI JARINGAN LAN 36 TITIK & WI-FI',
            'client' => 'Sentra Niaga Bogor',
            'description' => 'Penarikan kabel UTP Cat6 berlabel, konfigurasi Router Mikrotik dual ISP load-balancing.',
            'image' => 'assets/images/portfolio-4.webp',
            'sort_order' => 4,
            'is_active' => true,
        ]);

        $response = $this->actingAs($this->adminUser)->get("/admin/portfolios/{$portfolio->id}/edit");

        $response->assertStatus(200);
        $response->assertSee('Edit Portofolio: Sentra Niaga &amp; Coworking Hub', false);
        $response->assertSee('Sentra Niaga Bogor');
        $response->assertSee('INSTALASI JARINGAN LAN 36 TITIK &amp; WI-FI', false);
    }

    public function test_admin_can_update_portfolio(): void
    {
        $portfolio = Portfolio::create([
            'title' => 'Firma Hukum Artha',
            'slug' => 'firma-hukum-artha',
            'category' => 'Pengadaan Hardware & PC',
            'badge' => 'PENGADAAN PC KANTOR',
            'client' => 'Klien NazwaGraha',
            'description' => 'Pengadaan unit PC All-in-One.',
            'image' => 'assets/images/portfolio-1.webp',
            'sort_order' => 5,
            'is_active' => true,
        ]);

        $payload = [
            'title' => 'Firma Hukum & Konsultan Pajak Artha',
            'client' => 'Firma Artha & Partners',
            'category' => 'Pengadaan Hardware & PC',
            'badge' => 'PENGADAAN 12 PC KANTOR ALL-IN-ONE',
            'description' => 'Pengadaan 12 unit PC All-in-One Core i5 SSD, 4 laptop bisnis slim, printer network.',
            'sort_order' => 5,
            'is_active' => '1',
        ];

        $response = $this->actingAs($this->adminUser)->put("/admin/portfolios/{$portfolio->id}", $payload);

        $response->assertRedirect('/admin/portfolios');
        $portfolio->refresh();
        $this->assertEquals('Firma Hukum & Konsultan Pajak Artha', $portfolio->title);
        $this->assertEquals('Firma Artha & Partners', $portfolio->client);
        $this->assertEquals('PENGADAAN 12 PC KANTOR ALL-IN-ONE', $portfolio->badge);
    }

    public function test_admin_can_toggle_portfolio_active_status(): void
    {
        $portfolio = Portfolio::create([
            'title' => 'PT Berkah Pangan Nusantara',
            'slug' => 'pt-berkah-pangan-nusantara',
            'category' => 'Maintenance IT & Support',
            'badge' => 'KONSULTAN IT & MAINTENANCE RUTIN',
            'client' => 'PT Berkah Pangan',
            'description' => 'Kontrak pemeliharaan rutin infrastruktur IT.',
            'image' => 'assets/images/portfolio-2.webp',
            'sort_order' => 6,
            'is_active' => true,
        ]);

        $response = $this->actingAs($this->adminUser)->patch("/admin/portfolios/{$portfolio->id}/toggle");

        $response->assertRedirect();
        $portfolio->refresh();
        $this->assertFalse($portfolio->is_active);

        $this->actingAs($this->adminUser)->patch("/admin/portfolios/{$portfolio->id}/toggle");
        $portfolio->refresh();
        $this->assertTrue($portfolio->is_active);
    }

    public function test_admin_can_delete_portfolio(): void
    {
        $portfolio = Portfolio::create([
            'title' => 'Proyek Uji Hapus',
            'slug' => 'proyek-uji-hapus',
            'category' => 'Web App',
            'badge' => 'UJI HAPUS',
            'client' => 'Testing Client',
            'description' => 'Testing delete function.',
            'image' => 'assets/images/portfolio-1.webp',
            'sort_order' => 99,
            'is_active' => true,
        ]);

        $response = $this->actingAs($this->adminUser)->delete("/admin/portfolios/{$portfolio->id}");

        $response->assertRedirect('/admin/portfolios');
        $this->assertDatabaseMissing('portfolios', ['id' => $portfolio->id]);
    }

    public function test_homepage_renders_active_portfolio_with_client_and_badge(): void
    {
        Portfolio::create([
            'title' => 'PT Samudera Logistik Prima',
            'slug' => 'pt-samudera-logistik-prima',
            'category' => 'Website Company Profile',
            'badge' => 'WEBSITE COMPANY PROFILE KORPORAT',
            'client' => 'PT Samudera Logistik',
            'description' => 'Website profil perusahaan logistik modern dengan fitur pelacakan armada cepat.',
            'image' => 'assets/images/portfolio-1.webp',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('PT Samudera Logistik Prima');
        $response->assertSee('WEBSITE COMPANY PROFILE KORPORAT');
        $response->assertSee('PT Samudera Logistik');
    }
}
