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

//Registration, Login & Logout routes
Route::post('/register', 'Auth\RegisterController@register');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout');

//Order routes
Route::get('/orders', 'OrderController@index');
Route::get('/orders/create', 'OrderController@create');
Route::get('/orders/store', 'OrderController@store');
Route::post('/order_products/store', 'OrdersProductController@store');
Route::get('/orders/delete', 'OrderController@destroy');

//Arrival routes
Route::get('/arrivals', 'ArrivalController@index');
Route::get('/arrivals/create', 'ArrivalController@create');
Route::post('/arrival_products/store', 'ArrivalProductController@store');

//User Model routes
Route::get('/users', 'UserController@index');
Route::post('/users/create', 'UserController@store');
Route::get('/users/{id}', 'UserController@show');
Route::put('/users/update/{id}', 'UserController@update');
Route::get('/users/delete/{id}', 'UserController@destroy');

//Sales routes
Route::get('/sales', 'SaleController@index');
// Route::get('/sales/create', 'SaleController@create');
// Route::post('/sales_products/store', 'SalesProductController@store');
// Route::get('/sales/delete', 'SaleController@destroy');

//Stock routes
Route::get('/stock', 'StockController@index');
// Route::get('/stock/create', 'StockController@create');
// Route::post('/stock/store', 'StockController@store');
// Route::get('/stock/delete', 'StockController@destroy');

//Reporting routes
Route::get('/sales_reports', 'SalesReportController@top_selling_products');
Route::get('/periodic_sales', 'SalesReportController@periodic_sales');

//Product Model routes
Route::get('/products', 'ProductController@index');
Route::post('/products/create', 'ProductController@store');
Route::get('/products/show/{id}', 'ProductController@show');
Route::put('/products/update/{id}', 'ProductController@update');
Route::get('/products/delete/{ean}', 'ProductController@destroy');

//Supplier Model routes
Route::get('/suppliers', 'SupplierController@index');
Route::post('/suppliers/create', 'SupplierController@store');
Route::put('/suppliers/update/{id}', 'SupplierController@update');
Route::get('/suppliers/delete/{id}', 'SupplierController@destroy');

//Status Model routes
Route::get('/status', 'StatusController@index');
Route::post('/status/create', 'StatusController@store');
Route::put('/status/update/{id}', 'StatusController@update');
Route::get('/status/delete/{id}', 'StatusController@destroy');

//Roles Model routes
Route::get('/roles', 'RoleController@index');
Route::post('/roles/create', 'RoleController@store');
Route::put('/roles/update/{id}', 'RoleController@update');
Route::get('/roles/delete/{id}', 'RoleController@destroy');

//Facilities Model routes
Route::get('/facilities', 'FacilityController@index');
Route::post('/facilities/create', 'FacilityController@store');
Route::put('/facilities/update/{id}', 'FacilityController@update');
Route::get('/facilities/delete/{id}', 'FacilityController@destroy');

//Product Categories Model routes
Route::get('/product_categories', 'ProductCategoryController@index');
Route::post('/product_categories/create', 'ProductCategoryController@store');
Route::put('/product_categories/update/{id}', 'ProductCategoryController@update');
Route::get('/product_categories/delete/{id}', 'ProductCategoryController@destroy');
