<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Template;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TemplateController extends Controller
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
        // All templates
        $templates = Template::orderBy('updated_at', 'desc')->paginate(50);

        // Return view
        return view(
            'pages.dashboard.templates.index',
            compact('templates')
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

        // Return create view
        return view(
            'pages.dashboard.templates.create',
            compact('categories')
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
        $template = new Template();

        // Get fillable data
        $data = $request->only($template->getFillable());

        // Save it
        $template->fill($data)->save();

        // Return to index
        return redirect()
            ->route('dashboard.templates')
            ->with('success', 'Template created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function show(Template $template)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function edit(Template $template)
    {
        // All cateories
        $categories = Category::all();

        // Return edit view
        return view(
            'pages.dashboard.templates.edit',
            compact('template', 'categories')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Template $template)
    {
        // Get fillable data
        $data = $request->only($template->getFillable());

        // Sanitize content data
        foreach ($data['content'] as $key => $value) {
            if (is_null($value['label']) || is_null($value['key']) || is_null($value['type'])) {
                unset($data['content'][$key]);
            }
        };

        // Save it
        $template->fill($data)->save();

        // Return to index
        return redirect()
            ->route('dashboard.templates')
            ->with('success', 'Template updated successfully!');
    }

    /**
     * Show the confirmation page for deleting the specified resource.
     *
     * @param  \App\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function delete(Template $template)
    {
        // Return delete view
        return view('pages.dashboard.templates.delete', compact('template'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function destroy(Template $template)
    {
        // Delete brand
        $template->delete();

        // Return to index
        return redirect()
            ->route('dashboard.templates')
            ->with('success', 'Template deleted successfully!');
    }
}
