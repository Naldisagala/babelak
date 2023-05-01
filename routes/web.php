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

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/home', function () {
    return view('pages.home');
});

Route::get('/barang', function () {
    return view('pages.barang');
});
Route::get('/keranjang', function () {
    return view('pages.keranjang');
});

Route::get('/login-page', function () {
    return view('login');
});
Route::get('/register-page', function () {
    return view('register');
});
Auth::routes();
