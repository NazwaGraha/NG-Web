<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::with('category');

        if ($request->filled('q')) {
            $query->where('title', 'like', "%{$request->q}%");
        }

        if ($request->filled('kategori')) {
            $query->where('category_id', $request->kategori);
        }

        $articles = $query->latest()->paginate(10)->withQueryString();
        $categories = Category::all();

        return view('admin.articles.index', compact('articles', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.articles.create', compact('categories'));
    }

    public function uploadImage(Request $request)
    {
        if (!$request->hasFile('image')) {
            return response()->json([
                'success' => false,
                'message' => 'File gambar wajib dipilih.',
            ], 422);
        }

        $file = $request->file('image');
        if (!$file->isValid()) {
            return response()->json([
                'success' => false,
                'message' => 'Upload gagal: ' . $file->getErrorMessage(),
            ], 422);
        }

        $validator = Validator::make($request->all(), [
            'image' => 'required|file|max:15360',
        ], [
            'image.required' => 'File gambar wajib dipilih.',
            'image.file' => 'Upload harus berupa file yang valid.',
            'image.max' => 'Ukuran gambar maksimal adalah 15 MB.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
            ], 422);
        }

        $extension = strtolower($file->getClientOriginalExtension() ?: $file->guessExtension() ?: 'png');
        $allowedExtensions = ['jpeg', 'png', 'jpg', 'webp', 'gif', 'svg', 'bmp', 'avif'];

        if (!in_array($extension, $allowedExtensions)) {
            return response()->json([
                'success' => false,
                'message' => 'Format file .' . $extension . ' tidak didukung. Harap gunakan format WEBP, PNG, JPG, atau AVIF.',
            ], 422);
        }

        $filename = time() . '_' . Str::random(10) . '.' . $extension;
        $path = $file->storeAs('articles/content', $filename, 'public');

        return response()->json([
            'success' => true,
            'url' => asset('storage/' . $path),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'featured_image' => 'nullable|file|mimes:jpeg,png,jpg,webp,gif,svg,bmp,avif|max:5120',
            'featured_image_alt' => 'nullable|string|max:255',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:500',
            'geo_target_region' => 'nullable|string|max:255',
            'geo_summary' => 'nullable|string|max:1000',
            'is_published' => 'nullable|boolean',
        ]);

        $slug = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['title']);
        $count = Article::where('slug', 'like', "{$slug}%")->count();
        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }

        $imagePath = null;
        if ($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $filename = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('articles', $filename, 'public');
            $imagePath = 'storage/' . $path;
        }

        $isPublished = $request->has('is_published');

        Article::create([
            'category_id' => $validated['category_id'],
            'title' => $validated['title'],
            'slug' => $slug,
            'excerpt' => $validated['excerpt'] ?? Str::limit(strip_tags($validated['content']), 160),
            'content' => $validated['content'],
            'featured_image' => $imagePath,
            'featured_image_alt' => $validated['featured_image_alt'] ?? $validated['title'],
            'meta_title' => $validated['meta_title'] ?? $validated['title'],
            'meta_description' => $validated['meta_description'] ?? ($validated['excerpt'] ?? Str::limit(strip_tags($validated['content']), 160)),
            'meta_keywords' => $validated['meta_keywords'] ?? null,
            'geo_target_region' => $validated['geo_target_region'] ?? 'Bogor, Ciawi, Jabodetabek',
            'geo_summary' => $validated['geo_summary'] ?? null,
            'is_published' => $isPublished,
            'published_at' => $isPublished ? now() : null,
        ]);

        return redirect()->route('admin.articles.index')
            ->with('success', 'Artikel baru berhasil diterbitkan!');
    }

    public function edit(Article $article)
    {
        $categories = Category::all();
        return view('admin.articles.edit', compact('article', 'categories'));
    }

    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'featured_image' => 'nullable|file|mimes:jpeg,png,jpg,webp,gif,svg,bmp,avif|max:5120',
            'featured_image_alt' => 'nullable|string|max:255',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:500',
            'geo_target_region' => 'nullable|string|max:255',
            'geo_summary' => 'nullable|string|max:1000',
            'is_published' => 'nullable|boolean',
        ]);

        if (!empty($validated['slug']) && $validated['slug'] !== $article->slug) {
            $slug = Str::slug($validated['slug']);
            $count = Article::where('slug', 'like', "{$slug}%")->where('id', '!=', $article->id)->count();
            if ($count > 0) {
                $slug .= '-' . ($count + 1);
            }
            $article->slug = $slug;
        } elseif ($validated['title'] !== $article->title && empty($validated['slug'])) {
            $slug = Str::slug($validated['title']);
            $count = Article::where('slug', 'like', "{$slug}%")->where('id', '!=', $article->id)->count();
            if ($count > 0) {
                $slug .= '-' . ($count + 1);
            }
            $article->slug = $slug;
        }

        if ($request->hasFile('featured_image')) {
            // Delete old file if stored in storage
            if ($article->featured_image && str_starts_with($article->featured_image, 'storage/articles/')) {
                $oldPath = str_replace('storage/', '', $article->featured_image);
                Storage::disk('public')->delete($oldPath);
            }
            $file = $request->file('featured_image');
            $filename = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('articles', $filename, 'public');
            $article->featured_image = 'storage/' . $path;
        }

        $isPublished = $request->has('is_published');
        if ($isPublished && !$article->published_at) {
            $article->published_at = now();
        }

        $article->category_id = $validated['category_id'];
        $article->title = $validated['title'];
        $article->excerpt = $validated['excerpt'] ?? Str::limit(strip_tags($validated['content']), 160);
        $article->content = $validated['content'];
        $article->featured_image_alt = $validated['featured_image_alt'] ?? $validated['title'];
        $article->meta_title = $validated['meta_title'] ?? $validated['title'];
        $article->meta_description = $validated['meta_description'] ?? ($validated['excerpt'] ?? Str::limit(strip_tags($validated['content']), 160));
        $article->meta_keywords = $validated['meta_keywords'] ?? null;
        $article->geo_target_region = $validated['geo_target_region'] ?? 'Bogor, Ciawi, Jabodetabek';
        $article->geo_summary = $validated['geo_summary'] ?? null;
        $article->is_published = $isPublished;
        $article->save();

        return redirect()->route('admin.articles.index')
            ->with('success', 'Artikel berhasil diperbarui!');
    }

    public function destroy(Article $article)
    {
        if (!\Illuminate\Support\Facades\Auth::user()->canDelete()) {
            abort(403, 'Akses ditolak: Akun bertipe Admin tidak memiliki izin untuk menghapus data.');
        }

        if ($article->featured_image && str_starts_with($article->featured_image, 'storage/articles/')) {
            $oldPath = str_replace('storage/', '', $article->featured_image);
            Storage::disk('public')->delete($oldPath);
        }

        $article->delete();

        return redirect()->route('admin.articles.index')
            ->with('success', 'Artikel berhasil dihapus!');
    }
}
