<nav class="navbar bg-faded  navbar-custom">
    <div class="container">
        <div class="header-logo">
            <a href="/admin" class="mx-auto">
                <img src="{{asset('/images/logo-02.png')}}" alt="">
            </a>
        </div>
        <ul class="nav navbar-nav navbar-logo mx-auto logo-block">
            {{--<a href="/admin" class="mx-auto">--}}
                {{--<img src="{{asset('images/ruseren-logo2.png')}}" class="logo-img" alt="Элит выкуп">--}}
            {{--</a>--}}
        </ul>
        <ul class="nav navbar-nav pull-sm-right admin-left-navbar">
            @guest
                <li><a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                {{--<li><a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a></li>--}}
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