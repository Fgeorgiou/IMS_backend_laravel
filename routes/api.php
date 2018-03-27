<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Registration, Login & Logout routes
Route::post('/register', 'Auth\RegisterController@register');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout');

//Order Model routes
Route::get('/orders', 'OrderController@index');
Route::get('/orders/create', 'OrderController@create');
Route::post('/orders/create', 'OrderController@store');
Route::get('/orders/delete/{id}', 'OrderController@destroy');

//User Model routes
Route::get('/users', 'UserController@index');
Route::post('/users/create', 'UserController@store');
Route::get('/users/{id}', 'UserController@show');
Route::put('/users/update/{user}', 'UserController@update');
Route::get('/users/delete/{user}', 'UserController@destroy');

//Supplier Model routes
Route::get('/suppliers', 'SupplierController@index');
Route::post('/suppliers/create', 'SupplierController@store');
Route::put('/suppliers/update/{supplier}', 'SupplierController@update');
Route::get('/suppliers/delete/{supplier}', 'SupplierController@destroy');

//Product Model routes
Route::get('/products', 'ProductController@index');
Route::post('/products/create', 'ProductController@store');
Route::put('/products/update/{product}', 'ProductController@update');
Route::get('/products/delete/{product}', 'ProductController@destroy');

//Status Model routes
Route::get('/status', 'StatusController@index');
Route::post('/status/create', 'StatusController@store');
Route::put('/status/update/{status}', 'StatusController@update');
Route::get('/status/delete/{status}', 'StatusController@destroy');

//Roles Model routes
Route::get('/roles', 'RoleController@index');
Route::post('/roles/create', 'RoleController@store');
Route::put('/roles/update/{role}', 'RoleController@update');
Route::get('/roles/delete/{role}', 'RoleController@destroy');

//Facilities Model routes
Route::get('/facilities', 'FacilityController@index');
Route::post('/facilities/create', 'FacilityController@store');
Route::put('/facilities/update/{facility}', 'FacilityController@update');
Route::get('/facilities/delete/{facility}', 'FacilityController@destroy');

//Product Categories Model routes
Route::get('/product_categories', 'ProductCategoryController@index');
Route::post('/product_categories/create', 'ProductCategoryController@store');
Route::put('/product_categories/update/{product}', 'ProductCategoryController@update');
Route::get('/product_categories/delete/{product}', 'ProductCategoryController@destroy');
