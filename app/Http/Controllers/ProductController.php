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
    public function findBySlug($slug, Request $request)
    {
        // Check if the slug is numeric, if so, find by id
        if (is_numeric($slug)) {
            // Get product
            $product = Product::findOrFail($slug);
        } else {
            // Slug is string, find product by slug
            $product = Product::findBySlugOrFail($slug);
        }

        // If your not logged in and product is not published, abort..
        if (!auth()->check()) {
            if (count($product->published()->get()) == 0) {
                return abort(403);
            }
        }

        // Return the view with product data
        return self::show($product);
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
