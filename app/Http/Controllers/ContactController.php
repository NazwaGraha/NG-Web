<?php

namespace App\Http\Controllers;

use App\Mail\ContactInquiryMail;
use App\Models\Inquiry;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;

class ContactController extends Controller
{
    /**
     * Common site settings for the contact page.
     */
    protected function getCommonSettings(): array
    {
        $settings = [
            'site_title' => 'NazwaGraha - Jasa Pembuatan Website Murah & Konsultan IT Murah',
            'whatsapp' => '081298506111',
            'phone' => '0812 98 506 111',
            'email' => 'nazwagraha@gmail.com',
            'address' => 'Jl. Banjarwangi 1 Blok A2 no.9 RT.2 RW.2 Banjarwangi Ciawi Bogor, Jawa Barat',
            'city' => 'Ciawi',
            'province' => 'Bogor, Jawa Barat',
            'postal_code' => '16720',
            'opening_hours' => 'Senin - Sabtu: 08.00 - 18.00 WIB',
            'maps_embed_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.742749130914!2d106.85809447538949!3d-6.678759265294222!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c9d0f298daa1%3A0x54b04c9a934c6352!2sNazwaGraha%20-%20Jasa%20Pembuatan%20Website%20Bogor%20%26%20Solusi%20IT!5e0!3m2!1sid!2sid!4v1794401102409!5m2!1sid!2sid',
            'maps_direct_url' => 'https://www.google.com/maps/place/NazwaGraha+-+Jasa+Pembuatan+Website+Bogor+%26+Solusi+IT/@-6.6787593,106.8580945,17z',
        ];

        try {
            if (Schema::hasTable('site_settings')) {
                $dbSettings = SiteSetting::pluck('value', 'key')->toArray();
                $settings = array_merge($settings, $dbSettings);
            }
        } catch (\Throwable $e) {
            // fallback
        }

        return $settings;
    }

    /**
     * Display the Contact Us page.
     */
    public function index()
    {
        $settings = $this->getCommonSettings();

        // 1. ContactPage Schema JSON-LD
        $schemaContactPage = [
            '@context' => 'https://schema.org',
            '@type' => 'ContactPage',
            'name' => 'Hubungi NazwaGraha - Contact Us',
            'description' => 'Hubungi tim NazwaGraha untuk konsultasi gratis jasa pembuatan website murah, jasa SEO bergaransi, instalasi LAN, pengadaan komputer, dan konsultan IT di Bogor & Ciawi.',
            'url' => route('contact.index'),
            'mainEntity' => [
                '@type' => 'ProfessionalService',
                'name' => 'NazwaGraha - Jasa Pembuatan Website & Konsultan IT Murah',
                'telephone' => '+6281298506111',
                'email' => $settings['email'],
                'url' => url('/'),
                'address' => [
                    '@type' => 'PostalAddress',
                    'streetAddress' => $settings['address'],
                    'addressLocality' => $settings['city'],
                    'addressRegion' => $settings['province'],
                    'postalCode' => $settings['postal_code'],
                    'addressCountry' => 'ID',
                ],
                'geo' => [
                    '@type' => 'GeoCoordinates',
                    'latitude' => -6.678759,
                    'longitude' => 106.858094,
                ],
                'openingHoursSpecification' => [
                    '@type' => 'OpeningHoursSpecification',
                    'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
                    'opens' => '08:00',
                    'closes' => '18:00',
                ],
            ],
        ];

        // 2. Breadcrumbs Schema
        $schemaBreadcrumb = [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                [
                    '@type' => 'ListItem',
                    'position' => 1,
                    'name' => 'Beranda',
                    'item' => url('/'),
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 2,
                    'name' => 'Contact Us',
                    'item' => route('contact.index'),
                ],
            ],
        ];

        // 3. Local Business Schema
        $schemaLocalBusiness = [
            '@context' => 'https://schema.org',
            '@type' => 'ProfessionalService',
            'name' => 'NazwaGraha',
            'image' => asset('assets/images/hero-technology.webp'),
            'telephone' => '+6281298506111',
            'email' => $settings['email'],
            'hasMap' => $settings['maps_direct_url'],
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => $settings['address'],
                'addressLocality' => $settings['city'],
                'addressRegion' => $settings['province'],
                'postalCode' => $settings['postal_code'],
                'addressCountry' => 'ID',
            ],
            'geo' => [
                '@type' => 'GeoCoordinates',
                'latitude' => -6.678759,
                'longitude' => 106.858094,
            ],
        ];

        return view('contact', compact(
            'settings',
            'schemaContactPage',
            'schemaBreadcrumb',
            'schemaLocalBusiness'
        ));
    }

    /**
     * Handle the contact form submission.
     */
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'whatsapp' => 'required|string|max:30',
            'email' => 'required|email|max:150',
            'service_name' => 'nullable|string|max:150',
            'subject' => 'nullable|string|max:200',
            'message' => 'required|string|max:3000',
        ]);

        // Clean WhatsApp number
        $cleanWa = preg_replace('/[^0-9]/', '', $validated['whatsapp']);
        if (str_starts_with($cleanWa, '0')) {
            $cleanWa = '62' . substr($cleanWa, 1);
        }

        $serviceChosen = !empty($validated['service_name']) ? $validated['service_name'] : 'Konsultasi Umum IT';
        $fullMessage = !empty($validated['subject'])
            ? "[Subjek: {$validated['subject']}]\n\n" . $validated['message']
            : $validated['message'];

        // 1. Save to Database (Inquiries table)
        try {
            if (Schema::hasTable('inquiries')) {
                Inquiry::create([
                    'name' => $validated['name'],
                    'whatsapp' => $validated['whatsapp'],
                    'email' => $validated['email'],
                    'service_name' => $serviceChosen,
                    'message' => $fullMessage,
                    'status' => 'baru',
                    'ip_address' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                ]);
            }
        } catch (\Throwable $e) {
            Log::error('Failed to save contact inquiry to database: ' . $e->getMessage());
        }

        // 2. Send email directly to NazwaGraha
        $targetEmail = config('auth.master_admin.email', 'nazwagraha@gmail.com');
        $inquiryData = [
            'name' => $validated['name'],
            'whatsapp' => $validated['whatsapp'],
            'clean_whatsapp' => $cleanWa,
            'email' => $validated['email'],
            'service_name' => $serviceChosen,
            'subject' => $validated['subject'] ?? null,
            'message' => $validated['message'],
            'ip_address' => $request->ip(),
        ];

        try {
            Mail::to($targetEmail)->send(new ContactInquiryMail($inquiryData));
        } catch (\Throwable $e) {
            Log::error('Failed to send contact inquiry email: ' . $e->getMessage());
        }

        // 3. Prepare response
        $adminWa = '6281298506111';
        $waText = "Halo NazwaGraha, saya *{$validated['name']}* telah mengirimkan pertanyaan via halaman Contact Us website.\nLayanan: *{$serviceChosen}*\nEmail: {$validated['email']}\n\nPesan: {$validated['message']}";
        $waUrl = "https://wa.me/{$adminWa}?text=" . rawurlencode($waText);

        $successMessage = "Terima kasih, {$validated['name']}! Pertanyaan Anda telah berhasil terkirim ke email tim NazwaGraha ({$targetEmail}). Kami akan segera menghubungi Anda kembali.";

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => $successMessage,
                'whatsapp_url' => $waUrl,
            ]);
        }

        return redirect()->route('contact.index')
            ->with('success', $successMessage)
            ->with('whatsapp_url', $waUrl);
    }
}
