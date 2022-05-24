<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingcartProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'count',
        'shoppingcart_id',
        'product_id',
        'created_at',
        'updated_at'
    ];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }

}
