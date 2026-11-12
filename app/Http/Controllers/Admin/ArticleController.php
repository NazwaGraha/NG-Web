<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ArticleController extends Controller
{
    /**
     * Display a listing of articles with filtering and search.
     */
    public function index(Request $request)
    {
        $query = Article::query();

        if ($request->filled('q')) {
            $search = trim($request->get('q'));
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%")
                  ->orWhere('focus_keyword', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category')) {
            $query->where('category', $request->get('category'));
        }

        if ($request->filled('status')) {
            $status = $request->get('status');
            if ($status === 'published') {
                $query->published();
            } elseif ($status === 'scheduled') {
                $query->scheduled();
            } elseif ($status === 'draft') {
                $query->where('is_published', false);
            }
        }

        $articles = $query->orderByDesc('created_at')->paginate(15)->withQueryString();
        $categories = Category::orderBy('name')->get();

        return view('admin.articles.index', compact('articles', 'categories'));
    }

    /**
     * Show the form for creating a new article.
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.articles.create', compact('categories'));
    }

    /**
     * Store a newly created article in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:articles,slug'],
            'category' => ['required', 'string', 'max:100'],
            'excerpt' => ['required', 'string', 'max:500'],
            'content' => ['required', 'string'],
            'image_file' => ['nullable', 'file', 'mimes:jpeg,png,jpg,webp,gif,svg,avif,bmp', 'max:5120'],
            'image_url' => ['nullable', 'string', 'max:255'],
            'image_alt' => ['nullable', 'string', 'max:255'],
            'focus_keyword' => ['nullable', 'string', 'max:150'],
            'geo_target' => ['nullable', 'string', 'max:150'],
            'meta_title' => ['nullable', 'string', 'max:100'],
            'meta_description' => ['nullable', 'string', 'max:255'],
            'author' => ['nullable', 'string', 'max:100'],
            'reading_time' => ['nullable', 'string', 'max:50'],
            'publish_type' => ['nullable', 'string', 'in:immediate,schedule,draft'],
            'published_at' => ['nullable', 'date'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Handle Image Upload with full extensions support (jpg, png, webp, gif, svg, avif, bmp)
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $extension = strtolower($file->getClientOriginalExtension());
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $extension;
            
            // Ensure directory exists
            $destinationPath = public_path('assets/images/articles');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            $validated['image'] = 'assets/images/articles/' . $filename;
        } elseif (!empty($validated['image_url'])) {
            $validated['image'] = $validated['image_url'];
        } else {
            $validated['image'] = 'assets/images/article-1.webp';
        }

        unset($validated['image_file'], $validated['image_url']);

        $validated['image_alt'] = !empty($validated['image_alt']) ? $validated['image_alt'] : $validated['title'];
        $validated['author'] = !empty($validated['author']) ? $validated['author'] : 'Tim IT NazwaGraha';
        $validated['reading_time'] = !empty($validated['reading_time']) ? $validated['reading_time'] : '5 Menit Baca';
        $validated['geo_target'] = !empty($validated['geo_target']) ? $validated['geo_target'] : 'Bogor, Ciawi, Jawa Barat';

        // Handle Publishing & Scheduling Logic
        $publishType = $request->input('publish_type');
        if ($publishType === 'draft') {
            $validated['is_published'] = false;
            $validated['published_at'] = $request->filled('published_at') ? Carbon::parse($request->published_at) : null;
        } elseif ($publishType === 'schedule') {
            $validated['is_published'] = true;
            $validated['published_at'] = $request->filled('published_at')
                ? Carbon::parse($request->published_at)
                : now()->addDay();
        } elseif ($publishType === 'immediate') {
            $validated['is_published'] = true;
            $validated['published_at'] = now();
        } else {
            // Direct boolean fallback
            $validated['is_published'] = $request->boolean('is_published', true);
            if ($request->filled('published_at')) {
                $validated['published_at'] = Carbon::parse($request->published_at);
            } else {
                $validated['published_at'] = $validated['is_published'] ? now() : null;
            }
        }
        unset($validated['publish_type']);

        $article = Article::create($validated);

        $statusMsg = $article->isScheduled()
            ? ' dijadwalkan tayang pada ' . $article->published_at->format('d M Y H:i')
            : ($article->is_published ? ' berhasil diterbitkan (live)' : ' disimpan sebagai draft');

        return redirect()->route('admin.articles.index')
            ->with('success', 'Artikel "' . $article->title . '"' . $statusMsg . '.');
    }

    /**
     * Show the form for editing the specified article.
     */
    public function edit(Article $article)
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified article in storage.
     */
    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('articles', 'slug')->ignore($article->id)],
            'category' => ['required', 'string', 'max:100'],
            'excerpt' => ['required', 'string', 'max:500'],
            'content' => ['required', 'string'],
            'image_file' => ['nullable', 'file', 'mimes:jpeg,png,jpg,webp,gif,svg,avif,bmp', 'max:5120'],
            'image_url' => ['nullable', 'string', 'max:255'],
            'image_alt' => ['nullable', 'string', 'max:255'],
            'focus_keyword' => ['nullable', 'string', 'max:150'],
            'geo_target' => ['nullable', 'string', 'max:150'],
            'meta_title' => ['nullable', 'string', 'max:100'],
            'meta_description' => ['nullable', 'string', 'max:255'],
            'author' => ['nullable', 'string', 'max:100'],
            'reading_time' => ['nullable', 'string', 'max:50'],
            'publish_type' => ['nullable', 'string', 'in:immediate,schedule,draft'],
            'published_at' => ['nullable', 'date'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Handle Image Upload
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $extension = strtolower($file->getClientOriginalExtension());
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $extension;
            
            $destinationPath = public_path('assets/images/articles');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            $validated['image'] = 'assets/images/articles/' . $filename;
        } elseif (!empty($validated['image_url'])) {
            $validated['image'] = $validated['image_url'];
        }

        unset($validated['image_file'], $validated['image_url']);

        $validated['image_alt'] = !empty($validated['image_alt']) ? $validated['image_alt'] : ($article->image_alt ?: $validated['title']);
        $validated['author'] = !empty($validated['author']) ? $validated['author'] : ($article->author ?? 'Tim IT NazwaGraha');
        $validated['reading_time'] = !empty($validated['reading_time']) ? $validated['reading_time'] : ($article->reading_time ?? '5 Menit Baca');
        $validated['geo_target'] = !empty($validated['geo_target']) ? $validated['geo_target'] : ($article->geo_target ?? 'Bogor, Ciawi, Jawa Barat');

        // Publishing & Scheduling Update
        $publishType = $request->input('publish_type');
        if ($publishType === 'draft') {
            $validated['is_published'] = false;
        } elseif ($publishType === 'schedule') {
            $validated['is_published'] = true;
            $validated['published_at'] = $request->filled('published_at')
                ? Carbon::parse($request->published_at)
                : ($article->published_at && $article->published_at->isFuture() ? $article->published_at : now()->addDay());
        } elseif ($publishType === 'immediate') {
            $validated['is_published'] = true;
            $validated['published_at'] = $article->published_at && $article->published_at->isPast() ? $article->published_at : now();
        } else {
            // Direct boolean fallback
            if ($request->has('is_published')) {
                $validated['is_published'] = $request->boolean('is_published');
            }
            if ($request->filled('published_at')) {
                $validated['published_at'] = Carbon::parse($request->published_at);
            } elseif (!empty($validated['is_published']) && !$article->published_at) {
                $validated['published_at'] = now();
            }
        }
        unset($validated['publish_type']);

        $article->update($validated);

        return redirect()->route('admin.articles.index')
            ->with('success', 'Artikel "' . $article->title . '" berhasil diperbarui.');
    }

    /**
     * Remove the specified article from storage.
     */
    public function destroy(Article $article)
    {
        $title = $article->title;
        $article->delete();

        return redirect()->route('admin.articles.index')
            ->with('success', 'Artikel "' . $title . '" berhasil dihapus.');
    }
}
