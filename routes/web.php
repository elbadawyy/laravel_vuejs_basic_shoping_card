<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/shop', 'ProductController@index')->name('shop');
Route::get('/checkout', 'CartController@index')->name('checkout');


// ajax requests
Route::get('/ajax/getAllproducts', 'ProductController@getAllproducts')->name('getAllproducts');
Route::post('/ajax/addToMyCart', 'ProductController@addToMyCart')->name('addToMyCart');
Route::get('/ajax/getAllCartItem', 'CartController@getAllCartItem')->name('getAllCartItem');
