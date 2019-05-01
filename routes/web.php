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

    // Dashboard
    Route::get('/', 'DashboardController@index')->name('dashboard');

    // Products
    Route::get('/products', 'Dashboard\ProductController@index')
        ->name('dashboard.products');

    Route::post('/products', 'Dashboard\ProductController@index')
        ->name('dashboard.products.search');

    Route::get('/products/product/{product}/delete', 'Dashboard\ProductController@delete')
        ->name('dashboard.products.product.delete');

    Route::resource(
        '/products/product',
        'Dashboard\ProductController',
        ['except' => 'index', 'as' => 'dashboard.products']
    );

    // Categories
    Route::get('/categories', 'Dashboard\CategoryController@index')
        ->name('dashboard.categories');

    Route::post('/categories', 'Dashboard\CategoryController@index')
        ->name('dashboard.categories.search');

    Route::get('/categories/category/{category}/delete', 'Dashboard\CategoryController@delete')
        ->name('dashboard.categories.category.delete');

    Route::resource(
        '/categories/category',
        'Dashboard\CategoryController',
        ['except' => 'index', 'as' => 'dashboard.categories']
    );

    // Brands
    Route::get('/brands', 'Dashboard\BrandController@index')
        ->name('dashboard.brands');

    Route::post('/brands', 'Dashboard\BrandController@index')
        ->name('dashboard.brands.search');

    Route::get('/brands/brand/{brand}/delete', 'Dashboard\BrandController@delete')
        ->name('dashboard.brands.brand.delete');

    Route::resource(
        '/brands/brand',
        'Dashboard\BrandController',
        ['except' => 'index', 'as' => 'dashboard.brands']
    );
});
