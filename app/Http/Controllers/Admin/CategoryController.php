<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('articles')->latest()->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string|max:500',
        ]);

        $slug = Str::slug($validated['name']);
        // Ensure uniqueness
        $count = Category::where('slug', 'like', "{$slug}%")->count();
        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }

        Category::create([
            'name' => $validated['name'],
            'slug' => $slug,
            'description' => $validated['description'] ?? null,
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Kategori baru berhasil ditambahkan!');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string|max:500',
        ]);

        if ($validated['name'] !== $category->name) {
            $slug = Str::slug($validated['name']);
            $count = Category::where('slug', 'like', "{$slug}%")->where('id', '!=', $category->id)->count();
            if ($count > 0) {
                $slug .= '-' . ($count + 1);
            }
            $category->slug = $slug;
        }

        $category->name = $validated['name'];
        $category->description = $validated['description'] ?? null;
        $category->save();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Kategori berhasil diperbarui!');
    }

    public function destroy(Category $category)
    {
        if (!\Illuminate\Support\Facades\Auth::user()->canDelete()) {
            abort(403, 'Akses ditolak: Akun bertipe Admin tidak memiliki izin untuk menghapus data.');
        }

        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Kategori berhasil dihapus!');
    }
}
