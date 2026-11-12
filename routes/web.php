<?php

use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\InquiryController as AdminInquiryController;
use App\Http\Controllers\Admin\PortfolioController as AdminPortfolioController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\ServicePageController as AdminServicePageController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

// Public Front-End Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/jasa-pembuatan-website-murah', [HomeController::class, 'websiteService'])->name('services.website');
Route::get('/jasa-seo-murah', [HomeController::class, 'seoService'])->name('services.seo');
Route::get('/instalasi-jaringan-lan', [HomeController::class, 'networkService'])->name('services.network');
Route::get('/pengadaan-komputer', [HomeController::class, 'hardwareService'])->name('services.hardware');
Route::get('/konsultan-it-maintenance', [HomeController::class, 'maintenanceService'])->name('services.maintenance');
Route::get('/berita', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/berita/{slug}', function (string $slug) {
    return redirect('/' . $slug, 301);
});
Route::post('/inquiry', [InquiryController::class, 'store'])->name('inquiry.store');

// Contact Us Routes
Route::get('/contact-us', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact-us', [ContactController::class, 'send'])->name('contact.send');
Route::get('/kontak', function () {
    return redirect()->route('contact.index', [], 301);
});
Route::get('/hubungi-kami', function () {
    return redirect()->route('contact.index', [], 301);
});

Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

// Admin Authentication Routes
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    // Global fallback for auth middleware:
    Route::get('/auth-login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});

// Protected Admin Backoffice (Strict Auth Middleware)
Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Categories Management
    Route::resource('categories', AdminCategoryController::class)->except(['create', 'show', 'edit']);

    // Articles Management
    Route::resource('articles', AdminArticleController::class);

    // Inquiries / Leads Management
    Route::get('/inquiries', [AdminInquiryController::class, 'index'])->name('inquiries.index');
    Route::patch('/inquiries/{inquiry}/status', [AdminInquiryController::class, 'updateStatus'])->name('inquiries.status');
    Route::delete('/inquiries/{inquiry}', [AdminInquiryController::class, 'destroy'])->name('inquiries.destroy');

    // Services Management (Layanan Unggulan Kami)
    Route::resource('services', AdminServiceController::class)->except(['show']);
    Route::patch('/services/{service}/toggle', [AdminServiceController::class, 'toggleStatus'])->name('services.toggle');

    // Sub-Menu Service Pages Content Management
    Route::get('/service-pages', [AdminServicePageController::class, 'index'])->name('service-pages.index');
    Route::put('/service-pages/{servicePage}', [AdminServicePageController::class, 'update'])->name('service-pages.update');
    Route::patch('/service-pages/{servicePage}/toggle', [AdminServicePageController::class, 'toggleStatus'])->name('service-pages.toggle');

    // Portfolio Management (Portofolio & Proyek Nyata)
    Route::resource('portfolios', AdminPortfolioController::class)->except(['show']);
    Route::patch('/portfolios/{portfolio}/toggle', [AdminPortfolioController::class, 'toggleStatus'])->name('portfolios.toggle');
});

// Root-Level Article Detail Route (e.g. /{slug})
// Placed at the end so all fixed system & admin routes take precedence
Route::get('/{slug}', [ArticleController::class, 'show'])->name('articles.show');

