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

Route::get('/', 'CarController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/brands/{brand}/brandModels', 'BrandModelController@create');

Route::post('/brands/{brand}/brandModels', 'BrandModelController@store');

Route::get('/brandModels/{brandModel}/edit', 'BrandModelController@edit');

Route::patch('/brandModels/{brandModel}', 'BrandModelController@update');

Route::delete('/brandModels/{brandModel}', 'BrandModelController@destroy');

Route::get('/search', 'CarController@search');

Route::resource('brands', 'BrandController');

Route::resource('cars', 'CarController');

Route::get('/images', 'ImageController@index');

Route::get('/images/create', 'ImageController@create');

Route::post('/images', 'ImageController@store');

Route::delete('/images/{id}', 'ImageController@destroy');
