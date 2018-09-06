$(() => {
    $('.add-to-cart').on('click', (e) => {
        let parent  = $(e.currentTarget).parent();
        let id = parent.data('id');
        let image = parent.data('image');
        let price = parent.data('price');
        // let count = parent.data('count');
        let count = $('#orderCount').val();
        let name = parent.data('name');
        let brand = parent.data('brand');
        let cart = {};

        if (localStorage.getItem('cart')) {
            let oldCart = JSON.parse(localStorage.getItem('cart'));
            let product = oldCart[name];
            if (product) {
                product.count += count;
            } else {
                oldCart[name] = {
                    id: id,
                    name: name,
                    brand: brand,
                    image: image,
                    price: price,
                    count: count
                }
            }

            localStorage.setItem('cart',  JSON.stringify(oldCart));
        } else {
            cart =  {
                [name]: {
                    id: id,
                    name: name,
                    brand: brand,
                    image: image,
                    price: price,
                    count: count
                }
            };
            localStorage.setItem('cart',  JSON.stringify(cart));
        }

        let productsCount = Object.keys(JSON.parse(localStorage.getItem('cart'))).length;
        $('#cartCount').text('Корзина ' + productsCount);
        //todo cart
    });

    $('#sidebarCollapse').on('click', () => {
        $('#sidebar').toggleClass('active');
    });

    $('.remove-from-cart').on('click', (e) => {
        let parent  = $(e.currentTarget).parent();
        let cart =  JSON.parse(localStorage.getItem('cart'));
        delete cart[parent.data('name')];
        localStorage.setItem('cart', JSON.stringify(cart));
        parent.remove();
        renderCartCount(cart.length);
    });

    $('#orderCart').on('submit', (e) => {
        e.preventDefault();
        let form = $(e.currentTarget);

        let data = {
            name: form.find('input[name="name"]').val(),
            phone: form.find('input[name="phone"]').val(),
            address: form.find('input[name="address"]').val(),
            order: JSON.parse(localStorage.getItem('cart'))
        };

        axios.post('/products/orderByCart', data).then((results) => {
            form.find('input[type=submit]').prop('disabled', false);
            if (!results.errors && results.success) {
                localStorage.removeItem('cart');
                toastr.success('Ваш заказ принят.Вам скоро перезвонят.');
                setTimeout(function(){ window.location.replace('/'); }, 2000);
            }
        });
    });

    $('#orderCall').on('submit', (e) => {
        e.preventDefault();

        let form = $(e.currentTarget);
        let submitButton = form.find('input[type=submit]');

        axios.post('/orderCall', form.serialize()).then((results) => {
            submitButton.prop("disabled", false);
            form.find("input[type=text], textarea").val("");
            form[0].reset();

            if (!results.errors) {
                toastr.success('Вы заказали звонок.');
            }

        });
    });
    //
    // $("input[type='file']").on('change', () => {
    //     debugger;
    // })
});