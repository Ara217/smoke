<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">


        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="description" content="Американские сигареты от 2600 р за блок. Европейские сигареты от 1000 рублей за блок.">
        <meta name="keywords" content="Импортные сигареты,американские сигареты,европейские сигареты,доставка сигарет,сигареты из duty free,английские сигареты">
        <title>@yield('title')</title>

        <!-- Scripts -->
        <script src="{{ asset('js/libs.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        <link rel="shortcut icon" href="{{{ asset('images/logo-02.png') }}}" type="image/x-icon">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="admin-body">
        <div>
            @include('auth.layout.header')
                @yield('admin_content')
            @include('auth.layout.footer')
        </div>
    </body>
</html>
