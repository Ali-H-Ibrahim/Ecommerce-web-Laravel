<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'user_id',
        'first_name',
        'last_name',
        'city',
        'address',
        'phone_number',
        'zip_code',
        'ship_date',
        'required_date',
        'payment_date',
        'status',
        'grand_total',
        'payment_status',
        'payment_method',
        //        'payment_id',
    ];

    public function orderProducts()
    {
        return $this->hasMany('App\Models\Order_product', 'order_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
