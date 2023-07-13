<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/','HomeController@index' );

Route::get('/home', 'HomeController@index');

Route::get('/barang/{id}','HomeController@barang_detail');

Route::get('/login', function () {
    return view('login');
});

Route::get('/login-page', function () {
    return view('login');
});
Route::get('/register-page', function () {
    return view('register');
});

Route::post('/register-post', 'RegisterController@RegisterUser');
Route::post('/login-post', 'LoginController@login');
Route::post('/logout', 'LoginController@logout');
Route::get('/'.env("URL_ADMIN", 'admin'), 'AdminController@login');

Route::group(['middleware' => ['admin']], function() {
    Route::get('/'.env("URL_ADMIN", 'admin').'/dashboard', 'AdminController@index');
    Route::get('/'.env("URL_ADMIN", 'admin').'/users', 'AdminController@users');
    Route::get('/'.env("URL_ADMIN", 'admin').'/users/{id}', 'AdminController@userDetail');
    Route::get('/'.env("URL_ADMIN", 'admin').'/items-enter', 'ProductController@itemsEnter');
    Route::get('/'.env("URL_ADMIN", 'admin').'/item-validation/{id}', 'ProductController@productValidation');
    Route::post('/'.env("URL_ADMIN", 'admin').'/item-validation', 'ProductController@productValidationAction');
    Route::get('/'.env("URL_ADMIN", 'admin').'/booking', 'ProductController@booking');
    Route::get('/'.env("URL_ADMIN", 'admin').'/payment-confirmation', 'PaymentController@confirmation');
    Route::post('/'.env("URL_ADMIN", 'admin').'/payment-confirmation', 'PaymentController@proof');
    Route::get('/'.env("URL_ADMIN", 'admin').'/report-finance', 'ReportController@finance');
    Route::get('/'.env("URL_ADMIN", 'admin').'/notification', 'NotificationController@index');
    Route::get('/'.env("URL_ADMIN", 'admin').'/transfer/{id}', 'ReportController@transfer');
});

Route::group(['middleware' => ['buyer']], function() {
    Route::post('/become-seller', 'SellerController@register');
});

Route::group(['middleware' => ['seller']], function() {
    Route::get('/my-products', 'ProductController@myProducts');
    Route::get('/product', 'ProductController@product');
    Route::get('/product/{id}', 'ProductController@detail');
    Route::post('/product', 'ProductController@insert');
    Route::delete('/product', 'ProductController@delete');

    Route::get('/sold-orders', 'OrderController@soldOrders');
    Route::get('/sales-revenue', 'OrderController@salesRevenue');
    Route::post('/resi', 'OrderController@resi');
});

// test courier
Route::get('/origin={city_origin}&destination={city_destination}&weight={weight}&courier={courier}','CheckoutController@getOngkir');
Route::get('/province','CheckoutController@getProvince');
Route::get('/province={id}','CheckoutController@getProvince');
Route::get('/province_city={id_province}','CheckoutController@getCity');
Route::get('/province_city={id_province}&city={id_city}','CheckoutController@getCity');
Route::get('/courier/province={province}&city={city}&weight={weight}','CheckoutController@getListCourier');

Route::group(['middleware' => ['buyer-seller']], function() {
    Route::get('/profile', 'ProfileController@index');
    Route::post('/profile', 'ProfileController@changeProfile');
    Route::get('/my-orders', 'OrderController@myOrders');
    Route::post('/proof-payment', 'OrderController@proofPayment');
    Route::post('/change-password', 'ProfileController@changePassword');
    Route::get('/chat', 'ChatController@index');
    Route::get('/chat/{username}', 'ChatController@personal');
    Route::get('/notification', 'NotificationController@index');
    Route::post('/ajax-region', 'ProductController@ajaxRegion');
    Route::get('/tawar/{user}/{seller}/{barang}/{harga}','TawarController@sendChatTawar');
    Route::post('/tawar/{user}/{seller}/{barang}/{harga}','TawarController@sendChatTawar');
    Route::post('/tawar-seller','TawarController@seller');
    Route::get('/keranjang', 'KeranjangController@index');
    Route::get('/checkout', 'KeranjangController@checkout');
    Route::post('/checkout', 'CheckoutController@checkout');
    Route::get('/cart-hapus/{id}', 'KeranjangController@hapus');
    Route::post('/cart-hapus', 'KeranjangController@hapusChecked');
    Route::post('/add-cart', 'KeranjangController@addCart');
    Route::post('/add-cart-to-checkout', 'KeranjangController@addCartToCheckout');
    Route::post('/ajax-cart-to-checkout', 'KeranjangController@ajaxCartToCheckout');
    Route::post('/done-order', 'OrderController@doneOrder');
    Route::post('/send/message', 'ChatController@send');
});

Auth::routes();
