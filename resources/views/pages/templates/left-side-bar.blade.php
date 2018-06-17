<nav id="sidebar">
    <ul class="list-unstyled components pl-2">
        @foreach($brands as $brand)
            <li class="nav-item left-nav-item">
                <a class="nav-link pl-0" href="/products/brands/{{$brand}}">
                    <span class="d-md-inline">{{$brand}}</span>
                </a>
            </li>
        @endforeach
    </ul>
</nav>