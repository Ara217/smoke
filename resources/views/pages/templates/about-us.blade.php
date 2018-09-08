@extends('layouts.app')
@section('title', 'О нас - tabak-market.su')

@section('content')
    <main class="main-block">
        <div class="row content-block">
            <div class="mx-auto col-md-8 main">
                <div class="wrapper">
                    <!-- Sidebar Holder -->
                @include('pages.templates.left-side-bar')
                <!-- Page Content Holder -->
                    <div id="content">
                        @include('pages.templates.menu-button')
                        <div>
                            <h1>О нас</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection