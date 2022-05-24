<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $table = 'search_histories';

    protected $fillable = [
        'user_id',
        'value',
        'created_at',
        'updated_at'
    ];

}
