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

        $produksRndm = Produk::inRandomOrder()->limit(5)->get();

        $produksFrst = Produk::inRandomOrder()->limit(3)->get();

        $produkFresh = Produk::orderBy('created_at', 'desc')->paginate(5);

        $produkUpdtd = Produk::orderBy('updated_at', 'desc')->paginate(8);

        if (Auth::guest()) {
            $keranjangItems = \Cart::session(auth()->guest())->getContent();
        } else {
            $keranjangItems = \Cart::session(auth()->id())->getContent();
        }

        $categories = Category::whereNull('parent_id')->get();

        return view('home', ['freshProduk' => $produkFresh, 'firstProduk' => $produksFrst,'categories' => $categories, 'rndmProduk' => $produksRndm, 'updtdProduk' => $produkUpdtd], compact('keranjangItems'));
    }

    public function aboutus()
    {
        return view('aboutus');
    }
}
