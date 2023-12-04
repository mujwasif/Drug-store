<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Mailcontroller;

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



//===================================================================================//
//===================================================================================//
// order route 
//to add
Route::post('/item/order/{item_id}', [ItemController::class,'order']);
//to remove
Route::get('/remove_cart/{id}/{item_id}', [ItemController::class,'remove_cart']);

//{{url('/remove_cart',['id' => $cart->id, 'item_id '=> $cart->item_id] )}}

// cart page controller
Route::get('/show_cart', [HomeController::class,'show_cart']);
//==============================================================================================
// wishlist page controller
Route::get('/show_wishlist', [HomeController::class,'show_wishlist']);
//{{url('wishlist')}}
Route::get('/add_wishlist/{item_id}', [ItemController::class,'add_wishlist']);
//{{ url('add_wishlist') }}/{{ $item->id }}
Route::get('/remove_wishlist/{id}/{item_id}', [ItemController::class,'remove_wishlist']);

Route::post('/wish_order/{item_id}', [ItemController::class,'wish_order']);


//=======================================================================================================//
//=======================================================================================================//

// payment page controller
Route::get('/cash_order', [HomeController::class,'cash_order']);
Route::post('/place_Corder', [HomeController::class,'place_Corder']);


Route::get('/card/{totalprice}', [HomeController::class,'card']);
Route::post('stripe/{totalprice}',[HomeController::class,'stripePost'])->name('stripe.post');




Route::get('/send_email',[App\Controllers\Mailcontroller::class,'index']);


//=======================================================================================================//
//=======================================================================================================//




Route::get('/redirects', [HomeController::class,'index']);

Route::get('/redirect', [FacebookController::class, 'redirectFacebook']);
Route::get('/callback', [FacebookController::class, 'facebookCallback']);

Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle']);

// cart page controller
Route::get('/show_cart', [HomeController::class,'show_cart']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
