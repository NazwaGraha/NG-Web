<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Gallery;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $query = Gallery::query();

        if ($request->filled('kategori')) {
            $query->where('category', $request->kategori);
        }

        $galleries = $query->orderBy('sort_order', 'asc')->latest()->paginate(12)->withQueryString();

        $categories = [
            'website' => 'Pembuatan Website & App',
            'jaringan' => 'Instalasi Jaringan LAN',
            'hardware' => 'Pengadaan Hardware IT',
            'support' => 'Dokumentasi Tim & Servis',
        ];

        return view('admin.galleries.index', compact('galleries', 'categories'));
    }

    public function create()
    {
        $categories = [
            'website' => 'Pembuatan Website & App',
            'jaringan' => 'Instalasi Jaringan LAN',
            'hardware' => 'Pengadaan Hardware IT',
            'support' => 'Dokumentasi Tim & Servis',
        ];
        return view('admin.galleries.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|in:website,jaringan,hardware,support',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
            'description' => 'nullable|string|max:1000',
            'sort_order' => 'nullable|integer',
            'is_featured' => 'nullable|boolean',
        ]);

        $file = $request->file('image');
        $filename = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('gallery', $filename, 'public');

        Gallery::create([
            'title' => $validated['title'],
            'category' => $validated['category'],
            'image_path' => 'storage/' . $path,
            'description' => $validated['description'] ?? null,
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_featured' => $request->has('is_featured'),
        ]);

        return redirect()->route('admin.galleries.index')
            ->with('success', 'Foto baru berhasil ditambahkan ke galeri!');
    }

    public function edit(Gallery $gallery)
    {
        $categories = [
            'website' => 'Pembuatan Website & App',
            'jaringan' => 'Instalasi Jaringan LAN',
            'hardware' => 'Pengadaan Hardware IT',
            'support' => 'Dokumentasi Tim & Servis',
        ];
        return view('admin.galleries.edit', compact('gallery', 'categories'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|in:website,jaringan,hardware,support',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'description' => 'nullable|string|max:1000',
            'sort_order' => 'nullable|integer',
            'is_featured' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($gallery->image_path && str_starts_with($gallery->image_path, 'storage/gallery/')) {
                $oldPath = str_replace('storage/', '', $gallery->image_path);
                Storage::disk('public')->delete($oldPath);
            }
            $file = $request->file('image');
            $filename = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('gallery', $filename, 'public');
            $gallery->image_path = 'storage/' . $path;
        }

        $gallery->title = $validated['title'];
        $gallery->category = $validated['category'];
        $gallery->description = $validated['description'] ?? null;
        $gallery->sort_order = $validated['sort_order'] ?? 0;
        $gallery->is_featured = $request->has('is_featured');
        $gallery->save();

        return redirect()->route('admin.galleries.index')
            ->with('success', 'Foto galeri berhasil diperbarui!');
    }

    public function destroy(Gallery $gallery)
    {
        if (!\Illuminate\Support\Facades\Auth::user()->canDelete()) {
            abort(403, 'Akses ditolak: Akun bertipe Admin tidak memiliki izin untuk menghapus data.');
        }

        if ($gallery->image_path && str_starts_with($gallery->image_path, 'storage/gallery/')) {
            $oldPath = str_replace('storage/', '', $gallery->image_path);
            Storage::disk('public')->delete($oldPath);
        }

        $gallery->delete();

        return redirect()->route('admin.galleries.index')
            ->with('success', 'Foto galeri berhasil dihapus!');
    }
}
