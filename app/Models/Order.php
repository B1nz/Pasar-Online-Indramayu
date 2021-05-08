<?php

namespace App\Models;

use App\Models\Toko;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{

    protected $guarded = [];

    public function items()
    {
        return $this->belongsToMany(Produk::class, 'order_items', 'order_id', 'produk_id')->withPivot('jumlah', 'harga');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getShippingFullAddressAttribute()
    {

        return  $this->nama_penerima."<br>".$this->alamat_penerima . "<br> phone: " . $this->telp_penerima;
    }

    public function subOrders()
    {
        return $this->hasMany(SubOrder::class);
    }

    public function generateSubOrders()
    {
        $orderItems = $this->items;

        foreach($orderItems->groupBy('toko_id') as $tokoId => $produks) {

            $toko = Toko::find($tokoId);

            $suborder = $this->subOrders()->create([
                'order_id'=> $this->id,
                'toko_id'=> $toko->id,
                'grand_total'=> $produks->sum('pivot.harga'),
                'item_count'=> $produks->count()
            ]);

            foreach($produks as $produk) {
                $suborder->items()->attach($produk->id, ['harga' => $produk->pivot->harga, 'jumlah' => $produk->pivot->jumlah]);
            }

        }

    }
}
