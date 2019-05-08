<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all products
        $products = Product::published()->orderBy('updated_at', 'desc')->take(24)->get();

        // Return view
        return view('pages.index', compact('products'));
    }
}
