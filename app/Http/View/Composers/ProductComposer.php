<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Category;

class ProductComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $menu = Category::buildMenu(Category::all()->toArray());
        $view->with('categories_menu', $menu);
    }
}
