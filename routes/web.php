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

// Home Page
Route::get('/', 'FrontController@index');
// Route::get('/home', 'HomeController@index')->name('home');

// Product Page
Route::get('/product/{id}', 'FrontController@show')->where(['id' => '[0-9]+']);

// Sales Page
Route::get('/sales', 'FrontController@sales');

// Categorie Page
Route::get('/categorie/{categorie}', 'FrontController@categorie')->where(['categorie' => '[0-9]+']);

Route::get('admin', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login/', 'Auth\LoginController@login');

Route::resource('admin/products', 'ProductController')->middleware('auth');

Route::resource('admin/categories', 'CategorieController')->middleware('auth');

Auth::routes();
