<!doctype html>
<html lang="{{ app()->getLocale() }}" prefix="og: http://ogp.me/ns#">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, minimum-scale=1, initial-scale=1">
        <meta name="description" content="@yield($product->meta_description, 'A curated list of only the best and popular products')">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title' , 'Home') - {{ config('app.name', 'Leetmark') }}</title>

        <!-- Styles -->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    </head>
    <body itemscope itemtype="http://schema.org/WebPage">
        <div id="app">
            @include('shared.navbar')
            <section class="section">
                @yield('content')
            </section>
            @include('shared.footer')
        </div>

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
