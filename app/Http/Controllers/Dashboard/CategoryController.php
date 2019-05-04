<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
    public function index()
    {
        // All cateories
        $categories = Category::orderBy('updated_at', 'desc')->paginate(50);

        // Return view
        return view('pages.dashboard.categories.index', compact('categories'));
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

        // Return create view
        return view('pages.dashboard.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Create a new category
        $category = new Category();

        // Get fillable data
        $data = $request->only($category->getFillable());

        // Save it
        $category->fill($data)->save();

        // Return to index
        return redirect()->route('dashboard.categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        // All cateories
        $categories = Category::all();

        // Return edit view
        return view('pages.dashboard.categories.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // Get fillable data
        $data = $request->only($category->getFillable());

        // Save it
        $category->fill($data)->save();

        // Return to index
        return redirect()->route('dashboard.categories');
    }

    /**
     * Show the confirmation page for deleting the specified resource.
     *
     * @param  \App\Category  $brand
     * @return \Illuminate\Http\Response
     */
    public function delete(Category $category)
    {
        // Return delete view
        return view('pages.dashboard.categories.delete', compact('category'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        // Delete brand
        $category->delete();

        // Return to index
        return redirect()->route('dashboard.categories');
    }
}
