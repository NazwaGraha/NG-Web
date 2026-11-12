<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Category;
use App\Models\Inquiry;
use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Tests\TestCase;

class AdminBackofficeTest extends TestCase
{
    use RefreshDatabase;

    protected User $adminUser;

    protected function setUp(): void
    {
        parent::setUp();

        // Create initial admin user
        $this->adminUser = User::create([
            'name' => 'NazwaGraha Administrator',
            'email' => 'nazwagraha@gmail.com',
            'password' => Hash::make('*Kake1978#!!!'),
            'email_verified_at' => now(),
        ]);

        RateLimiter::clear('admin-login|127.0.0.1');
    }

    /**
     * Test unauthenticated access is protected and redirected to login.
     */
    public function test_guest_is_redirected_to_admin_login(): void
    {
        $response = $this->get('/admin');
        $response->assertRedirect('/admin/login');

        $responseArticles = $this->get('/admin/articles');
        $responseArticles->assertRedirect('/admin/login');

        $responseCategories = $this->get('/admin/categories');
        $responseCategories->assertRedirect('/admin/login');
    }

    /**
     * Test admin login page renders correctly.
     */
    public function test_login_page_renders_correctly(): void
    {
        $response = $this->get('/admin/login');
        $response->assertStatus(200);
        $response->assertSee('NazwaGraha');
        $response->assertSee('BACKOFFICE LOGIN');
    }

