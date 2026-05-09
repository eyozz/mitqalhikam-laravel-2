<?php

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
