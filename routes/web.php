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

Auth::routes(['register' => false, 'reset' => false, 'verify' => false]);

/**
 * Public routes
 */
Route::get('/', 'HomeController@index')->name('home');

// Products
Route::get('/product/{slug}', 'ProductController@findBySlug')
    ->where('slug', '[a-z0-9-]+')
    ->name('product.show');

// Categories
Route::get('/categories', 'CategoryController@index')->name('categories');
Route::get('/category/{slug}', 'CategoryController@findBySlug')
    ->where('slug', '[a-z0-9-]+')
    ->name('category.show');

// More....
Route::get('/guides', 'GuideController@index')->name('guides');
Route::get('/tests', 'TestController@index')->name('tests');

// Legal
Route::get('/privacy', 'HomeController@privacy')->name('privacy');
Route::get('/terms', 'HomeController@terms')->name('terms');

// Search
Route::get('/search', 'SearchController@index')->name('search');

/**
 * Admin section
 * AKA the Dashboard
 */

Route::prefix('dashboard')->middleware('auth:web')->group(function () {

    /**
     * Dashboard
     */
    Route::get('/', 'Dashboard\DashboardController@index')->name('dashboard');

    /**
     * Products
     */
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

    /**
     * Categories
     */
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

    /**
     * Brands
     */
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

    /**
     * Tags
     */
    Route::get('/tags', 'Dashboard\TagController@index')
        ->name('dashboard.tags');

    Route::post('/tags', 'Dashboard\TagController@index')
        ->name('dashboard.tags.search');

    Route::get('/tags/tag/{tag}/delete', 'Dashboard\TagController@delete')
        ->name('dashboard.tags.tag.delete');

    Route::resource(
        '/tags/tag',
        'Dashboard\TagController',
        ['except' => 'index', 'as' => 'dashboard.tags']
    );

    /**
     * Files
     */
    Route::post('/image/upload', 'Dashboard\ImageController@upload')
        ->name('dashboard.image.upload');
    Route::post('/image/delete', 'Dashboard\ImageController@delete')
        ->name('dashboard.image.delete');
});
