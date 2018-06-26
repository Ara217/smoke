$(() => {
    _.templateSettings.interpolate = /{#{([\s\S]+?)}#}/g;
    // show body when scripts are loaded
    $('body').show();

    if ($(window).width() <= 1024) {
        $('.content-block div:first').removeClass('mx-auto col-md-8');
        $('.content-block div:first').addClass('col-md-12');
        $('.products-list>div').removeClass('col-md-3').addClass('col-md-4')
    }

    _.templateSettings = {
        interpolate: /\{#\{=(.+?)\}#\}/g,
        evaluate: /\{#\{(.+?)\}#\}/g
    };

    if (localStorage.getItem('cart')) {
        let cart = JSON.parse(localStorage.getItem('cart'));
        let productsCount = Object.keys(cart).length;
        renderCartCount(productsCount);
        renderNewCart(cart);
    }


    // move placeholders up on input focus
    $(document).on('focus keyup paste', 'input.form-control', (e) => {
        const field = $(e.target);
        let label = field.next();
        if(e.type === 'focus') {
            return label.addClass('active');
        }
        if(field.val().length) {
            label.addClass('active');
        } else {
            label.removeClass('active');
        }
    });

    // disable submit button and show loader when form is submitted
    $('form').on('submit', (e) => {
        const submit = $(e.target).find('input[type="submit"]');
        submit.prop('disabled', true);

        // if (!submit.next().length) {
        //     const loader = $('<img src="/images/loader.gif" class="loader-animation" width="30px" style="display:none">');
        //     loader.insertAfter(submit);
        //     loader.show('normal');
        // }
    });

    $(document).on('change', ':file', function(e) {
        let inputname = $(e.currentTarget).val().replace(/\\/g, '/').replace(/.*\//, '');
        $(`.${$(e.currentTarget).attr('name')}-file-name`).text(inputname);
    });

});

// setup axios response
window.axios.interceptors.response.use((response) => {
    // loaderRemove();

    if(response.data.success) {
        if(response.data.message) {
            toastr.success(response.data.message);
        }
    } else {
        if(response.data.message) {
            toastr.error(response.data.message);
        }

        if(response.data.errors) {
            toastr.error(response.data.errors);
        }
    }

    return response.data;
}, (error) => {
    // loaderRemove();

    let errors = error.response.data;
    if(errors.errors) {
        _.each(errors.errors, (error) => {
            toastr.error(error);
        });

        return errors

    } else {
        toastr.error(errors.message);
    }
});

renderNewCart = (cart) => {
    if ($('#cartContent').length) {
        $('#cartContentPlacement').html(_.template($('#cartContent').html().replace('\n', '').replace(/\s/g, ' '))({cart: cart}))
    }
};


renderCartCount = (productsCount) => {
    $('#cartCount').text('Корзина ' + (productsCount ? productsCount : ''));
}

// loaderRemove = () => {
//     const loader = $('img.loader-animation');
//     loader.hide('normal');
//     loader.siblings('button').prop('disabled', false);
//     loader.remove();
// };

showErrors = (form, errors) => {
    form.find(':input').nextAll('p').remove();

    _.each(errors, (obj, key) => {
        let element = form.find('[name=' + key + ']');

        _.each(obj, (error) => {
            element.after('<p style="color: #d9534f; font-size: 16px">' + error + ' </p>');
        });
    });
};

// handleFormSubmit = (form, constraints) => {
//     let values = validate.collectFormValues(form);
//     let errors = validate(values, constraints);
//
//     if (!errors) {
//         return values;
//     } else {
//         showErrors(form, errors);
//         // _.each(errors, function (error) {
//         //     toastr.error(error);
//         // });
//         loaderRemove();
//         return false;
//     }
// };

// handleSingleField = (element, constraints) => {
//     return validate.single(element, constraints);
// };

event = ($el, $type, $handler) => {
    if($el) {
        $el.addEventListener($type, $handler);
    }
};

