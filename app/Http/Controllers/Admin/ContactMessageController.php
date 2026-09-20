<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index(Request $request)
    {
        $query = ContactMessage::query();

        // Filter search (name, phone, email, service, message)
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('service', 'like', "%{$search}%")
                  ->orWhere('message', 'like', "%{$search}%");
            });
        }

        // Filter by read status
        if ($request->filled('status')) {
            if ($request->status === 'unread') {
                $query->where('is_read', false);
            } elseif ($request->status === 'read') {
                $query->where('is_read', true);
            }
        }

        $totalMessages = ContactMessage::count();
        $unreadCount = ContactMessage::where('is_read', false)->count();

        $messages = $query->latest()->paginate(15)->withQueryString();

        return view('admin.contact_messages.index', compact('messages', 'totalMessages', 'unreadCount'));
    }

    public function show(ContactMessage $contactMessage)
    {
        // Otomatis tandai sebagai sudah dibaca saat dibuka
        if (!$contactMessage->is_read) {
            $contactMessage->update(['is_read' => true]);
        }

        return view('admin.contact_messages.show', compact('contactMessage'));
    }

    public function toggleRead(ContactMessage $contactMessage)
    {
        $contactMessage->update(['is_read' => !$contactMessage->is_read]);

        $statusText = $contactMessage->is_read ? 'sudah dibaca' : 'belum dibaca';

        return back()->with('success', "Status pesan dari {$contactMessage->name} diubah menjadi {$statusText}.");
    }

    public function destroy(ContactMessage $contactMessage)
    {
        // Izin hapus dibatasi oleh middleware can.delete (hanya Super User & Supervisor)
        $name = $contactMessage->name;
        $contactMessage->delete();

        return redirect()->route('admin.contact-messages.index')
            ->with('success', "Pesan formulir dari '{$name}' berhasil dihapus.");
    }
}
