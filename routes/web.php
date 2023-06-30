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

Route::get('/tawar/{user}/{seller}/{barang}/{harga}','TawarController@sendChatTawar');
Route::POST('/tawar/{user}/{seller}/{barang}/{harga}','TawarController@sendChatTawar');

Route::get('/barang/{id}','HomeController@barang_detail');

Route::get('/keranjang', 'KeranjangController@index');

Route::get('/login-page', function () {
    return view('login');
});
Route::get('/register-page', function () {
    return view('register');
});
Auth::routes();
