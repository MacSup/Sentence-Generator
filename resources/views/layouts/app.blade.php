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
        <script src="{{ mix('/js/manifest.js') }}" defer></script>
        <script src="{{ mix('/js/vendor.js') }}" defer></script>
        <script src="{{ mix('js/app.js') }}" defer></script>
        
    </head>
    <body class="d-flex w-100">
        <div class="container-master d-flex w-100 h-100 mx-auto flex-column">
            <!-- Page Heading -->
            <nav class="navbar navbar-light bg-white fixed-top shadow-sm" id ="navigation">
                <div class="container">
                    <a class="navbar-brand" href="{{ env('APP_URL') }}">
                        <img src="{{ asset('/images/logo.png') }}" alt="" width="30" height="20" class="d-inline-block align-text-top">
                        CREPIS
                    </a>

                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ env('APP_URL') . '#about' }}">Nos missions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ env('APP_URL') . '#methods' }}">Nos méthodes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ env('APP_URL') . '#team' }}">Notre équipe</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ env('APP_URL') . '#solutions' }}">Nos solutions</a>
                        </li>
                    </ul>
                    
                    <a href="https://discord.com/invite/5eGj4pbtNv">
                        <img height="40" src="{{ asset('/images/discord.png') }}" >
                    </a>
                </div>
            </nav>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>