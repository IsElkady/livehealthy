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

//Route::get('/', function () {
//    return view('master.master');
//});
Route::get('/','HomeController@index');

Route::get('/products','ShopController@index');

Route::get('/products/{product}', 'ShopController@show');

Route::get('/cart','CartController@index');

Route::post('/cart','CartController@store');

Route::delete('/rmvCartProduct','CartController@destroy');

Route::get('empty','CartController@empty');