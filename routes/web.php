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

// Produk
Route::get('/produk/search', 'App\Http\Controllers\ProdukController@search')->name('produk.search');
Route::get('/produk/show', 'App\Http\Controllers\ProdukController@show')->name('produk.show');
Route::resource('produk', 'App\Http\Controllers\ProdukController');

// Pedagang
Route::group(['prefix' => 'seller', 'middleware' => 'auth', 'as' => 'seller.', 'namespace' => 'App\Http\Controllers\Seller'], function() {
    Route::redirect('/', 'seller/orders');
    Route::resource('/orders', 'OrderController');
    Route::get('orders/delivered/{suborder}', 'OrderController@markDelivered')->name('order.delivered');
});

// Voyager
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

// Test
Route::get('/test', function () {
    $o = Order::find(10);

    dd($o->groupBy('toko_id'));
});
