<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\Dashboard\NewsController;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\TestimonialController;
use App\Http\Controllers\Dashboard\UserController;

// Route Halaman Utama (Landing Page)
Route::get('/', [WebsiteController::class, "index"])->name('index');

// Login routes for dashboard
Route::get('dashboard/login', [AuthController::class, 'showLogin'])->name('dashboard.login');
Route::post('dashboard/login', [AuthController::class, 'login'])->name('dashboard.login.post');
Route::post('/contact-send', [\App\Http\Controllers\ContactController::class, 'send'])->name('contact.send');


// Protected dashboard routes (Wajib Login)
Route::prefix('dashboard')->middleware(\App\Http\Middleware\AdminAuth::class)->group(function () {
    
    Route::get('/', function () {
        return view('dashboard.index');
    })->name('dashboard.index');

    Route::resource('news', NewsController::class, ['as' => 'dashboard']);
    Route::resource('users', UserController::class, ['as' => 'dashboard']);
    
    // Route Testimonials sekarang udah aman di dalam sini
    Route::resource('testimonials', TestimonialController::class, ['as' => 'dashboard']);
    Route::post('dashboard/logout', [AuthController::class, 'logout'])->name('dashboard.logout');
});