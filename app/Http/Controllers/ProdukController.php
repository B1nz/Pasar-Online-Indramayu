<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class ProdukController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Paginator::useBootstrap();

        $keranjangItems = \Cart::session(auth()->id())->getContent();

        $categoryId = request('category_id');
        $categoryName = null;

        if($categoryId){
            $category = Category::find($categoryId);
            $categoryName = ucfirst($category->name);

            $produks = $category->allProducts();
        }else{
            $produks = Produk::take(10)->get();
        }

        $categories = Category::whereNull('parent_id')->get();


        return view('produk.index', compact('keranjangItems', 'produks', 'categoryName'), ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        $keranjangItems = \Cart::session(auth()->id())->getContent();

        return view('produk.show', compact('produk','keranjangItems'));
    }

    public function search(Request $request)
    {
        Paginator::useBootstrap();

        $keranjangItems = \Cart::session(auth()->id())->getContent();

        $query = $request->input('query');

        $produks = Produk::where('nama','LIKE',"%$query%")->paginate(16);

        $categories = Category::whereNull('parent_id')->get();

        return view('produk.catalog', compact('produks','keranjangItems'), ['categories' => $categories]);
    }
}
