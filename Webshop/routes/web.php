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
Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index']);

// Routes for products.
Route::get('/products', [App\Http\Controllers\ProductController::class, 'index']);
Route::get('/products/{id}', [App\Http\Controllers\ProductController::class, 'showMultiple']);
Route::get('/product/{id}', [App\Http\Controllers\ProductController::class, 'show']);

// Routes for shoppingcart.
Route::get('/cart', [App\Http\Controllers\CartController::class, 'createCart']);
Route::get('/emptycart', [App\Http\Controllers\CartController::class, 'emptyCart']);
Route::get('/pay', [App\Http\Controllers\CartController::class, 'pay']);
Route::get('/addToAmount/{id}', [App\Http\Controllers\CartController::class, 'addToAmount']);
Route::get('/lowerAmount/{id}', [App\Http\Controllers\CartController::class, 'lowerAmount']);
Route::get('/addtocart/{id}', [App\Http\Controllers\CartController::class, 'addToCart']);
Route::get('/removeFromCart/{id}', [App\Http\Controllers\CartController::class, 'removeProduct']);



