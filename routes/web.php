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

// Public routes
Route::get('/', 'HomeController@index')->name('home');

Route::get('/categories', 'CategoryController@index')->name('categories');
Route::get('/category/{slug}', 'CategoryController@show')->name('category.show');

Route::get('/guides', 'GuideController@index')->name('guides');
Route::get('/tests', 'TestController@index')->name('tests');
Route::get('/search', 'SearchController@index')->name('search');

// Dashboard
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
