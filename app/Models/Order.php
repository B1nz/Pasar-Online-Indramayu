<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    public function items()
    {
        return $this->belongsToMany(Produk::class, 'order_items', 'order_id', 'produk_id')->withPivot('jumlah','harga');
    }

    public function user()
    {
        return $this-> belongsTo(User::class);
    }
}
