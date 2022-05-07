<?php

namespace App\Models;

use App\Models\Order_detail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stuff extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'stock',
        'description',
        'images'

    ];
    public function order_detail()
    {
        return $this->hasMany(Order_detail::class, 'stuff_id', 'id');
    }
}
