<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

// Home route.
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Home route.
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route for categories.
Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->middleware('auth');

// Routes for products.
Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->middleware('auth');
Route::get('/products/{id}', [App\Http\Controllers\ProductController::class, 'showMultiple'])->middleware('auth');
Route::get('/product/{id}', [App\Http\Controllers\ProductController::class, 'show'])->middleware('auth');

// Routes for shoppingcart.
Route::get('/cart', [App\Http\Controllers\CartController::class, 'createCart'])->middleware('auth');
Route::get('/cart/emptycart', [App\Http\Controllers\CartController::class, 'emptyCart'])->middleware('auth');
Route::get('/cart/pay', [App\Http\Controllers\CartController::class, 'pay'])->middleware('auth');
Route::get('/cart/addToAmount/{id}', [App\Http\Controllers\CartController::class, 'addToAmount'])->middleware('auth');
Route::get('/cart/lowerAmount/{id}', [App\Http\Controllers\CartController::class, 'lowerAmount'])->middleware('auth');
Route::get('/cart/addtocart/{id}', [App\Http\Controllers\CartController::class, 'addToCart'])->middleware('auth');
Route::get('/cart/removeFromCart/{id}', [App\Http\Controllers\CartController::class, 'removeProduct'])->middleware('auth');

// Routes for orders
Route::get('/order', [App\Http\Controllers\OrderController::class, 'index'])->middleware('orders');
Route::get('/order/insert/{order}', [App\Http\Controllers\OrderController::class, 'insert'])->middleware('orders');



