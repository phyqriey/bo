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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/catalogue', 'ProductController@index')->name('catalogueList');
Route::get('/catalogue/{page}', 'ProductController@index');


Route::get('/product/{id}', 'ProductController@details');
Route::get('/catalogue2', 'ProductController@index2');
Route::get('/catalogue2/{page}', 'ProductController@index2');
