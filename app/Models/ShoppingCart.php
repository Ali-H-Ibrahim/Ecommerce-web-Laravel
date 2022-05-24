<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;

    protected $table = 'shoppingcarts';

    protected $fillable = [
        'id',
        'user_id',
        'subtotal',
        'created_at',
        'updated_at'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, ShoppingcartProduct::class,
            'shoppingcart_id', 'product_id','id', 'id');
    }

    public function user() {

        return $this->belongsTo('App\Models\User','user_id','id');
    }

}
