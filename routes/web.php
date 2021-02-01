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

Route::get('/', 'ProductController@index');

Auth::routes();

//view catalogue route
Route::get('/home', 'ProductController@index')->name('home');
Route::get('/catalogue', 'ProductController@index')->name('catalogueList');
Route::get('/catalogue/{page}', 'ProductController@index');

//view product detail route
Route::get('/product/{id}', 'ProductController@details');
Route::get('/cart', 'CartController@index')->name('showCart');

//cart route
Route::post('/cart/store', 'CartController@store')->name('cartStore');
Route::post('/cart/delete', 'CartController@removeItem')->name('cartItemRemove');
Route::post('/cart/updateQty', 'CartController@updateQty')->name('cartItemQty');

//order purchased route
Route::get('/purchased', 'OrderController@index')->name('showOrder');
Route::post('/order/store', 'OrderController@store')->name('orderStore');

//admin route
Route::get('/order', 'OrderController@manageOrder')->name('manageOrder');
Route::post('/order/update', 'OrderController@update')->name('orderUpdate');