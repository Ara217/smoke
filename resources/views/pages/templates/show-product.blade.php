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
                        <h2>{{$product->name}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
