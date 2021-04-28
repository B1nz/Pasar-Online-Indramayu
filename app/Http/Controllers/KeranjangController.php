<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use ReflectionFunctionAbstract;

class KeranjangController extends Controller
{
    public function add(Produk $produk)
    {

        // add the product to cart
        \Cart::session(auth()->id())->add(array(
            'id' => $produk->id,
            'name' => $produk->nama,
            'price' => $produk->harga,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $produk
        ));

        return redirect()->route('keranjang.index');
    }

    public function index()
    {
        $keranjangItems = \Cart::session(auth()->id())->getContent();

        return view('keranjang.index', compact('keranjangItems'));
    }

    public function destroy($itemId)
    {
        \Cart::session(auth()->id())->remove($itemId);

        return back();
    }

    public function update($rowId)
    {
        \Cart::session(auth()->id())->update($rowId, [
            'quantity' => array(
                'relative' => false,
                'value' => request('quantity')
            ),
        ]);

        return back();
    }


}
