<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FacilityController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Auth\LoginController;

// Rute utama sekarang ngambil data dari HomeController
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Facility (singular)
    Route::resource('facility', FacilityController::class);
    
    // Package
    Route::resource('package', PackageController::class);
    
    // Blog Posts
    Route::resource('blog-post', BlogPostController::class);
    
    // Testimonial
    Route::resource('testimonial', TestimonialController::class);
    
    // Gallery
    Route::resource('gallery', GalleryController::class);
});

// Auth Routes
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');