<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Show the application homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all products
        $products = Product::orderBy('updated_at', 'desc')->take(24)->get();

        // Return view
        return view('pages.index', compact('products'));
    }

    /**
     * Find product by slug
     *
     * @param [type] $slug
     * @return void
     */
    public function findBySlug($slug)
    {
        // Check if the slug is numeric, if so, find by id
        if (is_numeric($slug)) {
            return self::show(Product::findOrFail($slug));
        }

        // Slug is string, find by slug
        return self::show(Product::findBySlugOrFail($slug));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        // Get product images
        $images = $product->getMedia('product-images');

        // Return view
        return view('pages.product.show', compact('product', 'images'));
    }
}
