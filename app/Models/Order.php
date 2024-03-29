<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'order_date',
        'total_price',
        'status',
        'total_price',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function order_detail()
    {
        return $this->belongsTo(Order_detail::class,'order_id', 'id');
    }
}
