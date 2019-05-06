<?php

namespace App\Http\Controllers\Dashboard;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ImageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Upload a image
     *
     * @param [type] $product_id
     * @param [type] $file_path
     * @return void
     */
    public function upload($product_id, $file_path)
    {
        $product = Product::find($product_id);
        $product
            ->addMedia($file_path)
            ->toMediaCollection('product-images');
    }
}
