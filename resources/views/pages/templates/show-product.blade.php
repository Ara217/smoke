@extends('pages.main')
@section('title', '')

@section('smoke_content')
    <main class="main-block">
        <div class="row content-block">
            <div class="mx-auto col-md-8">
                <div class="wrapper">
                    @include('pages.templates.left-side-bar')
                    <div id="content">
                        @include('pages.templates.menu-button')
                        <div class="card">
                            <div class="row">
                                <aside class="col-sm-5 border-right">
                                    <article class="gallery-wrap">
                                        <div class="img-big-wrap">
                                            <div >
                                                <img src="{{asset('images/preview/' . $product->image )}}" style="width: 430px; height: 450px">
                                            </div>
                                        </div> <!-- slider-product.// -->
                                    </article> <!-- gallery-wrap .end// -->
                                </aside>
                                <aside class="col-sm-7">
                                    <article class="card-body p-5"  data-image="{{$product->image}}" data-id="{{$product->id}}" data-price="{{$product->price}}"  data-count="{{$product->count}}" data-name="{{$product->name}}">
                                        <h2 class="title mb-3">{{$product->name}}</h2>

                                        <p class="price-detail-wrap">
                                            <span class="price h3 text-warning">
                                                <span class="currency">Цена:</span><span class="num">{{$product->price}} P.</span>
                                            </span>
                                            <br>
                                            <span class="price h3 text-warning">
                                                <span class="currency">Количество:</span><span class="num">{{$product->count}}</span>
                                            </span>
                                        </p> <!-- price-detail-wrap .// -->
                                        <dl class="item-property">
                                            <dt>Информация</dt>
                                            <dd>
                                                <p>
                                                    {{$product->description}}
                                                </p>
                                            </dd>
                                        </dl>
                                        <dl class="param param-feature">
                                            <dt>Марка#</dt>
                                            <dd>{{$product->brand}}</dd>
                                        </dl>  <!-- item-property-hor .// -->
                                        {{--<dl class="param param-feature">--}}
                                            {{--<dt>Color</dt>--}}
                                            {{--<dd>Black and white</dd>--}}
                                        {{--</dl>  <!-- item-property-hor .// -->--}}
                                        {{--<dl class="param param-feature">--}}
                                            {{--<dt>Delivery</dt>--}}
                                            {{--<dd>Russia, USA, and Europe</dd>--}}
                                        {{--</dl>  <!-- item-property-hor .// -->--}}
                                        <button class="btn text-uppercase add-to-cart">
                                            Добавить в корзину
                                        </button>
                                    </article> <!-- card-body.// -->
                                </aside> <!-- col.// -->
                            </div> <!-- row.// -->
                        </div> <!-- card.// -->
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection