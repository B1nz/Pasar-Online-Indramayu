<?php

namespace App\Http\Controllers;

use App\Mail\OrderBerhasil;
use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            'nama_penerima' => 'required',
            'alamat_penerima' => 'required',
            'telp_penerima' => 'required'
        ]);

        $order = new Order();

        $order->order_no = uniqid('OrderPasarNo-');

        $order->nama_penerima = $request->input('nama_penerima');
        $order->alamat_penerima = $request->input('alamat_penerima');
        $order->telp_penerima = $request->input('telp_penerima');
        $order->keterangan = $request->input('keterangan');

        $order->grand_total = \Cart::session(auth()->id())->getTotal();
        $order->item_count = \Cart::session(auth()->id())->getContent()->count();

        $order->user_id = auth()->id();

        $order->save();

        // Save order items

        $cartItems = \Cart::session(auth()->id())->getContent();

        foreach($cartItems as $item) {
            $order->items()->attach($item->id, ['harga'=> $item->price, 'jumlah'=> $item->quantity]);
        }

        // Send mail to customer

        Mail::to($order->user->email)->send(new OrderBerhasil($order));

        // Empty Cart

        \Cart::session(auth()->id())->clear();

        // Take user to thank you

        return redirect()->route('home')->withMessage('Pesanan Berhasil Dibuat!');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(order $order)
    {
        //
    }
}
