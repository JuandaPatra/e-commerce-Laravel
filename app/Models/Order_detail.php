<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Stuff;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order_detail extends Model
{
    use HasFactory;

    public function stuff()
    {
        return $this->belongsTo(Stuff::class, 'stuff_id', 'id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
