<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class InquiryController extends Controller
{
    /**
     * Store an inquiry/order lead and redirect to WhatsApp.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'whatsapp' => 'required|string|max:30',
            'service_name' => 'nullable|string|max:150',
            'company_name' => 'nullable|string|max:150',
            'budget_range' => 'nullable|string|max:100',
            'message' => 'nullable|string|max:2000',
        ]);

        // Clean WhatsApp number
        $cleanWa = preg_replace('/[^0-9]/', '', $validated['whatsapp']);
        if (str_starts_with($cleanWa, '0')) {
            $cleanWa = '62' . substr($cleanWa, 1);
        }

        // Save to Database
        try {
            if (Schema::hasTable('inquiries')) {
                Inquiry::create([
                    'name' => $validated['name'],
                    'whatsapp' => $validated['whatsapp'],
                    'service_name' => $validated['service_name'] ?? 'Konsultasi Umum Website & IT',
                    'company_name' => $validated['company_name'] ?? null,
                    'budget_range' => $validated['budget_range'] ?? null,
                    'message' => $validated['message'] ?? null,
                    'status' => 'baru',
                    'ip_address' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                ]);
            }
        } catch (\Throwable $e) {
            // Log error silently, do not interrupt the customer's ordering flow
        }

        // WhatsApp destination number
        $adminWa = '6281298506111';
        try {
            $settingWa = SiteSetting::get('whatsapp', '081298506111');
            $adminWa = preg_replace('/[^0-9]/', '', $settingWa);
            if (str_starts_with($adminWa, '0')) {
                $adminWa = '62' . substr($adminWa, 1);
            }
        } catch (\Throwable $e) {
            $adminWa = '6281298506111';
        }

        $serviceChosen = $validated['service_name'] ?? 'Jasa Pembuatan Website Murah / Konsultan IT Murah';
        $customerName = $validated['name'];
        $notes = !empty($validated['message']) ? "\n*Kebutuhan:* " . $validated['message'] : '';
        $company = !empty($validated['company_name']) ? "\n*Perusahaan / Usaha:* " . $validated['company_name'] : '';
        $budget = !empty($validated['budget_range']) ? "\n*Estimasi Anggaran:* " . $validated['budget_range'] : '';

        $waText = "Halo NazwaGraha, saya *{$customerName}*.\nSaya ingin konsultasi / order layanan: *{$serviceChosen}*{$company}{$budget}{$notes}\n\nMohon info rekomendasi dan penawaran terbaiknya. Terima kasih!";
        $waUrl = "https://wa.me/{$adminWa}?text=" . rawurlencode($waText);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Terima kasih! Pesanan Anda telah tersimpan. Mengalihkan ke WhatsApp...',
                'whatsapp_url' => $waUrl,
            ]);
        }

        return redirect()->away($waUrl);
    }
}
