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

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function() {
    Route::resource('products', 'Admin\ProductController')->except(['show']);

    Route::resource('orders', 'Admin\OrderController')->only(['index', 'update']);
});

Route::group(['middleware' => ['auth']], function() {
    Route::get('products', 'User\ProductController@index');

    Route::resource('orders', 'User\OrderController')->only(['index', 'store']);
});