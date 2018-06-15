<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Nesflis</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link href="{{ asset('css/fontawesome/css/fontawesome-all.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/fontawesome/css/fontawesome.css') }}" rel="stylesheet"/>

</head>
<body>
<div id="app">
    <div class="menuContainer">
        <div class="menu">

            <a href="{{ url('pelicula/') }}" class="tituloPag">NESFLIS</a>
            <a class="nuevo" href="{{ url('pelicula/create') }}">
                <i class="iconoMenu fas fa-plus-circle"></i>
                Nuevo
            </a>
            <div class="sub-menu">
                <a href="{{ url('pelicula/index') }}" class="link"><i class="far fa-user"></i>login/logout</a>
            </div>

        </div>
    </div>

    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
