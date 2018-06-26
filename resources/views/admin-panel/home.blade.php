@extends('auth.layout.app')

@section('admin_content')
    <div class="mx-auto col-md-9">
        <div class="wrapper">
            <div id="content" class="w-100">
                <main class="col bg-faded py-3">
                    <div class="col-md-12 col-md-offset-1 text-center">
                        <h2>Заказы</h2>
                        <div class="Order-list">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        @foreach($orders->all() as $order)
                                            <hr style="background-color: #e5ddd2">
                                            <div>
                                                <div style="display: flex">
                                                    <div class="col-md-4">
                                                        <p>
                                                            Имя: {{$order->name}}
                                                        </p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <p>
                                                            Номер: {{$order->phone}}
                                                        </p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <p>
                                                            Дата: {{$order->created_at}}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div style="display: flex">
                                                    <div class="col-md-3">
                                                        <p>
                                                            Имя
                                                        </p>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <p>
                                                            Цена
                                                        </p>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <p>
                                                            Количество
                                                        </p>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <p>
                                                            Итог
                                                        </p>
                                                    </div>
                                                </div>
                                                @foreach($order->order as $product)
                                                    <a href="/products/{{$product['id']}}" class="flex-container">
                                                        <div class="flax-item col-md-2">{{$product['name']}}</div>
                                                        <div class="flax-item col-md-2">{{$product['price']}} Р.</div>
                                                        <div class="flax-item col-md-2">{{$product['count']}}</div>
                                                        <div class="flax-item col-md-2">{{ $product['price'] *  $product['count']}} Р.</div>
                                                    </a>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                    {{ $orders->links() }}
                                </div>
                            </div>
                        </div>
                        <!-- ORDER LIST END-->
                    </div>
                </main>
            </div>
        </div>
    </div>
@endsection
