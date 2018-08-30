/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 12);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */,
/* 1 */,
/* 2 */,
/* 3 */,
/* 4 */,
/* 5 */,
/* 6 */,
/* 7 */,
/* 8 */,
/* 9 */,
/* 10 */,
/* 11 */,
/* 12 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(13);
module.exports = __webpack_require__(17);


/***/ }),
/* 13 */
/***/ (function(module, exports, __webpack_require__) {


/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

__webpack_require__(14);
__webpack_require__(15);
__webpack_require__(16);

/***/ }),
/* 14 */
/***/ (function(module, exports) {

$(function () {
    _.templateSettings.interpolate = /{#{([\s\S]+?)}#}/g;
    // show body when scripts are loaded
    $('body').show();

    if ($(window).width() <= 1024) {
        $('.content-block div:first').removeClass('mx-auto col-md-8');
        $('.content-block div:first').addClass('col-md-12');
        $('.products-list>div').removeClass('col-md-3').addClass('col-md-4');
    }

    _.templateSettings = {
        interpolate: /\{#\{=(.+?)\}#\}/g,
        evaluate: /\{#\{(.+?)\}#\}/g
    };

    if (localStorage.getItem('cart')) {
        var cart = JSON.parse(localStorage.getItem('cart'));
        var productsCount = Object.keys(cart).length;
        renderCartCount(productsCount);
        renderNewCart(cart);
    }

    // move placeholders up on input focus
    $(document).on('focus keyup paste', 'input.form-control', function (e) {
        var field = $(e.target);
        var label = field.next();
        if (e.type === 'focus') {
            return label.addClass('active');
        }
        if (field.val().length) {
            label.addClass('active');
        } else {
            label.removeClass('active');
        }
    });

    // disable submit button and show loader when form is submitted
    $('form').on('submit', function (e) {
        var submit = $(e.target).find('input[type="submit"]');
        submit.prop('disabled', true);

        // if (!submit.next().length) {
        //     const loader = $('<img src="/images/loader.gif" class="loader-animation" width="30px" style="display:none">');
        //     loader.insertAfter(submit);
        //     loader.show('normal');
        // }
    });

    $(document).on('change', ':file', function (e) {
        var inputname = $(e.currentTarget).val().replace(/\\/g, '/').replace(/.*\//, '');
        $('.' + $(e.currentTarget).attr('name') + '-file-name').text(inputname);
    });
});

// setup axios response
window.axios.interceptors.response.use(function (response) {
    // loaderRemove();

    if (response.data.success) {
        if (response.data.message) {
            toastr.success(response.data.message);
        }
    } else {
        if (response.data.message) {
            toastr.error(response.data.message);
        }

        if (response.data.errors) {
            toastr.error(response.data.errors);
        }
    }

    return response.data;
}, function (error) {
    // loaderRemove();

    var errors = error.response.data;
    if (errors.errors) {
        _.each(errors.errors, function (error) {
            toastr.error(error);
        });

        return errors;
    } else {
        toastr.error(errors.message);
    }
});

renderNewCart = function renderNewCart(cart) {
    if ($('#cartContent').length) {
        $('#cartContentPlacement').html(_.template($('#cartContent').html().replace('\n', '').replace(/\s/g, ' '))({ cart: cart }));
    }
};

renderCartCount = function renderCartCount(productsCount) {
    $('#cartCount').text('Корзина ' + (productsCount ? productsCount : ''));
};

// loaderRemove = () => {
//     const loader = $('img.loader-animation');
//     loader.hide('normal');
//     loader.siblings('button').prop('disabled', false);
//     loader.remove();
// };

showErrors = function showErrors(form, errors) {
    form.find(':input').nextAll('p').remove();

    _.each(errors, function (obj, key) {
        var element = form.find('[name=' + key + ']');

        _.each(obj, function (error) {
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

event = function event($el, $type, $handler) {
    if ($el) {
        $el.addEventListener($type, $handler);
    }
};

/***/ }),
/* 15 */
/***/ (function(module, exports) {

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

$(function () {
    $('.add-to-cart').on('click', function (e) {
        var parent = $(e.currentTarget).parent();
        var id = parent.data('id');
        var image = parent.data('image');
        var price = parent.data('price');
        // let count = parent.data('count');
        var count = $('#orderCount').val();
        var name = parent.data('name');
        var brand = parent.data('brand');
        var cart = {};

        if (localStorage.getItem('cart')) {
            var oldCart = JSON.parse(localStorage.getItem('cart'));
            var product = oldCart[name];
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
                };
            }

            localStorage.setItem('cart', JSON.stringify(oldCart));
        } else {
            cart = _defineProperty({}, name, {
                id: id,
                name: name,
                brand: brand,
                image: image,
                price: price,
                count: count
            });
            localStorage.setItem('cart', JSON.stringify(cart));
        }

        var productsCount = Object.keys(JSON.parse(localStorage.getItem('cart'))).length;
        $('#cartCount').text('Корзина ' + productsCount);
        //todo cart
    });

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });

    $('.remove-from-cart').on('click', function (e) {
        var parent = $(e.currentTarget).parent();
        var cart = JSON.parse(localStorage.getItem('cart'));
        delete cart[parent.data('name')];
        localStorage.setItem('cart', JSON.stringify(cart));
        parent.remove();
        renderCartCount(cart.length);
    });

    $('#orderCart').on('submit', function (e) {
        e.preventDefault();
        var form = $(e.currentTarget);

        var data = {
            name: form.find('input[name="name"]').val(),
            phone: form.find('input[name="phone"]').val(),
            address: form.find('input[name="address"]').val(),
            order: JSON.parse(localStorage.getItem('cart'))
        };

        axios.post('/products/orderByCart', data).then(function (results) {
            if (!results.errors && results.success) {
                localStorage.removeItem('cart');
                toastr.success('Ваш заказ принят.Вам скоро перезвонят.');
                setTimeout(function () {
                    window.location.replace('/');
                }, 2000);
            }
        });
    });
    //
    // $("input[type='file']").on('change', () => {
    //     debugger;
    // })
});

/***/ }),
/* 16 */
/***/ (function(module, exports) {

$(function () {});

/***/ }),
/* 17 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })
/******/ ]);