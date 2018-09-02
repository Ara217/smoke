<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.templates.home');
});

Route::get('/products/cart', function () {
    return view('pages.templates.cart');
});

Route::get('/about', function () {
    return view('pages.templates.about-us');
})->name('about-us');

Route::get('/order-call', function () {
    return view('pages.templates.order-call');
})->name('order-call');

Route::resource('products', 'ProductsController');
Route::get('products/brands/{name}', 'ProductsController@getProductsByBrand');
Route::get('products/regions/{id}', 'ProductsController@getProductsByRegion');
Route::post('products/orderByCart', 'ProductsController@orderByCart');
Route::get('/search', 'ProductsController@getProductsBySearch');
Route::post('/orderCall', 'ProductsController@orderCall');
Route::get('products/orders/list', 'ProductsController@orders')->name('orders');
Route::get('/admin', 'HomeController@index')->name('admin');
Route::post('/logout','Auth\LoginController@logout')->name('logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
