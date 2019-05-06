<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Using class based composers...
        View::composer(
            'shared.navbar', 'App\Http\View\Composers\NavbarComposer'
        );

        View::composer(
            'pages.products', 'App\Http\View\Composers\ProductComposer'
        );

        // Using Closure based composers...
        // View::composer('dashboard', function ($view) {
        //     //
        // });
    }
}
