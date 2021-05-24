<?php

use App\Models\Order;
use App\Test;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::redirect('/', '/home');

Route::redirect('/dashboard', '/home');

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/aboutus', 'App\Http\Controllers\HomeController@aboutus')->name('aboutus');

// Edit Account
Route::get('/edit', 'App\Http\Controllers\Auth\EditController@index')->name('edit');

Route::post('/edit/update', 'App\Http\Controllers\Auth\EditController@update')->name('edit.update');

// Keranjang
Route::group(['middleware' => 'auth'], function(){

    Route::get('/tambah-ke-keranjang/{produk}', 'App\Http\Controllers\KeranjangController@add')->name('keranjang.add');

    Route::get('/keranjang', 'App\Http\Controllers\KeranjangController@index')->name('keranjang.index');

    Route::get('/keranjang/destroy{itemId}', 'App\Http\Controllers\KeranjangController@destroy')->name('keranjang.destroy');

    Route::get('/keranjang/update{itemId}', 'App\Http\Controllers\KeranjangController@update')->name('keranjang.update');

    Route::get('/keranjang/checkout', 'App\Http\Controllers\KeranjangController@checkout')->name('keranjang.checkout');

});


// Order
Route::resource('orders', 'App\Http\Controllers\OrderController')->middleware('auth');


// Toko
Route::resource('toko', 'App\Http\Controllers\TokoController')->middleware('auth');

// Pembelian
Route::resource('pesanan', 'App\Http\Controllers\pelanggan\PesananController')->middleware('auth');

// Produk
Route::get('/produk/search', 'App\Http\Controllers\ProdukController@search')->name('produk.search');
Route::get('/produk/show', 'App\Http\Controllers\ProdukController@show')->name('produk.show');
Route::get('/produk/pihps', 'App\Http\Controllers\ProdukController@pangan')->name('produk.pihps');
Route::resource('produk', 'App\Http\Controllers\ProdukController');

// Pedagang
Route::group(['prefix' => 'seller', 'middleware' => 'auth', 'as' => 'seller-', 'namespace' => 'App\Http\Controllers\Admin'], function() {
    Route::redirect('/', 'seller/orders');
    Route::resource('/orders', 'OrderController');
    Route::get('orders/tolak/{suborder}', 'OrderController@markTolak')->name('order.tolak');
    Route::get('orders/proses/{suborder}', 'OrderController@markProses')->name('order.proses');
    Route::get('orders/delivered/{suborder}', 'OrderController@markDelivered')->name('order.delivered');
});

// Voyager
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
