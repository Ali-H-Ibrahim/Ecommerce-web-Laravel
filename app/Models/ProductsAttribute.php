<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsAttribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'attribute_id',
        'value',
        'price',
        'quantity',
    ];

    public function products(){
        return $this->belongsTo(Product::class,'product_id','id');

    }
    public function attributes()
    {
        return $this->belongsTo(Attribute::class, 'attribute_id', 'id');
    }
}
