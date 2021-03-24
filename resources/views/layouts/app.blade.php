<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('/js/manifest.js') }}" defer></script>
        <script src="{{ asset('/js/vendor.js') }}" defer></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        
    </head>
    <body class="d-flex w-100">
        <div class="container-master d-flex w-100 h-100 mx-auto flex-column">
            <!-- Page Heading -->
            {{ $navbar ?? '' }}

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>