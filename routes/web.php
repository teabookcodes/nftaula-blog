<?php

use App\Models\SavedNft;
use App\Models\SavedCollection;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NftController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CollectionController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

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
    ->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::resource('collections', CollectionController::class)
    ->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);


Route::post('/nfts/{nft}/save', [NftController::class, 'save'])->name('nfts.save');
Route::delete('/nfts/{nft}/unsave', [NftController::class, 'unsave'])->name('nfts.unsave');

Route::post('/collections/{collection}/save', [CollectionController::class, 'save'])->name('collections.save');
Route::delete('collections/{collection}/unsave', [CollectionController::class, 'unsave'])->name('collections.unsave');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
