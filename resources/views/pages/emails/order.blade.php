<h1>
    Smoke.com
</h1>

<h2>
    Заказ от: {{$name}}
</h2>

<h3>
    Номер телетона: {{$phone}}
</h3>

<p>
    Закааз:
</p>
@foreach($order as $o)
    <p>
        Имя продукта: {{$o['name']}}
    </p>
    <p>
        Цена: {{$o['price']}} p.
    </p>
    <p>
        Количество: {{$o['count']}}
    </p>
    <p>
        Итог: {{$o['price'] * $o['count']}} р
    </p>
    <hr>
@endforeach
