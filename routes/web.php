<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/// Public routes
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

// Public news routes
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');

// Public FAQ routes
Route::get('/faqs', [FAQController::class, 'index'])->name('faqs.index');
Route::get('/faqs/{id}', [FAQController::class, 'show'])->name('faqs.show');

// Public contact form
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// routes/web.php
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');




// Authentication routes (Laravel default)
Auth::routes();

// Routes that require authentication
Route::middleware(['auth'])->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Admin routes for news management
    Route::middleware(['auth:admin'])->group(function () {
        Route::resource('news', NewsController::class)->except(['index', 'show']);
    });
    
    // Admin routes for FAQ management
    Route::middleware(['auth:admin'])->group(function () {
        Route::resource('faqs', FAQController::class)->except(['index', 'show']);
    });

    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });
    
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
