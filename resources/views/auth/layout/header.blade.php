<nav class="navbar bg-faded  navbar-custom">
    <div class="container">
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
        <ul class="logo-block" style="align-self: flex-end;">
            <h1>Табак Маркет</h1>
            {{--<a href="/admin" class="mx-auto">--}}
            {{--<img src="{{asset('images/ruseren-logo2.png')}}" class="logo-img" alt="Элит выкуп">--}}
            {{--</a>--}}
        </ul>
        <ul class="nav navbar-nav pull-sm-right admin-left-navbar">
            @guest
                <li><a class="nav-link text-white" href="{{ route('login') }}">{{ __('Войти') }}</a></li>
                <li><a class="nav-link text-white" href="{{ route('register') }}">{{ __('Регистрация') }}</a></li>
            @else
                <li><a class="nav-link text-white" href="{{route('products.create')}}">Добавить продукт</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-white" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
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