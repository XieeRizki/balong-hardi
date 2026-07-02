// routes/web.php
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FacilityController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('pages.home');
});

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Facilities
    Route::resource('facilities', FacilityController::class);
    
    // Packages
    Route::resource('packages', PackageController::class);
    
    // Blog Posts
    Route::resource('blog-posts', BlogPostController::class);
    
    // Testimonials
    Route::resource('testimonials', TestimonialController::class);
    
    // Gallery
    Route::resource('galleries', GalleryController::class);
});

// Auth Routes
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');