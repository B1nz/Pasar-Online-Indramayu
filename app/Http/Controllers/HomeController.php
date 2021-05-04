<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Models\Category;

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

        $produks = Produk::take(8)->get();

        if (Auth::guest()) {
            $keranjangItems =  \Cart::session(auth()->guest())->getContent();
        } else {
            $keranjangItems = \Cart::session(auth()->id())->getContent();
        }

        $categories = Category::whereNull('parent_id')->get();
        return view('home', ['allProduk' => $produks,'categories' => $categories], compact('keranjangItems'));
    }
}
