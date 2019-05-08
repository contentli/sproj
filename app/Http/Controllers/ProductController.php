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

            // Return view
            return self::show($product);
        }

        // Slug is string, find product by slug
        $product = Product::findBySlugOrFail($slug);

        /**
         * @todo move the code under to model scope..
         */

        // // Check if product is published
        // $is_published = $product->published_at ? ($product->published_at->isBefore(now()) ? true : false) : false;

        // //
        // if(auth()->check()) {

        //     if(!$is_published) {
        //         return self::show($product);
        //     }
        // }

        // if(!$is_published) {
        //     return redirect()->route('home');
        // }

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
