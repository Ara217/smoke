@extends('pages.main')
@section('title', 'Американские сигареты и импортные сигареты из Европы')

@section('smoke_content')
    <main class="main-block">
        <div class="row content-block">
            <div class="mx-auto col-md-8">
                <div class="wrapper">
                    <!-- Sidebar Holder -->
                @include('pages.templates.left-side-bar')
                <!-- Page Content Holder -->
                    <div id="content">
                        @include('pages.templates.menu-button')
                        <h2>Популярные бренды</h2>
                        @foreach($products as $product)
                            <div class="column product-block" data-image="{{$product->image}}" data-id="{{$product->id}}" data-price="{{$product->price}}"  data-count="{{$product->count}}" data-name="{{$product->name}}">
                                <img src="{{asset('images/preview/' . $product->image )}}" alt="{{$product->name}}">
                                <a class="product-link" href="/products/{{$product->id}}">{{$product->name}}</a>
                                <p class="product">
                                Цена: {{$product->price}} p. <br>
                                Количество: {{$product->count}}
                                </p>
                                <button class="btn add-to-cart">Добавить в корзину</button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection