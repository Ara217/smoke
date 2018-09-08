@extends('pages.main')
@section('title', 'Популярные бренды - tabak-market.su')

@section('smoke_content')
    <main class="main-block">
        <div class="row content-block">
            <div class="mx-auto col-md-8 main">
                <div class="wrapper">
                    <!-- Sidebar Holder -->
                @include('pages.templates.left-side-bar')
                <!-- Page Content Holder -->
                    <div id="content">
                        @include('pages.templates.menu-button')
                        <div class="mb-3" style="display: flex; flex-direction: row; justify-content: space-between">
                            <div>
                                <h2>Популярные бренды</h2>
                            </div>
                            <div class="dropdown mr-4">
                                <button class="dropbtn">Каталог</button>
                                <div class="dropdown-content">
                                    @foreach($region as $reg)
                                        <a href="/products/regions/{{$reg->id}}">{{$reg->name}}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        {!! Form::open(['url' => '/search', 'method' => 'get', 'class' => 'mb-4 search-form']) !!}
                            <div class="form-row">
                                <div class="col">
                                    {{Form::text('search', $search, ['class' => 'form-control', 'id' => 'search', 'placeholder' => 'Имя продукта'])}}
                                </div>
                                <div>
                                    <input type="submit" class="btn form-control" value="Найти" style="padding: 7px 16px">
                                </div>
                            </div>
                        {!! Form::close() !!}
                        <div class="row products-list">
                            @foreach($products as $product)
                                <div class="col-md-3 product-block" data-image="{{$product->image}}" data-id="{{$product->id}}" data-price="{{$product->price}}"  data-count="{{$product->count}}" data-brand="{{$product->brand}}" data-name="{{$product->name}}">
                                    <a href="/products/{{$product->id}}">
                                        <img src="{{asset('images/preview/' . $product->image )}}" alt="{{$product->name}}">
                                    </a>
                                    <a class="product-header" href="/products/{{$product->id}}">{{$product->name}}</a>
                                    <p class="product">
                                        Цена: {{$product->price}} p. <br>
                                        <span style="color: #fc0202e0">Есть в наличии: {{$product->exists ? 'Да' : 'Нет'}}</span>
                                    </p>
                                    <button class="btn add-to-cart">Добавить в корзину</button>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-md-12">
                            @if ($products->hasPages())
                                <ul class="pagination">
                                    @if ($products->onFirstPage())
                                        <li class="disabled page-item">
                                            <span class="page-link">«</span>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $products->previousPageUrl() }}" rel="prev">«</a>
                                        </li>
                                    @endif

                                    @if($products->currentPage() > 3)
                                        <li class="hidden-xs page-item">
                                            <a class="page-link" href="{{ $products->url(1) }}">1</a>
                                        </li>
                                    @endif
                                    @if($products->currentPage() > 4)
                                        <li class="page-item">
                                            <span class="page-link">...</span>
                                        </li>
                                    @endif
                                    @foreach(range(1, $products->lastPage()) as $i)
                                        @if($i >= $products->currentPage() - 1 && $i <= $products->currentPage() + 1)
                                            @if ($i == $products->currentPage())
                                                <li class="active page-item"><span class="page-link">{{ $i }}</span></li>
                                            @else
                                                <li class="page-item"><a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a></li>
                                            @endif
                                        @endif
                                    @endforeach
                                    @if($products->currentPage() < $products->lastPage() - 3)
                                        <li class="page-item"><span class="page-link">...</span></li>
                                    @endif
                                    @if($products->currentPage() < $products->lastPage() - 2)
                                        <li class="hidden-xs page-item"><a class="page-link" href="{{ $products->url($products->lastPage()) }}">{{ $products->lastPage() }}</a></li>
                                    @endif
                                    @if ($products->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $products->nextPageUrl() }}" rel="next">»</a>
                                        </li>
                                    @else
                                        <li class="disabled page-item">
                                            <span class="page-link">»</span>
                                        </li>
                                    @endif
                                </ul>
                            @endif
                            {{--{{ $products->links() }}--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection