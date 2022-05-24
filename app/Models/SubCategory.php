<?php

namespace App\Models;

use App\Observers\SubCategoryObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;


class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category_id',
        'status',
    ];

    protected static function boot()
    {
        Parent::boot();
        SubCategory::observe(SubCategoryObserver::class);
    }

    public function categories(){

        return $this->belongsTo('App\Models\Category','category_id','id');

    }

    public function products(){

        return $this->hasMany('App\Models\Product','SubCategory_id','id');

    }

    public function  getStatus(){

        return $this ->status == 1 ? "Active" : "In-Active";

    }
}
