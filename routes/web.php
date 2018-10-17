<?php

use DeltaProc\ShoppingCart\Cart;
use App\Entities\Product;

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

Route::get('/add', function () {
    $product = Product::first();
    // dd(class_implements($product));
    
    $cart = new Cart();
    $cart->put($product);
});

Route::get('/list', function () {
    $cart = new Cart();
    // dd($cart->list());
    return dd($cart->list());
});

Route::get('/flush', function () {
    Session::flush('shopping_cart_items');
});
