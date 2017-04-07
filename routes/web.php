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

Route::get('/', 'IndexController@index');

// Auth::routes();

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
Route::resource('admin/products', 'Admin\\ProductsController');
Route::resource('admin/categories', 'Admin\\CategoriesController');
Route::resource('admin/unit-types', 'Admin\\UnitTypesController');
Route::resource('admin/orders', 'Admin\\OrdersController');
Route::resource('admin/slots', 'Admin\\SlotsController');

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


Route::get('/checkout/choose-delivery-slot', 'DeliveryController@index');
Route::get('/checkout/confirm', 'ConfirmCheckoutController@index');
Route::get('/checkout/payment-details', 'PaymentController@payment');


Route::get('/new-address', 'AddressController@create');
Route::post('/new-address', 'AddressController@store');



Route::get('/undefined', function(){
    echo json_encode(['status' => 'success']);
});