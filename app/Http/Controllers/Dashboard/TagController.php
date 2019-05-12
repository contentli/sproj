<?php

namespace App\Http\Controllers\Dashboard;

use App\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // All tags
        $tags = Tag::orderBy('updated_at', 'desc')->paginate(50);

        // Filter logic
        $filter = $request->get('filter', 'none');

        // Return view
        return view(
            'pages.dashboard.tags.index',
            compact('tags', 'filter')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Return create view
        return view(
            'pages.dashboard.tags.create'
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
        $tag = new Tag();

        // Get fillable data
        $data = $request->only($tag->getFillable());

        // Save it
        $tag->fill($data)->save();

        // Return to index
        return redirect()
            ->route('dashboard.tags')
            ->with('success', 'Tag created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        // Return edit view
        return view(
            'pages.dashboard.tags.edit',
            compact('tag')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        // Get fillable data
        $data = $request->only($tag->getFillable());

        // Save it
        $tag->fill($data)->save();

        // Return to index
        return redirect()
            ->route('dashboard.tags')
            ->with('success', 'Tag updated successfully!');
    }

    /**
     * Show the confirmation page for deleting the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function delete(Tag $tag)
    {
        // Return delete view
        return view('pages.dashboard.tags.delete', compact('tag'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        // Delete brand
        $tag->delete();

        // Return to index
        return redirect()
            ->route('dashboard.tags')
            ->with('success', 'Tag deleted successfully!');
    }
}
