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

Route::get('/items','ItemsController@index');
Route::get('/items/create','ItemsController@create');
Route::post('/items','ItemsController@store');
Route::get('/items/{item}','ItemsController@show');
Route::get('/items/{item}/edit','ItemsController@edit');
Route::put('/items/{item}/update','ItemsController@update');
Route::delete('/items/{item}', 'ItemsController@destroy');

Route::get('/suppliers','SuppliersController@index');
Route::get('/suppliers/create', 'SuppliersController@create');
Route::post('/suppliers','SuppliersController@store');
Route::get('/suppliers/{supplier}','SuppliersController@show');
Route::get('/suppliers/{supplier}/edit','SuppliersController@edit');
Route::put('/suppliers/{supplier}/update','SuppliersController@update');
Route::delete('/suppliers/{supplier}','SuppliersController@destroy');

Route::get('/orders', 'OrdersController@index');
Route::get('/orders/create', 'OrdersController@create');
Route::post('/orders', 'OrdersController@store');
Route::get('/orders/{order}', 'OrdersController@show');
Route::get('/orders/{order}/edit', 'OrdersController@edit');
Route::put('/orders/{order}/update', 'OrdersController@update');
Route::delete('/orders/{order}/delete', 'OrdersController@destroy');


Route::get('/orders/orderlines/{order}', 'OrderlinesController@index');
Route::get('/orderlines/{orderline}', 'OrderlinesController@show');


