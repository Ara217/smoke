@extends('auth.layout.app')
@section('title', '')

@section('admin_content')
    <main class="main-block">
        <div class="row content-block">
            <div class="mx-auto col-md-8">
                <div class="wrapper">
                    <!-- Sidebar Holder -->
                @include('pages.templates.left-side-bar')
                <!-- Page Content Holder -->
                    <div id="content">
                        @include('pages.templates.menu-button')
                        <h2>Добавит продукт</h2>
                        {!! Form::open(['route' => array('products.update', $product), 'method' => 'patch', 'files' => true]) !!}
                        <div class="form-group">
                            {{Form::label('name', 'Имя продукта:')}}
                            {{Form::text('name', $product->name, ['class' => 'form-control form-bg', 'id' => 'name', 'placeholder' => 'Имя продукта'])}}
                            {{$errors->first('name')}}
                        </div>
                        <div class="form-group">
                            {{Form::label('brand', 'Бренд:')}}
                            {{Form::text('brand', $product->brand, ['class' => 'form-control form-bg', 'id' => 'brand', 'placeholder' => 'Бренд'])}}
                            {{$errors->first('brand')}}
                        </div>
                        <div class="form-group">
                            {{Form::label('price', 'Цена:')}}
                            {{Form::text('price', $product->price, ['class' => 'form-control form-bg', 'id' => 'price', 'placeholder' => 'Цена'])}}
                            {{$errors->first('price')}}
                        </div>
                        <div class="form-group">
                            {{Form::label('count', 'Количество:')}}
                            {{Form::text('count', $product->count, ['class' => 'form-control form-bg', 'id' => 'count', 'placeholder' => 'Количество'])}}
                            {{$errors->first('count')}}
                        </div>
                        <div class="form-group">
                            {{Form::label('description', 'Информация:')}}
                            {{Form::textarea('description', $product->description, ['class' => 'form-control form-bg', 'id' => 'description', 'rows' => '5', 'placeholder' => 'Информация'])}}
                            {{$errors->first('description')}}
                        </div>
                        <div class="form-group">
                            <label class="btn color-bl">
                                Фотография <input type="file" name="image" id="image" style="display: none;">
                            </label>
                            <p class="image-file-name"></p>
                            {{--{{Form::label('image', 'Фотография:')}}--}}
                            {{--{{Form::file('image', ['class' => 'form-control-file form-bg', 'id' => 'image'])}}--}}
                            {{$errors->first('image')}}
                        </div>
                        <div class="form-group">
                            <label class="btn color-bl">
                                Основмая фотография <input type="file" name="mainImage" id="mainImage" style="display: none;">
                            </label>
                            <p class="mainImage-file-name"></p>
                            {{--{{Form::label('mainImage', 'Основмая фотография:')}}--}}
                            {{--{{Form::file('mainImage', ['class' => 'form-control-file form-bg', 'id' => 'mainImage'])}}--}}
                            {{$errors->first('mainImage')}}
                        </div>
                        <input type="submit" class="btn btn-bg" value="Добавить">
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection