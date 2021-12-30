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

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('/logout', 'HomeController@logout')->name('logout');

 	Route::get('/dashboard','ProductController@index')->name('dashboard');
	Route::get('/product/create','ProductController@create');
	Route::post('/product','ProductController@store')->name('ProductController@store');
	Route::get('/product/edit/{id}','ProductController@edit')->name('product.edit');
	Route::post('/product/update/{id}', 'ProductController@update')->name('product.update');
	Route::get('/product/destroy/{id}', 'ProductController@destroy');
});



