<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ReviewController;

Route::get('/search', [SearchController::class, 'index'])->name('search');

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!



 Pore add kore replace
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'admin'])->name('dashboard');
|
*/

Route::get('/', [HomeController::class,'home']);
Route::get('/home', [HomeController::class,'home']);
// Route::get('/home/order/{item_id}', [HomeController::class,'order']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/review/{item_id}',[ReviewController::class,'index']);
Route::post('/review/insert', [ReviewController::class,'insert']);
Route::get('/review/show/{item_id}', [ReviewController::class,'show']);

Route::get('/item', [ItemController::class,'index']);
Route::post('/item/insert', [ItemController::class,'insert']);
Route::get('/item/order/{item_id}', [ItemController::class,'order']);

Route::get('/redirects', [HomeController::class,'index']);

Route::get('/redirect', [FacebookController::class, 'redirectFacebook']);
Route::get('/callback', [FacebookController::class, 'facebookCallback']);

Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle']);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
