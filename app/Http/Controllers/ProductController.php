<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
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
        return view('pages.products.show', compact('product', 'images'));
    }
}
