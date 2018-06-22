<template id="cartContent">
    {#{ _.each(cart, function(product) { }#}
        <div class="col-md-3 product-block" data-name="{#{= product.name }#}">
            <a class="product-link" href="{#{= '/products/' + product.id }#}">
                <img src="{#{= '/images/preview/' + product.image }#} " alt="{#{= product.name }#}">
            </a>
            <p>
                Имя: {#{= product.name }#}
            </p>
            <p class="product">
                Цена: {#{= product.price }#} p.
            </p>
            <p>
                Количество: {#{= product.count }#}
            </p>
            <button class="btn remove-from-cart">Удалить</button>
        </div>
    {#{ }) }#}
</template>