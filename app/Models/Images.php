<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'img',
    ];

    public function products(){
        return $this->belongsTo(Product::class,'product_id','id');
    }

}
