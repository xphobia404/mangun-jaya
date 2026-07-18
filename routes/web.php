<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang', [HomeController::class, 'about'])->name('about');
Route::get('/produk', [HomeController::class, 'products'])->name('products');
Route::get('/galeri', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/kontak', [HomeController::class, 'contact'])->name('contact');
Route::post('/kontak', [HomeController::class, 'sendContact'])->name('contact.send');
