<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::guest()) {
            $keranjangItems =  \Cart::session(auth()->guest())->getContent();
        } else {
            $keranjangItems = \Cart::session(auth()->id())->getContent();
        }

        $produks = Produk::take(8)->get();

        return view('home', ['allProduk' => $produks], compact('keranjangItems'));
    }
}
