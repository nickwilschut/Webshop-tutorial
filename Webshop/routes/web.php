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


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index']);

Route::get('/products', [App\Http\Controllers\ProductController::class, 'index']);
Route::get('/products/{id}', [App\Http\Controllers\ProductController::class, 'showMultiple']);
Route::get('/product/{id}', [App\Http\Controllers\ProductController::class, 'show']);

Route::get('/cart', [App\Http\Controllers\CartController::class, 'test']);
Route::get('/emptycart', [App\Http\Controllers\CartController::class, 'emptyCart']);
Route::get('/addtocart/{id}', [App\Http\Controllers\CartController::class, 'addToCart']);



