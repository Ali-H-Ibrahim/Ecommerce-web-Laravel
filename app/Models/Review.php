<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'rate',
        'comment',
        'created_at',
        'updated_at'
    ];

    public function user() {
        return $this->belongsTo('App\Models\User','user_id','id');
    }

}
