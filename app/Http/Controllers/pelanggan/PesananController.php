<?php

namespace App\Http\Controllers\pelanggan;

use App\Models\Toko;
use App\Models\SubOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Pagination\Paginator;

class PesananController extends Controller
{
    public function index(SubOrder $order)
    {
        Paginator::useBootstrap();

        $orderId = Order::where('user_id', auth()->user()->id)->get();

        // $orders = SubOrder::whereIn('order_id', $orderId->pluck('id'))->orderBy('created_at', 'desc')->get();
        $orders = SubOrder::with('items')->whereIn('order_id', $orderId->pluck('id'))->orderBy('created_at', 'desc')->get();


        return view('pelanggan.pesanan', compact('orders'));
    }

    public function show(Order $order, Toko $toko)
    {
        Paginator::useBootstrap();

        $items = $order->items;

        $orderId = Order::where('user_id', auth()->user()->id)->get();

        $orders = SubOrder::whereIn('order_id', $orderId->pluck('id'))->orderBy('created_at', 'desc')->get();

        // dd($orderId);

        return view('pelanggan.show', compact('items','orders'));
    }
}
