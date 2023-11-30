<?php

use App\Models\SavedNft;
use App\Models\SavedCollection;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NftController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\PublicProfileController;

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

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('browse/nfts', [HomeController::class, 'nfts'])->name('browse-nfts');

Route::get('browse/collections', [HomeController::class, 'collections'])->name('browse-collections');

Route::get('/nft/{nft}', [HomeController::class, 'nft'])->name('nft-detail');

Route::get('/collection/{collection}', [HomeController::class, 'collection'])->name('collection-detail');

Route::get('/profile/{user}', [PublicProfileController::class, 'show'])->name('user-profile');

// Route::get('/donate', [HomeController::class, 'donate'])->name('donate');
// Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
// Route::get('/about', [HomeController::class, 'about'])->name('about');

// Protected routes
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/saved', function () {
    $user = auth()->user();
    $savedNfts = SavedNft::where('user_id', $user->id)->with('nft')->get();
    $savedCollections = SavedCollection::where('user_id', $user->id)->with('collection')->get();

    return view('saved', compact('savedNfts', 'savedCollections'));
})->middleware(['auth', 'verified'])->name('saved');

Route::resource('nfts', NftController::class)
    ->only(['create', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::resource('collections', CollectionController::class)
    ->only(['create', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);


Route::post('/nfts/{nft}/save', [NftController::class, 'save'])->middleware(['auth', 'verified'])->name('nfts.save');
Route::delete('/nfts/{nft}/unsave', [NftController::class, 'unsave'])->middleware(['auth', 'verified'])->name('nfts.unsave');

Route::post('/collections/{collection}/save', [CollectionController::class, 'save'])->middleware(['auth', 'verified'])->name('collections.save');
Route::delete('collections/{collection}/unsave', [CollectionController::class, 'unsave'])->middleware(['auth', 'verified'])->name('collections.unsave');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
