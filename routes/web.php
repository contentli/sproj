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

Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');

    // Products
    Route::get('/products', 'ProductController@index')->name('dashboard.products');
    Route::post('/products/search', 'ProductController@index')->name('dashboard.products.search');
    Route::resource('product', 'ProductController', ['except' => 'index', 'as' => 'dashboard.products']);

    // Categories
    Route::get('/categories', 'CategoryController@index')->name('dashboard.categories');
    Route::resource('category', 'CategoryController', ['except' => 'index', 'as' => 'dashboard.categories']);

    // Brands
    Route::get('/brands', 'BrandController@index')->name('dashboard.brands');
    Route::resource('brand', 'BrandController', ['except' => 'index', 'as' => 'dashboard.brands']);
});


