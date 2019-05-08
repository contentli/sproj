<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('pages.categories.index', compact('categories'));
    }

    /**
     * Find category by slug
     *
     * @param [type] $slug
     * @return void
     */
    public function findBySlug($slug)
    {
        // Check if the slug is numeric, if so, find by id
        if (is_numeric($slug)) {
            return self::show(Category::findOrFail($slug));
        }

        // Slug is string, find by slug
        return self::show(Category::findBySlugOrFail($slug));
    }

        /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        // Get products
        $products = Product::where('category_id', $category->id)
            ->orderBy('updated_at', 'desc')
            ->paginate(24);

        // Check if parent exist and that products are empty
        if($products->count() == 0 && !$category->parent) {

            // Get child categories
            $ids = $category->children->pluck('id')->toArray();

            // Get products based on child categories
            $products = Product::whereIn('category_id', $ids)
            ->orderBy('updated_at', 'desc')
            ->paginate(24);
        }

        // Return view
        return view('pages.categories.show', compact('category', 'products'));
    }
}
