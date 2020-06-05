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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function() {
    return view ('dashboard');
});

Route::get('/index', function() {
    return view ('categories.index');
});
Route::resource('category', 'CategoryController');

Route::resource('product', 'ProductController');

Route::resource('promo', 'PromoController');

Route::get('/test21', function() {
    return view ('products.create');
});