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

Auth::routes();

Route::get('/', 'FrontController@index')->name('landing');

Route::get('/cart', 'FrontController@cart');
Route::get('/checkout', 'FrontController@checkout');

// Admin
Route::group([
    'prefix' => 'admin',
    'middleware' => 'auth',
],
function(){
    Route::get('/', 'AdminController@index')->name('dashboard');
    Route::resource('/products', 'ProductController');
	Route::resource('/categories', 'CategoryController'); 
    Route::resource('sitesettings', 'SettingsController');
    Route::resource('/users', 'UserController'); 
});