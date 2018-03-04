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

Route::get('/register', 'RegistrationsController@create');
Route::post('/register', 'RegistrationsController@store');

Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');

Route::get('/orders', 'OrderController@index');
Route::get('/orders/create', 'OrderController@create');
Route::post('/orders/create', 'OrderController@store');
Route::get('/orders/delete/{id}', 'OrderController@destroy');