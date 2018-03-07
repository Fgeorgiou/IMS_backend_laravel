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

//Registration routes
Route::get('/register', 'RegistrationsController@create');
Route::post('/register', 'RegistrationsController@store');

//Session routes
Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');

//Order Model routes
Route::get('/orders', 'OrderController@index');
Route::get('/orders/create', 'OrderController@create');
Route::post('/orders/create', 'OrderController@store');
Route::get('/orders/delete/{id}', 'OrderController@destroy');

//User Model routes
Route::get('/users', 'UserController@index');
Route::get('/users/create', 'UserController@create');
Route::post('/users/create', 'UserController@store');
Route::get('/users/update/{id}', 'UserController@update');
Route::get('/users/delete/{id}', 'UserController@destroy');

//Supplier Model routes
Route::get('/suppliers', 'SupplierController@index');
Route::get('/suppliers/create', 'SupplierController@create');
Route::post('/suppliers/create', 'SupplierController@store');
Route::get('/suppliers/update/{id}', 'SupplierController@update');
Route::get('/suppliers/delete/{id}', 'SupplierController@destroy');

//Product Model routes
Route::get('/products', 'ProductController@index');
Route::get('/products/create', 'ProductController@create');
Route::post('/products/create', 'ProductController@store');
Route::get('/products/update/{id}', 'ProductController@update');
Route::get('/products/delete/{id}', 'ProductController@destroy');

//Status Model routes
Route::get('/status', 'StatusController@index');
Route::get('/status/create', 'StatusController@create');
Route::post('/status/create', 'StatusController@store');
Route::get('/status/update/{id}', 'StatusController@update');
Route::get('/status/delete/{id}', 'StatusController@destroy');

//Roles Model routes
Route::get('/roles', 'RoleController@index');
Route::get('/roles/create', 'RoleController@create');
Route::post('/roles/create', 'RoleController@store');
Route::get('/roles/update/{id}', 'RoleController@update');
Route::get('/roles/delete/{id}', 'RoleController@destroy');
