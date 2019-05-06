<?php

namespace App\Http\Controllers\Dashboard;

use App\Brand;
use App\Category;
use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // All products
        $products = Product::orderBy('updated_at', 'desc')->paginate(50);

        // Filter logic
        $filter = $request->get('filter', 'none');

        // Return view
        return view(
            'pages.dashboard.products.index',
            compact('products', 'filter')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // All cateories
        $categories = Category::all();

        // All brands
        $brands = Brand::all();

        // Return create view
        return view(
            'pages.dashboard.products.create',
            compact('categories', 'brands')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Create a new product
        $product = new Product();

        // Get fillable data
        $data = $request->only($product->getFillable());

        // Upload image if any
        if (isset($data['image'])) {
            $product->addMediaFromRequest('image')->toMediaCollection('product-images');
            unset($data['image']);
        }

        // Save it
        $product->fill($data)->save();

        // Return to index
        return redirect()
            ->route('dashboard.products')
            ->with('success', 'Item created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        // All cateories
        $categories = Category::all();

        // All brands
        $brands = Brand::all();

        // Images
        $images = $product->getMedia('product-images');

        // Return edit view
        return view(
            'pages.dashboard.products.edit',
            compact('product', 'categories', 'brands', 'images')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // Get fillable data
        $data = $request->only($product->getFillable());

        // Upload image if any
        if (isset($data['image'])) {
            $product->addMediaFromRequest('image')->toMediaCollection('product-images');
            unset($data['image']);
        }

        // Save it
        $product->fill($data)->save();

        // Return to index
        return redirect()
            ->route('dashboard.products')
            ->with('success', 'Item updated successfully!');
    }

    /**
     * Show the confirmation page for deleting the specified resource.
     *
     * @param  \App\Product  $brand
     * @return \Illuminate\Http\Response
     */
    public function delete(Product $product)
    {
        // Return delete view
        return view('pages.dashboard.products.delete', compact('product'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // Delete brand
        $product->delete();

        // Return to index
        return redirect()
            ->route('dashboard.products')
            ->with('success', 'Item deleted successfully!');
    }
}
