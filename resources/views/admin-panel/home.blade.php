@extends('auth.layout.app')

@section('admin_content')
    <div class="mx-auto col-md-9">
        <div class="wrapper">
            <div id="content" class="w-100">
                <main class="col bg-faded py-3">
                    <div class="col-md-12 col-md-offset-1 text-center">
                        <h3>Заказы</h3>
                        <div class="Order-list">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        @foreach($orders->all() as $order)
                                            <table class="table">
                                                <tr>
                                                    <th>
                                                        <a style="font-size: 20px">Имя: {{$order->name}}</a>
                                                    </th>
                                                    <th>
                                                        <p style="font-size: 20px">Номер: {{$order->phone}}</p>
                                                    </th>
                                                    <th>
                                                        <p style="font-size: 20px">Дата: {{$order->created_at}}</p>
                                                    </th>
                                                </tr>
                                            </table>
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Имя продукта</th>
                                                    <th>Цена</th>
                                                    <th>Количество</th>
                                                    <th>Итог</th>
                                                    <th># #</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($order->order as $product)
                                                        <tr>
                                                            <td>{{$product->name}}</td>
                                                            <td>
                                                                <label class="label label-danger">{{$product->price}} Р.</label>
                                                            </td>
                                                            <td>
                                                                {{$product->count}}
                                                            </td>
                                                            <td>
                                                                {{ $product->price *  $product->count}} Р.
                                                            </td>
                                                            <td>
                                                                <a href="/products/{{$product->id}}"  class="btn btn-warning" >Смотреть</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @endforeach
                                    </div>
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
