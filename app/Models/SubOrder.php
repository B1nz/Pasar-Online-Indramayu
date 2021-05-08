<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubOrder extends Model
{
    protected $guarded = [];

    public function items()
    {
        return $this->belongsToMany(Produk::class, 'sub_order_items', 'sub_order_id', 'produk_id')->withPivot('jumlah', 'harga');
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
