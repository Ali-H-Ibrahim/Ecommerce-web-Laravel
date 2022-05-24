<?php

namespace App\Models;

use App\Observers\CategoryObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
    ];


    protected static function boot()
    {
        Parent::boot();
        Category::observe(CategoryObserver::class);
    }

    public function subCategories(){

        return $this->hasMany('App\Models\SubCategory','category_id','id');

    }

    public function products(){

        return $this->hasManyThrough('App\Models\Product',
            'App\Models\SubCategory','category_id',
            'SubCategory_id','id','id');
    }

    public function  getStatus(){

        return $this ->status == 1 ? "Active" : "In-Active";

    }

}
