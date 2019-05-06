<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Category;

class NavbarComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $categories = Category::all();
        $view->with('categories', $categories);
    }
}
