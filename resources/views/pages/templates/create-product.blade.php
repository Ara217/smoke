@extends('pages.main')
@section('title', '')

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
                        <h2>Добавит продукт</h2>
                        {!! Form::open(['url' => '/products', 'method' => 'post', 'files' => true]) !!}
                        <div class="form-group">
                            {{Form::label('name', 'Имя продукта:')}}
                            {{Form::text('name', null, ['class' => 'form-control form-bg', 'id' => 'name', 'placeholder' => 'Имя продукта'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('brand', 'Бренд:')}}
                            {{Form::text('brand', null, ['class' => 'form-control form-bg', 'id' => 'brand', 'placeholder' => 'Бренд'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('price', 'Цена:')}}
                            {{Form::text('price', null, ['class' => 'form-control form-bg', 'id' => 'price', 'placeholder' => 'Цена'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('count', 'Количество:')}}
                            {{Form::text('count', null, ['class' => 'form-control form-bg', 'id' => 'count', 'placeholder' => 'Количество'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('description', 'Информация:')}}
                            {{Form::textarea('description', null, ['class' => 'form-control form-bg', 'id' => 'description', 'rows' => '5', 'placeholder' => 'Информация'])}}

                        </div>
                        <div class="form-group">
                            {{Form::label('image', 'Фотография:')}}
                            {{Form::file('image', ['class' => 'form-control-file form-bg', 'id' => 'image'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('mainImage', 'Основмая фотография:')}}
                            {{Form::file('mainImage', ['class' => 'form-control-file form-bg', 'id' => 'mainImage'])}}
                        </div>
                        <input type="submit" class="btn btn-bg" value="Добавить">
                        {!! Form::close() !!}
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection