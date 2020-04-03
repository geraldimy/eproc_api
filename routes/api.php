<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
Route::group(['middleware' => 'auth:api'], function(){
    Route::get('details', 'API\UserController@details');
    Route::post('check', 'API\UserController@check');
    Route::get('logout', 'API\UserController@logout');
    Route::get('user', 'API\UserController@user');
    Route::resource('products', 'API\ProductController');
    Route::resource('promo', 'PromotionController');
});

Route::group(['middleware' => 'check-token'], function(){
    Route::get('post', 'PostController@index');
    Route::get('post/{id}', 'PostController@detail');
}); 

