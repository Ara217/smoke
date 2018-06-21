<template id="cartContent">
    {#{ _.each(cart, function(product) { }#}
        <div class="column" data-name="{#{= product.name }#}">
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