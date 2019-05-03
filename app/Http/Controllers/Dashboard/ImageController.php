<?php

namespace App\Http\Controllers\Dashboard;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    public function upload($product_id, $file_path)
    {
        $product = Product::find($product_id);
        $product
            ->addMedia($file_path)
            ->toMediaCollection('product-images');
    }
}
