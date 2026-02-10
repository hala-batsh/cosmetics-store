<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('user.home');
})->name('home');


Route::get('/product/{id}', [ProductController::class, 'show'])
    ->name('product.details');





Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
