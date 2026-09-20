<?php

namespace App\Http\Controllers;

use App\Mail\ContactInquiryMail;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $contactInfo = [
            'company' => 'NazwaGraha Pratama (NGP)',
            'phone' => '081298506111',
            'phone_intl' => '6281298506111',
            'email' => 'nazwagraha@gmail.com',
            'address' => 'Jl. Banjarwangi 1 Blok A2 no.9 RT.2 RW.2 Banjarwangi Ciawi Bogor',
            'hours' => 'Senin - Sabtu: 08:00 - 18:00 WIB (Emergency 24/7)',
        ];

        return view('pages.contact', compact('contactInfo'));
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'required|string|max:30',
            'email' => 'nullable|email|max:150',
            'service' => 'required|string|max:150',
            'message' => 'required|string|max:3000',
        ], [
            'name.required' => 'Nama lengkap atau nama perusahaan wajib diisi.',
            'phone.required' => 'Nomor WhatsApp / telepon wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'service.required' => 'Pilih salah satu layanan yang Anda butuhkan.',
            'message.required' => 'Tuliskan detail kebutuhan atau pertanyaan Anda.',
        ]);

        $contactData = [
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'] ?? null,
            'service' => $validated['service'],
            'message' => $validated['message'],
            'ip_address' => $request->ip(),
        ];

        // 1. Simpan pesan ke database agar riwayat aman & terekam
        try {
            ContactMessage::create($contactData);
        } catch (\Throwable $e) {
            Log::warning('Gagal menyimpan pesan kontak ke database: ' . $e->getMessage());
        }

        // 2. Kirim pesan langsung ke email tujuan nazwagraha@gmail.com
        try {
            Mail::to('nazwagraha@gmail.com')->send(new ContactInquiryMail($contactData));
        } catch (\Throwable $e) {
            Log::error('Gagal mengirim email kontak ke nazwagraha@gmail.com: ' . $e->getMessage());
        }

        // 3. Siapkan tautan WhatsApp resmi sebagai opsi instan tambahan
        $cleanPhone = preg_replace('/[^0-9]/', '', (string)$validated['phone']);
        $text = "Halo Tim NazwaGraha Pratama,%0A%0A"
              . "Saya telah mengirim formulir website:%0A"
              . "• Nama: " . urlencode($validated['name']) . "%0A"
              . "• No. WA: " . urlencode($validated['phone']) . "%0A"
              . (!empty($validated['email']) ? ("• Email: " . urlencode($validated['email']) . "%0A") : "")
              . "• Kebutuhan: " . urlencode($validated['service']) . "%0A"
              . "• Pesan: " . urlencode($validated['message']) . "%0A%0A"
              . "Mohon dapat dihubungi. Terima kasih!";

        $whatsappUrl = "https://wa.me/6281298506111?text={$text}";

        return redirect()->route('contact.index')
            ->with('success', 'Formulir berhasil dikirim langsung ke email nazwagraha@gmail.com! Tim NazwaGraha Pratama akan segera mempelajari dan menghubungi Anda.')
            ->with('whatsapp_url', $whatsappUrl);
    }
}
