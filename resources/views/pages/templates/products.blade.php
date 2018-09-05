@extends('pages.main')
@section('title', 'Американские сигареты и импортные сигареты из Европы')

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
                                    <a class="product-link" href="/products/{{$product->id}}">
                                        <img src="{{asset('images/preview/' . $product->image )}}" alt="{{$product->name}}">
                                    </a>
                                    <a class="product-link" href="/products/{{$product->id}}">{{$product->name}}</a>
                                    <p class="product">
                                        Цена: {{$product->price}} p. <br>
                                        Количество: {{$product->count}}
                                    </p>
                                    <button class="btn add-to-cart">Добавить в корзину</button>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-md-12">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection