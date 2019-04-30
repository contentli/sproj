<?php

namespace App\Http\Controllers\Dashboard;

use App\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // All cateories
        $brands = Brand::orderBy('updated_at', 'desc')->paginate(50);

        // Return index view
        return view('pages.dashboard.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Return create view
        return view('pages.dashboard.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Create a new brand
        $brand = new Brand();

        // Get fillable data
        $data = $request->only($brand->getFillable());

        // Save it
        $brand->fill($data)->save();

        // Return to index
        return redirect()->route('dashboard.brands');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        // Return edit view
        return view('pages.dashboard.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        // Get fillable data
        $data = $request->only($brand->getFillable());

        // Save it
        $brand->fill($data)->save();

        // Return to index
        return redirect()->route('dashboard.brands');
    }

    /**
     * Show the confirmation page for deleting the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function delete(Brand $brand)
    {
        // Return delete view
        return view('pages.dashboard.brands.delete', compact('brand'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        // Delete brand
        $brand->delete();

        // Return to index
        return redirect()->route('dashboard.brands');
    }
}
