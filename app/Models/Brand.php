<?php

namespace App\Models;

use App\Observers\BrandsObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'logo',
        'description',
        'image'
    ];


    protected static function boot()
    {
        Parent::boot();
        Brand::observe(BrandsObserver::class);
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product','brand_id','id');
    }
}
