<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_product extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'price',
        'quantity',
        'color',
        'size',
        'discount',
        'total_price'
    ];

    public function products()
    {
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }

    public function orders()
    {
        return $this->belongsTo('App\Models\Order', 'order_id', 'id');
    }
}
