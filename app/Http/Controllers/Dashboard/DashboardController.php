<?php

namespace App\Http\Controllers\Dashboard;

use App\Product;
use App\Category;
use App\Brand;
use App\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        $brands = Brand::all();
        $tags = Tag::all();

        return view('pages.dashboard.index', compact('products', 'categories', 'brands', 'tags'));
    }
}
