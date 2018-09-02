<nav class="navbar bg-faded navbar-custom">
    <div class="container custom-container">
        <div class="header-logo">
            @guest
                <a href="/" class="mx-auto">
                    <img src="{{asset('/images/logo-02.png')}}" alt="">
                </a>
            @else
                <a href="/admin" class="mx-auto">
                    <img src="{{asset('/images/logo-02.png')}}" alt="">
                </a>
            @endguest
        </div>
        <ul class="logo-block">
            <h1>Табак Маркет</h1>
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
                    <i class="fa fa-phone"></i>
                    <a href="/order-call" id="orderCallButton">Заказать звонок</a>
                </li>
                <li>
                    <i class="fa fa-user-circle-o"></i>
                    <a href="{{ route('login') }}">{{ __('Войти') }}</a>
                </li>
                <li>
                    <i class="fa fa-registered"></i>
                    <a href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                </li>
                <li>
                    <i class="fa fa-twitter"></i>
                    <i class="fa fa-facebook"></i>
                    <a href="/about">О нас</a>
                </li>
            @else
                <li>
                    <i class="fa fa-plus"></i>
                    <a href="{{route('products.create')}}">Добавить продукт</a>
                </li>
                <li>
                    <i class="fa fa-reply"></i>
                    <a href="{  { route('logout') }}"
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
        </ul>
    </div>
</nav>
