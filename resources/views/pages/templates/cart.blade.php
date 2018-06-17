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
                        <h2>Заказать</h2>
                        <div id="cartContentPlacement"></div>
                        <div class="order-cart">
                            {!! Form::open(['url' => '/products', 'method' => 'post', 'id' => 'orderCart', 'files' => true]) !!}
                                <div class="form-group">
                                    {{Form::label('name', 'Ваше имя:')}}
                                    {{Form::text('name', null, ['class' => 'form-control form-bg', 'id' => 'name', 'placeholder' => 'Ваше имя'])}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('phone', 'Номер телефона:')}}
                                    {{Form::text('phone', null, ['class' => 'form-control form-bg', 'id' => 'brand', 'placeholder' => 'Номер телефона'])}}
                                </div>
                                <input type="submit" class="btn btn-bg" value="Заказать">
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('pages.templates.jstemplate.cart')
@endsection