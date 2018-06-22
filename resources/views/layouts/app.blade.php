<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    {{--<meta name="description" content="Продать алкоголь в Москве.Продать алкоголь, вино, ром, водку, бренди, виски, шампанское.Наш сайт предлагает вам возможность продавать дорогие алкогольные напитки.">--}}
    {{--<meta name="keywords" content="Скупка элитного алкоголя, Скупка табака, вина, рома, водки, бренди, виски, шампанского, сигареты, сигары">--}}
    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/libs.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    {{--<link rel="shortcut icon" href="{{{ asset('images/Logo.png') }}}" type="image/x-icon">--}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body class="guest-body">
    @include('layouts.header')
        @yield('content')
    @include('layouts.footer')
</body>
</html>
