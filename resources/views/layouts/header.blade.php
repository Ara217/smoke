{{--<nav class="navbar navbar-custom">--}}
    {{--<div class="container">--}}
        {{--<div class="header-logo">--}}
            {{--<a href="/" class="mx-auto">--}}
                {{--<img src="{{asset('/images/logo-02.png')}}" alt="">--}}
            {{--</a>--}}
        {{--</div>--}}
        {{--<ul class="logo-block" style="align-self: flex-end;">--}}
            {{--<h1>Табак Маркет</h1>--}}
            {{--<a href="/admin" class="mx-auto">--}}
            {{--<img src="{{asset('images/ruseren-logo2.png')}}" class="logo-img" alt="Элит выкуп">--}}
            {{--</a>--}}
        {{--</ul>--}}
        {{--<ul class="nav navbar-nav navbar-logo mx-auto logo-block">--}}
            {{--<a href="/" class="mx-auto">--}}
{{--                <img src="{{asset('images/ruseren-logo2.png')}}" class="logo-img" alt="Элит выкуп">--}}
            {{--</a>--}}
        {{--</ul>--}}
        {{--<ul class="nav navbar-nav pull-sm-right admin-left-navbar">--}}
            {{--<li>--}}
                {{--<a href="/products">Список продуктов</a>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="/products/cart" id="cartCount">Корзина</a>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="/about">О нас</a>--}}
            {{--</li>--}}
        {{--</ul>--}}
    {{--</div>--}}
{{--</nav>--}}

<nav class="navbar bg-faded  navbar-custom">
    <div class="container custom-container">
        <div class="header-logo">
            <a href="/" class="mx-auto">
                <img src="{{asset('/images/logo-02.png')}}" alt="">
            </a>
        </div>
        <ul class="logo-block">
            <a href="/">Табак Маркет</a>
        </ul>
        <ul class="nav navbar-nav pull-sm-right admin-left-navbar">
            <li>
                <i class="fa fa-list-ul"></i>
                <a href="/products">Список продуктов</a>
            </li>
            @guest
                <li>
                    <i class="fa fa-cart-plus"></i>
                    <a href="/products/cart" id="cartCount">Корзина</a>
                </li>
                <li>
                    <i class="fa fa-user-circle-o"></i>
                    <a href="{{ route('login') }}">{{ __('Войти') }}</a>
                </li>
            @else
                <li>
                    <i class="fa fa-plus"></i>
                    <a href="{{route('products.create')}}">Добавить продукт</a>
                </li>
                <li>
                    <i class="fa fa-reply"></i>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Выйти') }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
                <li>
                    <i class="fa fa-twitter"></i>
                    <i class="fa fa-facebook"></i>
                    <a href="/about">О нас</a>
                </li>
        </ul>
    </div>
    {{--<div>--}}
        {{--<ul>--}}
            {{--@foreach($region as $reg)--}}
                {{--<li>--}}
                    {{--<a>{{$reg}}</a>--}}
                {{--</li>--}}
            {{--@endforeach--}}
        {{--</ul>--}}
    {{--</div>--}}
    <marquee behavior="scroll" direction="left" bgcolor="#e5ddd2" class="marquee row">
        Доставка до 3 блоков - 400 руб, от 4 блоков - БЕСПЛАТНО! от 5 блоков - цена договорная, от 3 блоков - доставка почтой по всей России.
    </marquee>
</nav>
