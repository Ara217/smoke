<template id="cartContent">
    {#{ _.each(cart, function(product) { }#}
        <div class="column cart-product-block" data-name="{#{= product.name }#}">
            <img src="{#{= '/images/preview/' + product.image }#} " alt="{#{= product.name }#}">
            <p class="product">
                Цена: {#{= product.price }#} p. <br>
                Количество: {#{= product.count }#}
            </p>
            <button class="btn remove-from-cart">Удалить</button>
        </div>
    {#{ }) }#}
</template>