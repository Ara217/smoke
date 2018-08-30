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
                        <div class="row">
                            <div class="col-md-12">
                                <h2>Популярные бренды</h2>
                            </div>
                        </div>
                        {!! Form::open(['url' => '/search', 'method' => 'get', 'class' => 'mb-4']) !!}
                            <div class="form-row">
                                <div class="col-10">
                                    {{Form::text('search', $search, ['class' => 'form-control', 'id' => 'search', 'placeholder' => 'Имя продукта'])}}
                                    {{--<input type="text" class="form-control" placeholder="First name">--}}
                                </div>
                                <div class="col-md-1">
                                    {{--<input type="text" class="form-control" placeholder="Last name">--}}
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