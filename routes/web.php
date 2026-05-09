<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\ContactMessageController as AdminContactMessageController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\FooterLinkController as AdminFooterLinkController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\NewsPostController as AdminNewsPostController;
use App\Http\Controllers\Admin\PageContentController as AdminPageContentController;
use App\Http\Controllers\Admin\SiteSettingController as AdminSiteSettingController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');
Route::view('/tentang-kami', 'pages.about')->name('about');
Route::view('/program', 'pages.program')->name('program');
Route::view('/hubungi-kami', 'pages.contact')->name('contact');

Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{post:slug}', [NewsController::class, 'show'])->name('news.show');
Route::post('/hubungi-kami', [ContactMessageController::class, 'store'])->name('contact.store');

Route::get('/sitemap.xml', function () {
    return response()->view('sitemap')->header('Content-Type', 'application/xml');
})->name('sitemap');

Route::prefix('admin')->name('admin.')->group(function (): void {
    Route::middleware('guest')->group(function (): void {
        Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('login.store');
    });

    Route::middleware(['auth', 'admin'])->group(function (): void {
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
        Route::get('/', AdminDashboardController::class)->name('dashboard');
        Route::resource('news', AdminNewsPostController::class)->except('show');
        Route::resource('galleries', AdminGalleryController::class)->except('show');
        Route::resource('page-contents', AdminPageContentController::class)->except('show');
        Route::resource('footer-links', AdminFooterLinkController::class)->except('show');
        Route::get('settings', [AdminSiteSettingController::class, 'index'])->name('settings.index');
        Route::put('settings', [AdminSiteSettingController::class, 'update'])->name('settings.update');
        Route::resource('contacts', AdminContactMessageController::class)->only(['index', 'show', 'destroy']);
    });
});
