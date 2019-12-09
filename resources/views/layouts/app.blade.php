<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Banco Alimentario</title>
        <!-- Styles -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    </head>

    <body @yield('onload')><!-- Para añadir funciones que corren al cargar el doc -->
        @include('components.messages')
        <div id="app">
            <main>
                @yield('content')
            </main>
        </div>
            <!-- Scripts -->
        <script src="{{ asset('js/jquery.min.js') }}" ></script>
        <script src="{{ asset('js/popper.min.js') }}" ></script>
        <script src="{{ asset('js/bootstrap.min.js') }}" ></script>
        <script src="{{ asset('js/mdb.min.js') }}" ></script>
        <script src="{{ asset('js/main.js') }}" ></script>
    </body>
</html>
