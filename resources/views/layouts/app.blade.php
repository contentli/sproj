<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} {{ app()->version() }}</title>

        <!-- Styles -->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
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
