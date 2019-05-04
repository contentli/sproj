<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Find product by slug
     *
     * @param [type] $slug
     * @return void
     */
    public function findBySlug($slug)
    {
        if (is_numeric($slug)) {
            return self::show(Product::findOrFail($slug));
        }

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

        $images = $product->getMedia('product-images');
        return view('pages.product.show', compact('product', 'images'));
    }



}
