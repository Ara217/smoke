@extends('layouts.app')
@section('title', 'О нас - elitvikup.com')

@section('content')
    <main class="main-block">
        <div class="row content-block">
            <div class="mx-auto col-md-8">
                <div class="wrapper">
                    <!-- Sidebar Holder -->
                @include('pages.templates.left-side-bar')
                <!-- Page Content Holder -->
                    <div id="content">
                        @include('pages.templates.menu-button')
                        <div>
                            <h3>О нас</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection