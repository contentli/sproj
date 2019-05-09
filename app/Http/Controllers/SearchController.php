<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function index(Request $request)
    {
        $results = collect();

        // Check if theres a query
        if ($request->input('query')) {
            $results = self::search($request->input('query'));
        }

        //Return searchpage
        return view('pages.search.index', compact('results'))->with($request->input());
    }

    //
    public function search($query)
    {
        // Perform search
        return Product::search($query)->get();
    }
}
