<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'tax',
        'shipping_cost',
        'site_name',
        'email',
        'phone',
        'adderss',
        'logo',
        'favicon',
        'created_at',
        'updated_at'
    ];
}
