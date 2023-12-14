<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

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



// Route::get('/donate', [HomeController::class, 'donate'])->name('donate');
// Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
// Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::resource('articles', ArticleController::class)
    ->only(['create', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/article/{article}', [HomeController::class, 'show'])->name('article.show');

require __DIR__ . '/auth.php';
