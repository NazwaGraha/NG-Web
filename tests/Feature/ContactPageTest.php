<?php

namespace Tests\Feature;

use App\Mail\ContactInquiryMail;
use App\Models\Inquiry;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactPageTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test Contact Us page loads with 200 OK and all required information.
     */
    public function test_contact_page_loads_successfully_with_required_elements(): void
    {
        $response = $this->get('/contact-us');

        $response->assertStatus(200);

        // Core Headings & Identity
        $response->assertSee('Hubungi Kami - Jasa Website');
        $response->assertSee('Konsultasi Gratis Bersama');
        $response->assertSee('Tim IT NazwaGraha');

        // Contact Information Cards
        $response->assertSee('0812 98 506 111');
        $response->assertSee('nazwagraha@gmail.com');
        $response->assertSee('Jl. Banjarwangi 1 Blok A2 no.9 RT.2 RW.2 Banjarwangi Ciawi Bogor, Jawa Barat');
        $response->assertSee('Senin - Sabtu: 08.00 - 18.00 WIB');
        $response->assertSee('Kepuasan Klien 4.9 / 5.0');

        // Form Fields
        $response->assertSee('id="contact-form"', false);
        $response->assertSee('name="name"', false);
        $response->assertSee('name="whatsapp"', false);
        $response->assertSee('name="email"', false);
        $response->assertSee('name="service_name"', false);
        $response->assertSee('name="subject"', false);
        $response->assertSee('name="message"', false);
        $response->assertSee('Kirim Pesan Sekarang');

        // Google Maps Embed & Link
        $response->assertSee('google.com/maps/embed', false);
        $response->assertSee('NazwaGraha%20-%20Jasa%20Pembuatan%20Website%20Bogor%20%26%20Solusi%20IT', false);
        $response->assertSee('google.com/maps/place/NazwaGraha', false);

        // SEO & Schemas
        $response->assertSee('ContactPage', false);
        $response->assertSee('ProfessionalService', false);
        $response->assertSee('BreadcrumbList', false);
    }

    /**
     * Test Indonesian alias routes redirect permanently (301) to /contact-us.
     */
    public function test_contact_aliases_redirect_to_contact_us(): void
    {
        $responseKontak = $this->get('/kontak');
        $responseKontak->assertStatus(301);
        $responseKontak->assertRedirect('/contact-us');

        $responseHubungiKami = $this->get('/hubungi-kami');
        $responseHubungiKami->assertStatus(301);
        $responseHubungiKami->assertRedirect('/contact-us');
    }

    /**
     * Test submitting the contact form sends email to NazwaGraha and saves to database.
     */
    public function test_contact_form_submission_sends_email_and_saves_to_database(): void
    {
        Mail::fake();

        $formData = [
            'name' => 'Budi Santoso',
            'whatsapp' => '081234567890',
            'email' => 'budisantoso@example.com',
            'service_name' => 'Jasa Pembuatan Website Murah',
            'subject' => 'Tanya Pembuatan Website Toko Online',
            'message' => 'Halo tim NazwaGraha, saya ingin membuat website toko online untuk produk UMKM di Bogor.',
        ];

        $response = $this->post('/contact-us', $formData);

        $response->assertStatus(302);
        $response->assertRedirect('/contact-us');
        $response->assertSessionHas('success');

        // 1. Verify Saved in Database
        $this->assertDatabaseHas('inquiries', [
            'name' => 'Budi Santoso',
            'whatsapp' => '081234567890',
            'email' => 'budisantoso@example.com',
            'service_name' => 'Jasa Pembuatan Website Murah',
            'status' => 'baru',
        ]);

        // 2. Verify Email Sent to NazwaGraha
        Mail::assertSent(ContactInquiryMail::class, function ($mail) use ($formData) {
            return $mail->hasTo('nazwagraha@gmail.com') &&
                   $mail->inquiryData['name'] === $formData['name'] &&
                   $mail->inquiryData['email'] === $formData['email'] &&
                   $mail->inquiryData['subject'] === $formData['subject'];
        });
    }

    /**
     * Test submitting the contact form via AJAX returns JSON response.
     */
    public function test_contact_form_ajax_submission_returns_json(): void
    {
        Mail::fake();

        $formData = [
            'name' => 'Siti Rahma',
            'whatsapp' => '089876543210',
            'email' => 'sitirahma@example.com',
            'service_name' => 'Jasa SEO Murah Bergaransi',
            'message' => 'Mohon info biaya optimasi SEO lokal untuk klinik kesehatan di Ciawi Bogor.',
        ];

        $response = $this->postJson('/contact-us', $formData);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'status',
            'message',
            'whatsapp_url',
        ]);
        $response->assertJson([
            'status' => 'success',
        ]);

        $this->assertDatabaseHas('inquiries', [
            'name' => 'Siti Rahma',
            'email' => 'sitirahma@example.com',
        ]);

        Mail::assertSent(ContactInquiryMail::class);
    }

    /**
     * Test contact form validation requires mandatory fields.
     */
    public function test_contact_form_validation_requires_mandatory_fields(): void
    {
        Mail::fake();

        $response = $this->post('/contact-us', [
            'name' => '',
            'whatsapp' => '',
            'email' => 'invalid-email',
            'message' => '',
        ]);

        $response->assertSessionHasErrors(['name', 'whatsapp', 'email', 'message']);
        Mail::assertNothingSent();
    }

    /**
     * Test inquiry from contact form appears in admin backoffice inquiries list.
     */
    public function test_contact_inquiry_appears_in_admin_backoffice(): void
    {
        $admin = User::factory()->create([
            'email' => 'nazwagraha@gmail.com',
        ]);

        Inquiry::create([
            'name' => 'Dewi Lestari',
            'whatsapp' => '081311223344',
            'email' => 'dewi@example.com',
            'service_name' => 'Instalasi Jaringan LAN & Wi-Fi',
            'message' => 'Pertanyaan setup router mikrotik kantor.',
            'status' => 'baru',
        ]);

        $response = $this->actingAs($admin)->get('/admin/inquiries');

        $response->assertStatus(200);
        $response->assertSee('Dewi Lestari');
        $response->assertSee('dewi@example.com');
        $response->assertSee('Instalasi Jaringan LAN &amp; Wi-Fi', false);
    }
}
