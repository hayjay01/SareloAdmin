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

Route::group(['middleware' => 'admin'], function() {
    Route::group(['prefix' => 'admin'], function() {
            Route::get('/logout', 'AdminController@logout');
            Route::get('/dashboard', 'AdminController@index');
            Route::get('/users', 'Admin\UserController@index');
            Route::get('/products', 'Admin\ProductsController@index');
            Route::post('/products', 'Admin\ProductsController@add_product');
            Route::get('/products/{id}', 'Admin\ProductsController@edit');
            Route::post('/products/{id}', 'Admin\ProductsController@update');
            Route::get('/products/destroy/{id}', 'Admin\ProductsController@destroy');
            Route::get('/orders/{id}', 'Admin\OrdersController@show');
    });
});
    
    Route::match(['get', 'post'], '/admin', 'AdminController@signin');
    Route::get('/admin/orders', 'AdminController@orders');
    Route::get('/admin/order_view', 'AdminController@order_view');
    Route::get('/admin/product_edit', 'AdminController@product_edit');
    Route::get('/signin', 'Auth\\LoginController@showLoginForm');
    Route::post('/signin', 'Auth\\LoginController@login');
    Route::get('signup', 'Auth\\RegisterController@showRegistrationForm');
    Route::post('signup', 'Auth\\RegisterController@register');
    Route::get('/test', [
        'uses' => 'HomeController@test',
        'as' => 'test',
        'middleware' => 'role',
        'roles' => ['User']
    ]);


// Route::get('/cart', 'CartsController@addCartItem');
// Route::resource('products', 'ProductsController');
Route::resource('admin/categories', 'Admin\\CategoriesController');
// Route::resource('admin/unit-types', 'Admin\\UnitTypesController');
Route::resource('admin/orders', 'Admin\\OrdersController');
Route::match(['get', 'post'], '/admin/unit-types', 'Admin\\UnitTypesController@index');
Route::match(['get', 'post'], '/admin/unit-types/create', 'Admin\\UnitTypesController@store');
Route::get('admin/unit-types/delete/{id}', 'Admin\\UnitTypesController@destroy');
Route::get('admin/unit-types/edit/{id}', 'Admin\\UnitTypesController@edit');
Route::post('admin/unit-types/update/{id}', 'Admin\\UnitTypesController@update');

Route::match(['get', 'post'], '/admin/slots', 'Admin\\SlotsController@index');
Route::match(['get', 'post'], '/admin/slots/create', 'Admin\\SlotsController@store');
Route::post('admin/slots/update/{id}', 'Admin\\SlotsController@update');
Route::get('admin/slots/delete/{id}', 'Admin\\SlotsController@destroy');
Route::get('admin/slots', 'Admin\\SlotsController@index');
Route::get('admin/slots/edit/{id}', 'Admin\\SlotsController@edit');


Auth::routes();

Route::get('/home', 'HomeController@index');


Route::resource('admin/charges', 'Admin\\ChargesController');



Route::get('social/login/{provider}', 'Auth\\SocialAuthController@redirectToProvider');
Route::get('social/login/{provider}/callback', 'Auth\\SocialAuthController@handleProviderCallback');


Route::post('/cart/add', 'CartsController@addCartItem');
Route::get('/cart', 'CartsController@getCartItems');
Route::get('/cart/update/{cart_id}/{action}/', 'CartsController@updateCart');
Route::get('/cart/delete/{cart_id}', 'CartsController@deleteCartItem');

Route::match(['POST', 'GET'], '/checkout/billing-address', 'CheckoutController@billingAddress');
Route::match(['POST', 'GET'], '/checkout/choose-address', 'CheckoutController@chooseAddress');


Route::match(['POST', 'GET'], '/checkout/choose-delivery-slot', 'DeliveryController@index');
Route::match(['POST', 'GET'], '/checkout/confirm-order', 'ConfirmCheckoutController@index')->middleware('checkslot');
Route::post('/checkout', 'ConfirmCheckoutController@checkout')->middleware('checkslot');

Route::get('/checkout/payment/{order_unique_reference}', 'PaymentController@index');


Route::get('/new-address', 'AddressController@create');
Route::post('/new-address', 'AddressController@store');

Route::get('/my-account', 'HomeController@index');



Route::post('/transaction', 'TransactionController@store');
Route::post('/transaction/{transaction_id}/edit', 'TransactionController@update');

Route::get('/checkout/bank/{order_unique_reference}', 'TransactionController@bankCheckout');


Route::get('/undefined', function(){
    echo json_encode(['status' => 'success']);
});