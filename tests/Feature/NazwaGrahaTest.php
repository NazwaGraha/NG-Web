<?php

namespace Tests\Feature;

use App\Mail\ContactInquiryMail;
use App\Models\Article;
use App\Models\Category;
use App\Models\ContactMessage;
use App\Models\Gallery;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class NazwaGrahaTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(DatabaseSeeder::class);
    }

    public function test_homepage_loads_successfully_with_brand_and_contact(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('NazwaGraha Pratama');
        $response->assertSee('081298506111');
        $response->assertSee('nazwagraha@gmail.com');
        $response->assertSee('Jl. Banjarwangi 1 Blok A2 no.9 RT.2 RW.2 Banjarwangi Ciawi Bogor');
        $response->assertSee('https://schema.org');
        
        // Assert mobile hamburger button and drawer elements exist
        $response->assertSee('id="mobileMenuBtn"', false);
        $response->assertSee('id="mobileDrawer"', false);
        $response->assertSee('id="hamburgerIcon"', false);
        $response->assertSee('id="closeIcon"', false);
        $response->assertSee('id="mobileMenuBtnText"', false);

        // Assert floating WhatsApp widget exists on mobile and desktop
        $response->assertSee('id="waWidget"', false);
        $response->assertSee('id="waBubble"', false);
        $response->assertSee('wa-beacon-btn', false);

        // Assert dynamic portfolio cards from database
        $response->assertSee('home-port-card', false);
        $response->assertSee('Toko Online E-Commerce & Checkout Otomatis WhatsApp');
        $response->assertSee('Pesan Proyek Serupa via WhatsApp');
    }

    public function test_articles_page_and_detail_load_successfully(): void
    {
        $response = $this->get('/artikel');
        $response->assertStatus(200);

        $article = Article::first();
        $this->assertNotNull($article);

        $showResponse = $this->get('/artikel/' . $article->slug);
        $showResponse->assertStatus(200);
        $showResponse->assertSee($article->title);
    }

    public function test_gallery_page_loads_successfully(): void
    {
        $response = $this->get('/galeri');
        $response->assertStatus(200);
        $response->assertSee('Galeri');
    }

    public function test_contact_page_loads_successfully(): void
    {
        $response = $this->get('/kontak');
        $response->assertStatus(200);
        $response->assertSee('081298506111');
        $response->assertSee('nazwagraha@gmail.com');
        $response->assertSee('Kirim Pesan ke Email NazwaGraha');
    }

    public function test_contact_form_sends_email_to_nazwagraha_and_saves_message_in_database(): void
    {
        Mail::fake();

        $postData = [
            'name' => 'Budi Santoso',
            'phone' => '081298506111',
            'email' => 'budisantoso@example.com',
            'service' => 'Pembuatan Website Company Profile / Bisnis',
            'message' => 'Halo NazwaGraha Pratama, kami butuh proposal untuk pembuatan website korporat perusahaan kami.',
        ];

        $response = $this->post('/kontak/kirim', $postData);

        $response->assertRedirect('/kontak');
        $response->assertSessionHas('success');
        $response->assertSessionHas('whatsapp_url');

        // Verify email is sent to nazwagraha@gmail.com
        Mail::assertSent(ContactInquiryMail::class, function ($mail) {
            return $mail->hasTo('nazwagraha@gmail.com') &&
                   $mail->contactData['name'] === 'Budi Santoso' &&
                   $mail->contactData['email'] === 'budisantoso@example.com';
        });

        // Verify inquiry is stored in contact_messages table
        $this->assertDatabaseHas('contact_messages', [
            'name' => 'Budi Santoso',
            'email' => 'budisantoso@example.com',
            'phone' => '081298506111',
            'service' => 'Pembuatan Website Company Profile / Bisnis',
        ]);
    }

    public function test_about_page_loads_successfully(): void
    {
        $response = $this->get('/tentang-kami');
        $response->assertStatus(200);
        $response->assertSee('Tentang Kami');
        $response->assertSee('Profil Resmi Perusahaan');
    }

    public function test_sitemap_xml_loads_with_valid_xml(): void
    {
        $response = $this->get('/sitemap.xml');
        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/xml; charset=utf-8');
        $response->assertSee('<urlset', false);
    }

    public function test_robots_txt_loads(): void
    {
        $response = $this->get('/robots.txt');
        $response->assertStatus(200);
        $response->assertSee('User-agent: *');
        $response->assertSee('User-agent: GPTBot');
        $response->assertSee('User-agent: PerplexityBot');
        $response->assertSee('User-agent: ClaudeBot');
        $response->assertSee('sitemap.xml');
        $response->assertSee('llms.txt');
    }

    public function test_llms_txt_loads_successfully_with_geo_knowledge(): void
    {
        $response = $this->get('/llms.txt');
        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'text/markdown; charset=utf-8');
        $response->assertSee('NazwaGraha Pratama');
        $response->assertSee('081298506111');
        $response->assertSee('nazwagraha@gmail.com');
        $response->assertSee('Jl. Banjarwangi 1 Blok A2 no.9 RT.2 RW.2 Banjarwangi');
        $response->assertSee('Ciawi');
        $response->assertSee('Bogor');
        $response->assertSee('Jasa Pembuatan Website');
    }

    public function test_homepage_contains_strict_seo_geo_and_pagespeed_optimizations(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        // GEO & Local SEO Meta Tags
        $response->assertSee('<meta name="geo.region" content="ID-JB">', false);
        $response->assertSee('<meta name="geo.placename" content="Bogor">', false);
        $response->assertSee('<meta name="geo.position" content="-6.6578;106.8524">', false);
        $response->assertSee('<meta name="ICBM" content="-6.6578, 106.8524">', false);

        // Core Web Vitals & Resource hints (PageSpeed 95+)
        $response->assertSee('<link rel="preconnect" href="https://cdn.tailwindcss.com" crossorigin>', false);
        $response->assertSee('rel="preload" as="image"', false);
        $response->assertSee('commercial_hero_workspace_mobile.webp', false);
        $response->assertSee('commercial_hero_workspace.webp', false);
        $response->assertSee('width="211"', false);
        $response->assertSee('height="80"', false); // Header Logo CLS fix
        $response->assertSee('width="1376"', false);
        $response->assertSee('height="768"', false); // Hero image CLS fix

        // Schema.org Structured Data
        $response->assertSee('"LocalBusiness"', false);
        $response->assertSee('"ITService"', false);
        $response->assertSee('"FAQPage"', false);
        $response->assertSee('Berapa biaya jasa pembuatan website di NazwaGraha Pratama?', false);
    }

    public function test_guest_is_redirected_from_admin(): void
    {
        $response = $this->get('/admin');
        $response->assertRedirect('/admin/login');
    }

    public function test_admin_can_login_and_access_dashboard_and_crud(): void
    {
        $admin = User::where('email', 'admin@nazwagraha.com')->first();
        $this->assertNotNull($admin);

        // Test login POST
        $loginResponse = $this->post('/admin/login', [
            'email' => 'admin@nazwagraha.com',
            'password' => 'Password123!',
        ]);
        $loginResponse->assertRedirect('/admin');

        // Test accessing admin pages as authenticated user
        $this->actingAs($admin);

        $this->get('/admin')->assertStatus(200)->assertSee('Dashboard');
        $this->get('/admin/categories')->assertStatus(200)->assertSee('Kategori Artikel');
        $this->get('/admin/articles')->assertStatus(200)->assertSee('Kelola Artikel');
        $this->get('/admin/articles/create')->assertStatus(200)->assertSee('Buat Artikel', false);
        $this->get('/admin/galleries')->assertStatus(200)->assertSee('Kelola Galeri');
        $this->get('/admin/galleries/create')->assertStatus(200)->assertSee('Tambah Foto Portofolio');
    }

    public function test_all_five_dedicated_service_pages_load_successfully(): void
    {
        // 1. Pembuatan Website
        $resWeb = $this->get('/layanan/pembuatan-website');
        $resWeb->assertStatus(200);
        $resWeb->assertSee('Jasa Pembuatan Website Bisnis');
        $resWeb->assertSee('Company Profile Pro');
        $resWeb->assertSee('081298506111');

        // 2. Optimasi SEO & GEO
        $resSeo = $this->get('/layanan/optimasi-seo-geo');
        $resSeo->assertStatus(200);
        $resSeo->assertSee('GEO (Generative AI Search)');
        $resSeo->assertSee('081298506111');

        // 3. Jaringan LAN & Server
        $resLan = $this->get('/layanan/jaringan-lan-server');
        $resLan->assertStatus(200);
        $resLan->assertSee('Jasa Instalasi Jaringan LAN');
        $resLan->assertSee('081298506111');

        // 4. Pengadaan Hardware IT
        $resHw = $this->get('/layanan/pengadaan-hardware-it');
        $resHw->assertStatus(200);
        $resHw->assertSee('Pengadaan Komputer &');
        $resHw->assertSee('081298506111');

        // 5. Servis & Troubleshooting
        $resSrv = $this->get('/layanan/servis-troubleshooting-komputer');
        $resSrv->assertStatus(200);
        $resSrv->assertSee('Jasa Servis Komputer &');
        $resSrv->assertSee('081298506111');
    }

    public function test_admin_can_manage_articles_with_seo_and_geo_fields(): void
    {
        $admin = User::first();
        $this->actingAs($admin);

        $category = Category::first();

        // 1. Create Article with new SEO & GEO fields
        $response = $this->post('/admin/articles', [
            'category_id' => $category->id,
            'title' => 'Strategi SEO dan GEO 2026 untuk UKM Bogor',
            'slug' => 'strategi-seo-geo-2026-ukm-bogor',
            'excerpt' => 'Panduan lengkap optimasi ranking 1 Google dan AI Search.',
            'content' => '<h2>Langkah Sukses</h2><p>Gunakan struktur H1 hingga H5 yang rapi serta gambar dengan alt text.</p>',
            'featured_image_alt' => 'Strategi SEO GEO Google UKM Bogor NazwaGraha',
            'meta_title' => 'Strategi SEO dan GEO 2026 UKM Bogor | NazwaGraha',
            'meta_description' => 'Tingkatkan omset bisnis Anda dengan optimasi SEO dan GEO AI Search terlengkap di Bogor.',
            'meta_keywords' => 'jasa seo bogor, geo ai search ciawi, web developer jabodetabek',
            'geo_target_region' => 'Bogor, Ciawi, Jabodetabek',
            'geo_summary' => 'NazwaGraha Pratama menyediakan jasa pembuatan website dan optimasi SEO/GEO di Bogor.',
            'is_published' => 1,
        ]);

        $response->assertRedirect('/admin/articles');
        $response->assertSessionHas('success');

        $createdArticle = Article::where('slug', 'strategi-seo-geo-2026-ukm-bogor')->first();
        $this->assertNotNull($createdArticle);
        $this->assertEquals('Strategi SEO GEO Google UKM Bogor NazwaGraha', $createdArticle->featured_image_alt);
        $this->assertEquals('jasa seo bogor, geo ai search ciawi, web developer jabodetabek', $createdArticle->meta_keywords);
        $this->assertEquals('Bogor, Ciawi, Jabodetabek', $createdArticle->geo_target_region);

        // 2. View on public frontend
        $publicRes = $this->get('/artikel/' . $createdArticle->slug);
        $publicRes->assertStatus(200);
        $publicRes->assertSee('Strategi SEO dan GEO 2026 UKM Bogor | NazwaGraha');
        $publicRes->assertSee('jasa seo bogor, geo ai search ciawi, web developer jabodetabek');

        // 3. Edit Article
        $editPage = $this->get('/admin/articles/' . $createdArticle->id . '/edit');
        $editPage->assertStatus(200);
        $editPage->assertSee('Edit Artikel');
        $editPage->assertSee('Strategi SEO GEO Google UKM Bogor NazwaGraha');

        // 4. Update Article
        $updateRes = $this->put('/admin/articles/' . $createdArticle->id, [
            'category_id' => $category->id,
            'title' => 'Strategi SEO dan GEO 2026 untuk UKM Bogor Terupdate',
            'content' => '<h3>Update Terbaru</h3><p>Konten yang diperbarui.</p>',
            'featured_image_alt' => 'Alt text yang diperbarui untuk SEO Google Images',
            'meta_title' => 'Strategi SEO dan GEO 2026 UKM Bogor Terupdate',
            'meta_description' => 'Meta description terupdate untuk cuplikan SERP Google.',
            'meta_keywords' => 'jasa seo bogor terupdate, konsultan it',
            'geo_target_region' => 'Bogor, Depok, Tangerang, Bekasi, Jakarta',
            'geo_summary' => 'Ringkasan AI GEO terupdate.',
            'is_published' => 1,
        ]);

        $updateRes->assertRedirect('/admin/articles');
        $createdArticle->refresh();
        $this->assertEquals('Strategi SEO dan GEO 2026 untuk UKM Bogor Terupdate', $createdArticle->title);
        $this->assertEquals('Alt text yang diperbarui untuk SEO Google Images', $createdArticle->featured_image_alt);
        $this->assertEquals('jasa seo bogor terupdate, konsultan it', $createdArticle->meta_keywords);
        $this->assertEquals('Bogor, Depok, Tangerang, Bekasi, Jakarta', $createdArticle->geo_target_region);
    }

    public function test_rich_text_editor_tools_and_frontend_typography_render_properly(): void
    {
        $admin = User::first();
        $this->actingAs($admin);

        // 1. Check create view has editor tools (Bullets, Numbering, Headings, etc.)
        $createRes = $this->get('/admin/articles/create');
        $createRes->assertStatus(200);
        $createRes->assertSee('id="btnBullets"', false);
        $createRes->assertSee('id="btnNumbering"', false);
        $createRes->assertSee('id="formatBlockSelect"', false);
        $createRes->assertSee('id="editorVisual"', false);
        $createRes->assertSee('list-style-type: disc', false);
        $createRes->assertSee('list-style-type: decimal', false);

        // 2. Check edit view has editor tools
        $article = Article::first();
        $editRes = $this->get('/admin/articles/' . $article->id . '/edit');
        $editRes->assertStatus(200);
        $editRes->assertSee('id="btnBullets"', false);
        $editRes->assertSee('id="btnNumbering"', false);
        $editRes->assertSee('id="formatBlockSelect"', false);
        $editRes->assertSee('id="editorVisual"', false);
        $editRes->assertSee('list-style-type: disc', false);
        $editRes->assertSee('list-style-type: decimal', false);

        // 3. Check public article view has article-content-body wrapper and CSS
        $publicRes = $this->get('/artikel/' . $article->slug);
        $publicRes->assertStatus(200);
        $publicRes->assertSee('article-content-body', false);
        $publicRes->assertSee('.article-content-body ul', false);
        $publicRes->assertSee('.article-content-body ol', false);
    }

    public function test_admin_can_upload_image_for_article_body(): void
    {
        Storage::fake('public');
        $admin = User::first();
        $this->actingAs($admin);

        $file = UploadedFile::fake()->image('diagram_lan.png', 1200, 800);

        $response = $this->postJson('/admin/articles/upload-image', [
            'image' => $file,
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
        ]);

        $json = $response->json();
        $this->assertNotEmpty($json['url']);
        $this->assertStringContainsString('/storage/articles/content/', $json['url']);
    }

    public function test_super_user_account_seeded_automatically_with_correct_credentials(): void
    {
        $superUser = User::where('email', 'nazwagraha@gmail.com')->first();
        $this->assertNotNull($superUser);
        $this->assertEquals('super_user', $superUser->role);
        $this->assertTrue($superUser->isSuperUser());
        $this->assertTrue($superUser->canDelete());
        $this->assertTrue(\Illuminate\Support\Facades\Hash::check('*Kake1978#!!!', $superUser->password));
    }

    public function test_super_user_is_hidden_from_management_user_table(): void
    {
        $supervisor = User::where('role', 'supervisor')->first();
        $this->actingAs($supervisor);

        $response = $this->get('/admin/users');
        $response->assertStatus(200);

        // Super User email must NOT be displayed in the management table
        $response->assertDontSee('nazwagraha@gmail.com');

        // Other users like supervisor and admin must be visible
        $response->assertSee('supervisor@nazwagraha.com');
        $response->assertSee('admin@nazwagraha.com');
    }

    public function test_supervisor_has_full_privileges_and_can_delete_data(): void
    {
        $supervisor = User::where('role', 'supervisor')->first();
        $this->actingAs($supervisor);

        // Can delete category
        $category = Category::create([
            'name' => 'Kategori Sementara',
            'slug' => 'kategori-sementara',
        ]);
        $delCatRes = $this->delete('/admin/categories/' . $category->id);
        $delCatRes->assertRedirect('/admin/categories');
        $this->assertDatabaseMissing('categories', ['id' => $category->id]);

        // Can delete article
        $article = Article::first();
        $delArtRes = $this->delete('/admin/articles/' . $article->id);
        $delArtRes->assertRedirect('/admin/articles');
        $this->assertDatabaseMissing('articles', ['id' => $article->id]);
    }

    public function test_admin_can_view_create_and_edit_but_cannot_delete_any_data(): void
    {
        $admin = User::where('role', 'admin')->first();
        $this->actingAs($admin);
        $this->assertFalse($admin->canDelete());

        // 1. Admin can view dashboard & management user
        $this->get('/admin/users')->assertStatus(200);

        // 2. Admin can create user
        $newUserRes = $this->post('/admin/users', [
            'name' => 'Staf Baru',
            'email' => 'stafbaru@nazwagraha.com',
            'role' => 'admin',
            'password' => 'Password123!',
            'password_confirmation' => 'Password123!',
        ]);
        $newUserRes->assertRedirect('/admin/users');
        $newUser = User::where('email', 'stafbaru@nazwagraha.com')->first();
        $this->assertNotNull($newUser);

        // 3. Admin CANNOT delete category -> 403 Forbidden
        $cat = Category::first();
        $delCatRes = $this->delete('/admin/categories/' . $cat->id);
        $delCatRes->assertStatus(403);
        $this->assertDatabaseHas('categories', ['id' => $cat->id]);

        // 4. Admin CANNOT delete article -> 403 Forbidden
        $art = Article::first();
        $delArtRes = $this->delete('/admin/articles/' . $art->id);
        $delArtRes->assertStatus(403);
        $this->assertDatabaseHas('articles', ['id' => $art->id]);

        // 5. Admin CANNOT delete gallery -> 403 Forbidden
        $gal = Gallery::first();
        if ($gal) {
            $delGalRes = $this->delete('/admin/galleries/' . $gal->id);
            $delGalRes->assertStatus(403);
            $this->assertDatabaseHas('galleries', ['id' => $gal->id]);
        }

        // 6. Admin CANNOT delete user -> 403 Forbidden
        $delUserRes = $this->delete('/admin/users/' . $newUser->id);
        $delUserRes->assertStatus(403);
        $this->assertDatabaseHas('users', ['id' => $newUser->id]);
    }

    public function test_dashboard_displays_active_logged_in_user_profile(): void
    {
        $supervisor = User::where('role', 'supervisor')->first();
        $this->actingAs($supervisor);

        $response = $this->get('/admin');
        $response->assertStatus(200);
        $response->assertSee('Sesi Login Pengguna Aktif');
        $response->assertSee($supervisor->name);
        $response->assertSee($supervisor->email);
        $response->assertSee('Supervisor (Full Privilege)');

        $admin = User::where('role', 'admin')->first();
        $this->actingAs($admin);

        $responseAdmin = $this->get('/admin');
        $responseAdmin->assertStatus(200);
        $responseAdmin->assertSee($admin->name);
        $responseAdmin->assertSee('Administrator (Input & Edit)', false);
    }

    public function test_user_can_be_created_and_updated_with_avatar_photo(): void
    {
        Storage::fake('public');
        $supervisor = User::where('role', 'supervisor')->first();
        $this->actingAs($supervisor);

        $avatarFile = UploadedFile::fake()->image('profile.jpg', 300, 300);

        // 1. Create with avatar
        $createRes = $this->post('/admin/users', [
            'name' => 'Budi Staff',
            'email' => 'budi@nazwagraha.com',
            'role' => 'admin',
            'password' => 'Password123!',
            'password_confirmation' => 'Password123!',
            'avatar' => $avatarFile,
        ]);

        $createRes->assertRedirect('/admin/users');
        $user = User::where('email', 'budi@nazwagraha.com')->first();
        $this->assertNotNull($user);
        $this->assertNotNull($user->avatar);
        $this->assertStringContainsString('storage/avatars/', $user->avatar);

        // 2. Update with new avatar
        $newAvatar = UploadedFile::fake()->image('new_profile.png', 400, 400);
        $updateRes = $this->put('/admin/users/' . $user->id, [
            'name' => 'Budi Staff Updated',
            'email' => 'budi@nazwagraha.com',
            'role' => 'supervisor',
            'avatar' => $newAvatar,
        ]);

        $updateRes->assertRedirect('/admin/users');
        $user->refresh();
        $this->assertEquals('Budi Staff Updated', $user->name);
        $this->assertEquals('supervisor', $user->role);
        $this->assertNotNull($user->avatar);
    }

    public function test_admin_and_supervisor_can_view_contact_messages_list_and_details(): void
    {
        $admin = User::where('role', 'admin')->first();
        $this->actingAs($admin);

        $msg = ContactMessage::create([
            'name' => 'Pak Ahmad Subarjo',
            'phone' => '081298506111',
            'email' => 'ahmad@ptmaju.com',
            'service' => 'Instalasi & Penataan Jaringan LAN Kantor',
            'message' => 'Kantor kami membutuhkan instalasi kabel LAN dan setting mikrotik untuk 3 lantai.',
            'ip_address' => '127.0.0.1',
            'is_read' => false,
        ]);

        // 1. Check index page displays message
        $response = $this->get('/admin/contact-messages');
        $response->assertStatus(200);
        $response->assertSee('Pak Ahmad Subarjo');
        $response->assertSee('Instalasi & Penataan Jaringan LAN Kantor');

        // 2. Check show page marks as read
        $showResponse = $this->get('/admin/contact-messages/' . $msg->id);
        $showResponse->assertStatus(200);
        $showResponse->assertSee('Pak Ahmad Subarjo');
        $showResponse->assertSee('Kantor kami membutuhkan instalasi kabel LAN');

        $msg->refresh();
        $this->assertTrue($msg->is_read);

        // 3. Test toggle read
        $toggleRes = $this->patch('/admin/contact-messages/' . $msg->id . '/toggle-read');
        $toggleRes->assertRedirect();
        $msg->refresh();
        $this->assertFalse($msg->is_read);
    }

    public function test_admin_cannot_delete_contact_message_but_supervisor_can(): void
    {
        $msg = ContactMessage::create([
            'name' => 'Client To Delete',
            'phone' => '081298506111',
            'email' => 'client@todelete.com',
            'service' => 'Aplikasi Web Kustom / Sistem ERP',
            'message' => 'Testing deletion security protection.',
            'is_read' => true,
        ]);

        // 1. Admin CANNOT delete -> 403 Forbidden
        $admin = User::where('role', 'admin')->first();
        $this->actingAs($admin);
        $deleteAdmin = $this->delete('/admin/contact-messages/' . $msg->id);
        $deleteAdmin->assertStatus(403);
        $this->assertDatabaseHas('contact_messages', ['id' => $msg->id]);

        // 2. Supervisor CAN delete -> 302 Redirect
        $supervisor = User::where('role', 'supervisor')->first();
        $this->actingAs($supervisor);
        $deleteSpv = $this->delete('/admin/contact-messages/' . $msg->id);
        $deleteSpv->assertRedirect('/admin/contact-messages');
        $this->assertDatabaseMissing('contact_messages', ['id' => $msg->id]);
    }
}
