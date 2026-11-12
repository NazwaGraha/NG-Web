<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    /**
     * Display a listing of client inquiries / leads.
     */
    public function index(Request $request)
    {
        $query = Inquiry::query();

        if ($request->filled('status')) {
            $query->where('status', $request->get('status'));
        }

        if ($request->filled('q')) {
            $search = trim($request->get('q'));
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('whatsapp', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('service_name', 'like', "%{$search}%")
                  ->orWhere('company_name', 'like', "%{$search}%");
            });
        }

        $inquiries = $query->orderByDesc('created_at')->paginate(15)->withQueryString();

        return view('admin.inquiries.index', compact('inquiries'));
    }

    /**
     * Update the inquiry status.
     */
    public function updateStatus(Request $request, Inquiry $inquiry)
    {
        $validated = $request->validate([
            'status' => ['required', 'string', 'in:baru,dihubungi,selesai,batal'],
        ]);

        $inquiry->update(['status' => $validated['status']]);

        return redirect()->back()
            ->with('success', 'Status prospek berhasil diperbarui menjadi ' . ucfirst($validated['status']));
    }

    /**
     * Delete an inquiry.
     */
    public function destroy(Inquiry $inquiry)
    {
        $inquiry->delete();

        return redirect()->route('admin.inquiries.index')
            ->with('success', 'Data prospek berhasil dihapus.');
    }
}
