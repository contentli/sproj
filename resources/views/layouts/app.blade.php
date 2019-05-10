<!doctype html>
<html lang="{{ app()->getLocale() }}" prefix="og: http://ogp.me/ns#">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, minimum-scale=1, initial-scale=1">
        <meta name="description" content="@yield('meta_description', 'A curated list of only the best and popular products')">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title' , 'Home') - {{ config('app.name', 'LeetMark') }}</title>
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-139938954-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-139938954-1');
        </script>

    </head>
    <body itemscope itemtype="http://schema.org/WebPage">
        <div id="app">
            @include('shared.navbar')
            @include('shared.notifications')
            <section class="section">
                @yield('content')
            </section>
            @include('shared.footer')
        </div>

        <!-- Scripts -->
        @include('cookieConsent::index')
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
