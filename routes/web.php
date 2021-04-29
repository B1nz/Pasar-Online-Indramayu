<?php

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
