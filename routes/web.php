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

Route::get('/', 'FrontController@index');

Route::get('/product/{id}', 'FrontController@show')->where(['id' => '[0-9]+']);

Route::get('/sales', 'FrontController@sales');

Route::get('/categorie/{categorie}', 'FrontController@categorie')->where(['categorie' => '[0-9]+']);