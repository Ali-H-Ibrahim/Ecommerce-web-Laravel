<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishlistProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'wishlist_id',
        'product_id',
        'created_at',
        'updated_at'
    ];

    public function wishlist()
    {
        return $this->belongsTo(Wishlist::class, 'wishlist_id', 'id');
    }
}
