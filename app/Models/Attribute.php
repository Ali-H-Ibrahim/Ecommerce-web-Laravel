<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'field_type',
        'is_required'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, ProductsAttribute::class,
            'attribute_id', 'product_id', 'id', 'id');
    }
}
