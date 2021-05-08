<?php

namespace App\Http\Controllers\Seller;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SubOrder;
use App\Models\Toko;

class OrderController extends Controller
{
    public function index()
    {
        $tokoId = Toko::select('id')->firstWhere('user_id', auth()->id())->id;

        $orders = SubOrder::where('toko_id', $tokoId)->get();

        // dd($tokoId);

        return view('sellers.order.index', compact('orders'));

    }

    public function show(SubOrder $order)
    {
        $items = $order->items;

        return view('sellers.order.show', compact('items'));
    }

    public function markDelivered(SubOrder $suborder)
    {
        $suborder->status = 'selesai';
        $suborder->save();

        // Check all sub order complete
        $pendingSubOrders = $suborder->order->subOrders()->where('status','!=', 'selesai')->count();

        if($pendingSubOrders == 0) {
            $suborder->order()->update(['status'=>'selesai']);
        }

        return redirect('/seller/orders')->withMessage('Order ditandai selesai');
    }
}
