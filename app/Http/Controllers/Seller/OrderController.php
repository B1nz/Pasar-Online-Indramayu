<?php

namespace App\Http\Controllers\Seller;

use App\Models\Toko;
use App\Models\Order;
use App\Models\SubOrder;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    public function index(SubOrder $order)
    {
        Paginator::useBootstrap();

        $items = $order->items;

        $tokoId = Toko::select('id')->firstWhere('user_id', auth()->id())->id;

        $orders = SubOrder::where('toko_id', $tokoId)->orderBy('created_at', 'desc')->get();

        return view('sellers.order.backup', compact('items','orders'));

    }

    public function show(SubOrder $order)
    {
        $items = $order->items;

        // dd($items);

        return view('sellers.order.show', compact('items'));
    }

    public function markTolak(SubOrder $suborder)
    {
        $suborder->status = 'gagal';
        $suborder->save();

        Alert::info('Order di Proses!', 'Order ditandai proses!');

        return redirect('/seller/orders')->withMessage('Order ditandai proses');
    }

    public function markProses(SubOrder $suborder)
    {
        $suborder->status = 'proses';
        $suborder->save();

        Alert::info('Order di Proses!', 'Order ditandai proses!');

        return redirect('/seller/orders')->withMessage('Order ditandai proses');
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

        Alert::success('Order Selesai!', 'Order ditandai selesai!');

        return redirect('/seller/orders')->withMessage('Order ditandai selesai');
    }
}
