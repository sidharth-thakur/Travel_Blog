<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;

// Home route
Route::get('/', function () {
    return view('home');
});

// Destinations route
Route::get('/destinations', [DestinationController::class, 'index'])->name('destinations');

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

// Admin routes with admin middleware
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/test', [AdminController::class, 'test'])->name('admin.test');
    
    // User management
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/users/{user}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::put('/users/{user}', [AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::delete('/users/{user}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');
    
    // Post management
    Route::get('/posts', [AdminController::class, 'posts'])->name('admin.posts');
    Route::get('/posts/create', [AdminController::class, 'createPost'])->name('admin.posts.create');
    Route::post('/posts', [AdminController::class, 'storePost'])->name('admin.posts.store');
    Route::get('/posts/{post}/edit', [AdminController::class, 'editPost'])->name('admin.posts.edit');
    Route::put('/posts/{post}', [AdminController::class, 'updatePost'])->name('admin.posts.update');
    Route::delete('/posts/{post}', [AdminController::class, 'destroyPost'])->name('admin.posts.destroy');
    
    // Destination management
    Route::get('/destinations', [AdminController::class, 'destinations'])->name('admin.destinations');
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

// Public post routes
Route::get('/blog', [PostController::class, 'index'])->name('posts.index');
Route::get('/blog/{post:slug}', [PostController::class, 'show'])->name('posts.show');

// Test database connection
Route::get('/db-test', function () {
    try {
        DB::connection()->getPdo();
        return "Database connection successful. Connected to: " . DB::connection()->getDatabaseName();
    } catch (\Exception $e) {
        return "Database connection failed: " . $e->getMessage();
    }
});





































