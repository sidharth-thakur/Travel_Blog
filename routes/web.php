<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\AdminMiddleware;

// Home page route
Route::get('/', function () {
    return view('home');
});

// Dashboard route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Contact routes
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

require __DIR__.'/auth.php';

// Admin routes with admin middleware using the class directly
Route::prefix('admin')->middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/test', [AdminController::class, 'test'])->name('admin.test');
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
});

// Test route without middleware for debugging
Route::get('/admin-test', [AdminController::class, 'index'])->name('admin.test.public');

// Fallback route for admin area
Route::get('/admin/{any}', function () {
    if (Auth::check() && Auth::user()->email === 'sidharththakur@gmail.com') {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('dashboard')->with('error', 'You do not have permission to access the admin area.');
})->where('any', '.*')->middleware('auth');

// Add these routes to your existing web.php file
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'submit'])->name('contact.submit');

// Simple admin route without middleware for testing
Route::get('/admin-direct', function () {
    if (Auth::check() && Auth::user()->email === 'sidharththakur@gmail.com') {
        return view('admin.dashboard');
    }
    return redirect()->route('dashboard')->with('error', 'You do not have permission to access the admin area.');
})->middleware('auth')->name('admin.direct');

























