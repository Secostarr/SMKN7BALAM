<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\NewsController;
use App\Http\Controllers\Dashboard\TestimonialController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\DashboardController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [WebsiteController::class, 'index'])->name('index');
Route::post('/contact-send', [ContactController::class, 'send'])->name('contact.send');

/*
|--------------------------------------------------------------------------
| Dashboard Auth (Guest)
|--------------------------------------------------------------------------
*/

Route::prefix('dashboard')->middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('dashboard.login');
    Route::post('/login/auth', [AuthController::class, 'login'])->name('dashboard.login.post');
});

/*
|--------------------------------------------------------------------------
| Dashboard Protected Routes (Auth)
|--------------------------------------------------------------------------
*/

Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::post('logout', [AuthController::class, 'logout'])->name('dashboard.logout');

    Route::resource('news', NewsController::class)->names('dashboard.news');
    Route::resource('testimonials', TestimonialController::class)->names('dashboard.testimonials');
    Route::resource('users', UserController::class)->names('dashboard.users');
});