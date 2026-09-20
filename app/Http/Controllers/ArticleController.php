<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::with('category')->published();

        if ($request->filled('q')) {
            $search = $request->input('q');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        if ($request->filled('kategori')) {
            $categorySlug = $request->input('kategori');
            $query->whereHas('category', function ($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });
        }

        $articles = $query->latest('published_at')->paginate(9)->withQueryString();
        $categories = Category::withCount(['articles' => function ($q) {
            $q->published();
        }])->get();

        $featuredArticles = Article::published()->latest('views')->take(4)->get();

        return view('pages.articles.index', compact('articles', 'categories', 'featuredArticles'));
    }

    public function show(string $slug)
    {
        $article = Article::with('category')->where('slug', $slug)->published()->firstOrFail();

        // Increment view count
        $article->increment('views');

        $relatedArticles = Article::where('category_id', $article->category_id)
            ->where('id', '!=', $article->id)
            ->published()
            ->latest('published_at')
            ->take(3)
            ->get();

        $categories = Category::withCount(['articles' => function ($q) {
            $q->published();
        }])->get();

        return view('pages.articles.show', compact('article', 'relatedArticles', 'categories'));
    }

    public function category(string $slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $articles = Article::with('category')
            ->where('category_id', $category->id)
            ->published()
            ->latest('published_at')
            ->paginate(9);

        $categories = Category::withCount(['articles' => function ($q) {
            $q->published();
        }])->get();

        return view('pages.articles.index', [
            'articles' => $articles,
            'categories' => $categories,
            'activeCategory' => $category,
            'featuredArticles' => Article::published()->latest('views')->take(4)->get(),
        ]);
    }
}
