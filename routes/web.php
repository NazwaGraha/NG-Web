<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SeoController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\ContactMessageController as AdminContactMessageController;

/*
|--------------------------------------------------------------------------
| Public Routes (SEO & High Conversion)
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang-kami', [HomeController::class, 'about'])->name('about');

// Articles / Blog
Route::get('/artikel', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/artikel/kategori/{slug}', [ArticleController::class, 'category'])->name('articles.category');
Route::get('/artikel/{slug}', [ArticleController::class, 'show'])->name('articles.show');

// Gallery / Portofolio
Route::get('/galeri', [GalleryController::class, 'index'])->name('gallery.index');

// Contact & Location
Route::get('/kontak', [ContactController::class, 'index'])->name('contact.index');
Route::post('/kontak/kirim', [ContactController::class, 'send'])->name('contact.send');

// Dedicated IT Services Pages (High SEO & Conversion)
Route::prefix('layanan')->name('services.')->group(function () {
    Route::get('/pembuatan-website', [ServiceController::class, 'website'])->name('website');
    Route::get('/optimasi-seo-geo', [ServiceController::class, 'seoGeo'])->name('seo-geo');
    Route::get('/jaringan-lan-server', [ServiceController::class, 'jaringanLan'])->name('jaringan-lan');
    Route::get('/pengadaan-hardware-it', [ServiceController::class, 'hardware'])->name('hardware');
    Route::get('/servis-troubleshooting-komputer', [ServiceController::class, 'servis'])->name('servis');
});

// Dynamic Sitemap, Robots.txt & LLMs.txt for Google & AI Search (GEO)
Route::get('/sitemap.xml', [SeoController::class, 'sitemap'])->name('seo.sitemap');
Route::get('/robots.txt', [SeoController::class, 'robots'])->name('seo.robots');
Route::get('/llms.txt', [SeoController::class, 'llms'])->name('seo.llms');

// 301 Permanent Redirects for Legacy URLs (SEO Juice Transfer & 404 Elimination)
Route::redirect('/produk', '/layanan/pengadaan-hardware-it', 301);
Route::redirect('/produk/{any}', '/layanan/pengadaan-hardware-it', 301)->where('any', '.*');
Route::redirect('/kategori-produk', '/layanan/pengadaan-hardware-it', 301);
Route::redirect('/kategori-produk/{any}', '/layanan/pengadaan-hardware-it', 301)->where('any', '.*');
Route::redirect('/katalog', '/galeri', 301);
Route::redirect('/katalog/{any}', '/galeri', 301)->where('any', '.*');
Route::redirect('/cart', '/kontak', 301);
Route::redirect('/checkout', '/kontak', 301);
Route::redirect('/keranjang', '/kontak', 301);
Route::redirect('/store', '/', 301);
Route::redirect('/store/{any}', '/', 301)->where('any', '.*');

Route::redirect('/login', '/admin/login')->name('login');

/*
|--------------------------------------------------------------------------
| Backoffice / Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    Route::middleware(['auth'])->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

        // Categories Management
        Route::resource('categories', AdminCategoryController::class)->except(['create', 'show', 'destroy']);

        // Articles Management
        Route::post('articles/upload-image', [AdminArticleController::class, 'uploadImage'])->name('articles.upload-image');
        Route::resource('articles', AdminArticleController::class)->except(['destroy']);

        // Galleries Management
        Route::resource('galleries', AdminGalleryController::class)->except(['show', 'destroy']);

        // Contact Messages & Leads Management
        Route::get('contact-messages', [AdminContactMessageController::class, 'index'])->name('contact-messages.index');
        Route::get('contact-messages/{contactMessage}', [AdminContactMessageController::class, 'show'])->name('contact-messages.show');
        Route::patch('contact-messages/{contactMessage}/toggle-read', [AdminContactMessageController::class, 'toggleRead'])->name('contact-messages.toggle-read');

        // User Management
        Route::resource('users', AdminUserController::class)->except(['show', 'destroy']);

        // Data Deletion Protection: Only Super User & Supervisor are allowed to delete data
        Route::middleware(['can.delete'])->group(function () {
            Route::delete('categories/{category}', [AdminCategoryController::class, 'destroy'])->name('categories.destroy');
            Route::delete('articles/{article}', [AdminArticleController::class, 'destroy'])->name('articles.destroy');
            Route::delete('galleries/{gallery}', [AdminGalleryController::class, 'destroy'])->name('galleries.destroy');
            Route::delete('users/{user}', [AdminUserController::class, 'destroy'])->name('users.destroy');
            Route::delete('contact-messages/{contactMessage}', [AdminContactMessageController::class, 'destroy'])->name('contact-messages.destroy');
        });
    });
});