    /**
     * Test login fails with invalid credentials.
     */
    public function test_login_fails_with_invalid_credentials(): void
    {
        $response = $this->post('/admin/login', [
            'email' => 'nazwagraha@gmail.com',
            'password' => 'WrongPassword123!',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    /**
     * Test login rate limiting blocks after 5 failed attempts.
     */
    public function test_login_rate_limiting_blocks_after_repeated_failures(): void
    {
        for ($i = 0; $i < 5; $i++) {
            $this->post('/admin/login', [
                'email' => 'nazwagraha@gmail.com',
                'password' => 'wrong-pass',
            ]);
        }

        // 6th attempt should be blocked with rate limiting message
        $response = $this->post('/admin/login', [
            'email' => 'nazwagraha@gmail.com',
            'password' => 'wrong-pass',
        ]);

        $response->assertSessionHasErrors('email');
        $error = session('errors')->first('email');
        $this->assertStringContainsString('Terlalu banyak percobaan login', $error);
    }

    /**
     * Test master admin can login successfully with correct credentials.
     */
    public function test_admin_can_login_with_valid_credentials(): void
    {
        $response = $this->post('/admin/login', [
            'email' => 'nazwagraha@gmail.com',
            'password' => '*Kake1978#!!!',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticated();
        $this->assertEquals('nazwagraha@gmail.com', auth()->user()->email);
    }

    /**
     * Test master admin can login EVEN IF DATABASE IS TRUNCATED / AFTER MIGRATE:FRESH
     */
    public function test_master_admin_can_login_even_if_database_is_empty(): void
    {
        // Simulate completely empty users table (like after migrate:fresh)
        User::query()->truncate();
        $this->assertEquals(0, User::count());

        $response = $this->post('/admin/login', [
            'email' => 'nazwagraha@gmail.com',
            'password' => '*Kake1978#!!!',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticated();
        $this->assertEquals(1, User::count());
        $this->assertEquals('nazwagraha@gmail.com', auth()->user()->email);
    }

    /**
     * Test authenticated admin can view dashboard with metrics.
     */
    public function test_admin_can_view_dashboard(): void
    {
        $this->actingAs($this->adminUser);

        $response = $this->get('/admin');
        $response->assertStatus(200);
        $response->assertSee('Dashboard Backoffice');
        $response->assertSee('Total Artikel');
        $response->assertSee('Pesan Masuk');
    }

    /**
     * Test category CRUD operations.
     */
    public function test_admin_can_create_and_manage_categories(): void
    {
        $this->actingAs($this->adminUser);

        // View index
        $response = $this->get('/admin/categories');
        $response->assertStatus(200);

        // Store new category
        $storeResponse = $this->post('/admin/categories', [
            'name' => 'Cloud & DevOps Solutions',
            'description' => 'Solusi server cloud AWS, GCP, dan VPS Linux.',
        ]);

        $storeResponse->assertRedirect(route('admin.categories.index'));
        $this->assertDatabaseHas('categories', [
            'name' => 'Cloud & DevOps Solutions',
            'slug' => 'cloud-devops-solutions',
        ]);

        $category = Category::where('slug', 'cloud-devops-solutions')->first();

        // Update category
        $updateResponse = $this->put("/admin/categories/{$category->id}", [
            'name' => 'Cloud Infrastructure & DevOps',
            'description' => 'Solusi infrastruktur cloud diperbarui.',
        ]);

        $updateResponse->assertRedirect(route('admin.categories.index'));
        $this->assertDatabaseHas('categories', [
            'id' => $category->id,
            'name' => 'Cloud Infrastructure & DevOps',
        ]);

        // Delete category
        $deleteResponse = $this->delete("/admin/categories/{$category->id}");
        $deleteResponse->assertRedirect(route('admin.categories.index'));
        $this->assertDatabaseMissing('categories', ['id' => $category->id]);
    }

    /**
     * Test article CRUD operations.
     */
    public function test_admin_can_create_and_manage_articles(): void
    {
        $this->actingAs($this->adminUser);

        $category = Category::create([
            'name' => 'Jasa Website',
            'slug' => 'jasa-website',
        ]);

        // View create form
        $createPage = $this->get('/admin/articles/create');
        $createPage->assertStatus(200);
        $createPage->assertSee('Tulis Artikel Baru');

        // Store article
        $storeResponse = $this->post('/admin/articles', [
            'title' => 'Panduan Memilih Jasa Pembuatan Website Profesional di Bogor 2026',
            'category' => 'Jasa Website',
            'excerpt' => 'Tips lengkap memilih vendor website terbaik di Bogor dengan standar kecepatan tinggi dan SEO.',
            'content' => '<h2>1. Kenali Kebutuhan Anda</h2><p>Pastikan website Anda dirancang profesional dan mobile-friendly.</p>',
            'focus_keyword' => 'jasa pembuatan website bogor',
            'geo_target' => 'Bogor, Ciawi, Jabodetabek',
            'meta_title' => 'Jasa Website Bogor Terbaik 2026 | NazwaGraha',
            'meta_description' => 'Cari jasa pembuatan website di Bogor? NazwaGraha hadir dengan layanan kilat, bergaransi, dan SEO ready.',
            'author' => 'Tim NazwaGraha',
            'reading_time' => '4 Menit Baca',
            'image_alt' => 'Jasa Pembuatan Website Bogor Terbaik 2026',
            'is_published' => 1,
        ]);

        $storeResponse->assertRedirect(route('admin.articles.index'));
        $this->assertDatabaseHas('articles', [
            'title' => 'Panduan Memilih Jasa Pembuatan Website Profesional di Bogor 2026',
            'slug' => 'panduan-memilih-jasa-pembuatan-website-profesional-di-bogor-2026',
            'category' => 'Jasa Website',
            'image_alt' => 'Jasa Pembuatan Website Bogor Terbaik 2026',
            'is_published' => 1,
        ]);

        $article = Article::where('slug', 'panduan-memilih-jasa-pembuatan-website-profesional-di-bogor-2026')->first();

        // Edit page
        $editPage = $this->get("/admin/articles/{$article->id}/edit");
        $editPage->assertStatus(200);
        $editPage->assertSee($article->title);

        // Update article
        $updateResponse = $this->put("/admin/articles/{$article->id}", [
            'title' => 'Panduan Lengkap Memilih Jasa Pembuatan Website di Bogor 2026 (Updated)',
            'category' => 'Jasa Website',
            'excerpt' => 'Ringkasan artikel telah diupdate.',
            'content' => '<p>Konten artikel yang baru.</p>',
            'is_published' => 1,
        ]);

        $updateResponse->assertRedirect(route('admin.articles.index'));
        $this->assertDatabaseHas('articles', [
            'id' => $article->id,
            'title' => 'Panduan Lengkap Memilih Jasa Pembuatan Website di Bogor 2026 (Updated)',
        ]);

        // Delete article
        $deleteResponse = $this->delete("/admin/articles/{$article->id}");
        $deleteResponse->assertRedirect(route('admin.articles.index'));
        $this->assertDatabaseMissing('articles', ['id' => $article->id]);
    }

    /**
     * Test scheduling article publication.
     */
    public function test_admin_can_schedule_article_and_public_visibility(): void
    {
        $this->actingAs($this->adminUser);

        Category::create(['name' => 'SEO & Digital', 'slug' => 'seo-digital']);

        // 1. Create a scheduled article (to be published tomorrow)
        $scheduledTime = now()->addDays(2)->setHour(10)->setMinute(0);
        $storeResponse = $this->post('/admin/articles', [
            'title' => 'Strategi Rahasia SEO 2027 untuk UMKM Bogor',
            'category' => 'SEO & Digital',
            'excerpt' => 'Artikel terjadwal untuk dirilis lusa.',
            'content' => '<h2>Masa Depan SEO</h2><p>Konten eksklusif yang baru akan tayang lusa.</p>',
            'publish_type' => 'schedule',
            'published_at' => $scheduledTime->format('Y-m-d\TH:i'),
        ]);

        $storeResponse->assertRedirect(route('admin.articles.index'));
        $article = Article::where('slug', 'strategi-rahasia-seo-2027-untuk-umkm-bogor')->first();

        $this->assertNotNull($article);
        $this->assertTrue($article->isScheduled());
        $this->assertFalse($article->isLive());
        $this->assertEquals('Terjadwal', $article->status_label);

        // 2. Check that admin index displays 'Terjadwal'
        $indexResponse = $this->get('/admin/articles');
        $indexResponse->assertSee('Terjadwal');

        // 3. Guest visits public index /berita -> should NOT see the scheduled article
        auth()->logout();
        $publicIndex = $this->get('/berita');
        $publicIndex->assertDontSee('Strategi Rahasia SEO 2027 untuk UMKM Bogor');

        // 4. Guest visits public show -> should return 404
        $publicShow = $this->get('/' . $article->slug);
        $publicShow->assertStatus(404);
    }

    /**
     * Test thumbnail upload with WebP and other extensions.
     */
    public function test_admin_can_upload_webp_thumbnail_image(): void
    {
        $this->actingAs($this->adminUser);

        Category::create(['name' => 'Hardware PC', 'slug' => 'hardware-pc']);

        $fakeWebpFile = \Illuminate\Http\UploadedFile::fake()->create('custom-thumbnail.webp', 300, 'image/webp');

        $response = $this->post('/admin/articles', [
            'title' => 'Panduan Upgrade Hardware PC Kantor di Ciawi',
            'category' => 'Hardware PC',
            'excerpt' => 'Tips hemat meremajakan komputer kantor.',
            'content' => '<p>Konten panduan hardware kantor.</p>',
            'publish_type' => 'immediate',
            'image_file' => $fakeWebpFile,
        ]);

        $response->assertRedirect(route('admin.articles.index'));
        $article = Article::where('slug', 'panduan-upgrade-hardware-pc-kantor-di-ciawi')->first();

        $this->assertNotNull($article);
        $this->assertStringContainsString('assets/images/articles/', $article->image);
        $this->assertStringEndsWith('.webp', $article->image);
    }

    /**
     * Test admin can view and update client inquiries.
     */
    public function test_admin_can_manage_inquiries(): void
    {
        $this->actingAs($this->adminUser);

        $inquiry = Inquiry::create([
            'name' => 'Budi Santoso',
            'whatsapp' => '081234567890',
            'email' => 'budi@ptmajubersama.com',
            'service_name' => 'Jasa Pembuatan Website',
            'company_name' => 'PT Maju Bersama',
            'budget' => 'Rp 5.000.000 - Rp 10.000.000',
            'message' => 'Halo NazwaGraha, kami butuh website company profile interaktif.',
            'status' => 'baru',
        ]);

        // View inquiry index
        $response = $this->get('/admin/inquiries');
        $response->assertStatus(200);
        $response->assertSee('Budi Santoso');
        $response->assertSee('081234567890');

        // Update status to 'dihubungi'
        $updateStatus = $this->patch("/admin/inquiries/{$inquiry->id}/status", [
            'status' => 'dihubungi',
        ]);

        $updateStatus->assertRedirect();
        $this->assertDatabaseHas('inquiries', [
            'id' => $inquiry->id,
            'status' => 'dihubungi',
        ]);

        // Delete inquiry
        $deleteResponse = $this->delete("/admin/inquiries/{$inquiry->id}");
        $deleteResponse->assertRedirect(route('admin.inquiries.index'));
        $this->assertDatabaseMissing('inquiries', ['id' => $inquiry->id]);
    }

    /**
     * Test admin logout invalidates session.
     */
    public function test_admin_can_logout(): void
    {
        $this->actingAs($this->adminUser);

        $response = $this->post('/admin/logout');
        $response->assertRedirect('/admin/login');
        $this->assertGuest();
    }

    /**
     * Test admin can view services list in backoffice with summary metrics.
     */
    public function test_admin_can_view_services_list(): void
    {
        $this->actingAs($this->adminUser);

        Service::create([
            'name' => 'Jasa Pembuatan Website Murah',
            'slug' => 'jasa-pembuatan-website-murah',
            'badge' => 'Terlaris',
            'short_description' => 'Website company profile murah di Bogor.',
            'price_starting_from' => 'Mulai Rp 499.000',
            'is_active' => true,
            'sort_order' => 1,
        ]);

        $response = $this->get('/admin/services');

        $response->assertStatus(200);
        $response->assertSee('Kelola Layanan Unggulan Kami');
        $response->assertSee('Jasa Pembuatan Website Murah');
        $response->assertSee('Mulai Rp 499.000');
        $response->assertSee('AKTIF (Tayang)');
        $response->assertSee('Nonaktifkan');
        $response->assertSee('+ Tambah Layanan Baru');
    }

    /**
     * Test admin can edit service content.
     */
    public function test_admin_can_edit_service_content(): void
    {
        $this->actingAs($this->adminUser);

        $service = Service::create([
            'name' => 'Jasa SEO Murah Bergaransi',
            'slug' => 'jasa-seo-murah',
            'badge' => 'Target Ranking 1',
            'short_description' => 'Optimasi SEO website.',
            'price_starting_from' => 'Mulai Rp 750.000',
            'is_active' => true,
            'sort_order' => 2,
        ]);

        // Visit edit form
        $editForm = $this->get("/admin/services/{$service->id}/edit");
        $editForm->assertStatus(200);
        $editForm->assertSee('Jasa SEO Murah Bergaransi');

        // Submit update
        $updateResponse = $this->put("/admin/services/{$service->id}", [
            'name' => 'Jasa SEO Murah Bergaransi Ranking 1 Google',
            'slug' => 'jasa-seo-murah',
            'badge' => 'Paling Populer',
            'short_description' => 'Layanan SEO bergaransi nomor 1 di Bogor.',
            'price_starting_from' => 'Mulai Rp 850.000',
            'sort_order' => 2,
            'is_active' => '1',
            'features_text' => "Audit Teknis Lengkap\nGaransi Ranking 1",
        ]);

        $updateResponse->assertRedirect(route('admin.services.index'));
        $updateResponse->assertSessionHas('success');

        $this->assertDatabaseHas('services', [
            'id' => $service->id,
            'name' => 'Jasa SEO Murah Bergaransi Ranking 1 Google',
            'price_starting_from' => 'Mulai Rp 850.000',
            'badge' => 'Paling Populer',
        ]);
    }

    /**
     * Test admin can toggle service active/inactive status and it reflects on landing page.
     */
    public function test_admin_can_toggle_service_active_status_and_it_reflects_on_landing_page(): void
    {
        $this->actingAs($this->adminUser);

        $service = Service::create([
            'name' => 'Instalasi Jaringan LAN Super Cepat',
            'slug' => 'instalasi-jaringan-lan-super-cepat',
            'badge' => 'Stabil',
            'short_description' => 'Penarikan kabel jaringan kantor rapi.',
            'price_starting_from' => 'Konsultasi Gratis',
            'is_active' => true,
            'sort_order' => 3,
        ]);

        // 1. Initial State: active service appears on homepage
        auth()->logout();
        $homeInitial = $this->get('/');
        $homeInitial->assertSee('Instalasi Jaringan LAN Super Cepat');

        // 2. Admin logs in and toggles status to INACTIVE (Nonaktifkan)
        $this->actingAs($this->adminUser);
        $toggleResponse = $this->patch("/admin/services/{$service->id}/toggle");
        $toggleResponse->assertRedirect();
        $toggleResponse->assertSessionHas('success');

        $this->assertDatabaseHas('services', [
            'id' => $service->id,
            'is_active' => false,
        ]);

        // 3. Guest visits homepage -> service MUST BE HIDDEN (tidak ditampilkan)
        auth()->logout();
        $homeAfterInactive = $this->get('/');
        $homeAfterInactive->assertDontSee('Instalasi Jaringan LAN Super Cepat');

        // 4. Admin toggles back to ACTIVE (Aktifkan)
        $this->actingAs($this->adminUser);
        $toggleBackResponse = $this->patch("/admin/services/{$service->id}/toggle");
        $toggleBackResponse->assertRedirect();

        $this->assertDatabaseHas('services', [
            'id' => $service->id,
            'is_active' => true,
        ]);

        // 5. Guest visits homepage -> service IS VISIBLE AGAIN
        auth()->logout();
        $homeAfterActive = $this->get('/');
        $homeAfterActive->assertSee('Instalasi Jaringan LAN Super Cepat');
    }

    /**
     * Test admin can create a brand new service.
     */
    public function test_admin_can_create_new_service(): void
    {
        $this->actingAs($this->adminUser);

        // Visit create form
        $createForm = $this->get('/admin/services/create');
        $createForm->assertStatus(200);

        // Submit new service
        $response = $this->post('/admin/services', [
            'name' => 'Audit Keamanan Siber & Penetration Testing',
            'slug' => 'audit-keamanan-siber-pentest',
            'badge' => 'High Security',
            'short_description' => 'Uji kerentanan sistem dan proteksi server kantor dari ransomware.',
            'price_starting_from' => 'Mulai Rp 1.500.000',
            'features_text' => "Vulnerability Scanning\nLaporan Rekomendasi Patching\nSertifikat Audit",
            'sort_order' => 6,
            'is_active' => '1',
        ]);

        $response->assertRedirect(route('admin.services.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('services', [
            'slug' => 'audit-keamanan-siber-pentest',
            'name' => 'Audit Keamanan Siber & Penetration Testing',
            'is_active' => true,
        ]);
    }

    /**
     * Test admin articles pagination displays numbered pages (1, 2, 3, etc.).
     */
    public function test_admin_articles_pagination_displays_numbered_pages(): void
    {
        $admin = User::first();
        $this->actingAs($admin);

        // Ensure there are at least 16 articles to trigger pagination (15 per page)
        $currentCount = Article::count();
        if ($currentCount < 16) {
            for ($i = $currentCount; $i < 16; $i++) {
                Article::create([
                    'title' => "Artikel Uji Coba Pagination {$i}",
                    'slug' => "artikel-uji-coba-pagination-{$i}",
                    'excerpt' => 'Ringkasan artikel uji coba pagination.',
                    'content' => '<p>Konten artikel pagination.</p>',
                    'image' => 'assets/images/articles/default.webp',
                    'category' => 'WEBSITE',
                    'is_published' => true,
                    'published_at' => now(),
                ]);
            }
        }

        // 1. Visit page 1
        $responsePage1 = $this->get('/admin/articles');
        $responsePage1->assertStatus(200);
        $responsePage1->assertSee('pagination');
        $responsePage1->assertSee('Menampilkan');
        $responsePage1->assertSee('aria-current="page"><span>1</span>', false);
        $responsePage1->assertSee('page=2');

        // 2. Visit page 2
        $responsePage2 = $this->get('/admin/articles?page=2');
        $responsePage2->assertStatus(200);
        $responsePage2->assertSee('pagination');
        $responsePage2->assertSee('aria-current="page"><span>2</span>', false);
        $responsePage2->assertSee('Sebelumnya');
    }
}
