<?php

use App\Models\Nft;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Query\Builder;
use App\Http\Controllers\NftController;
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

Route::get('/', function (Request $request) {
    $query = Nft::query()->latest();

    $searchQuery = $request->input('search');

    if ($searchQuery) {
        $query->where('name', 'like', "%{$searchQuery}%");
    }

    $filters = ['marketplace', 'blockchain', 'currency', 'priceMin', 'priceMax'];

    if (!$request->only($filters)) {
        $query->whereNotNull('id');
    }

    $nfts = $query->get();

    return view('home', compact('nfts'));
})->name('home');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('nfts', NftController::class)
    ->only(['index', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
