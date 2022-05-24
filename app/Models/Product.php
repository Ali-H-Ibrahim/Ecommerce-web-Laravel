<?php

namespace App\Models;

use App\Observers\ProductObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'quantity',
        'price',
        'description',
        'SubCategory_id',
        'brand_id',
        'status',
        'code',
        'sale_counts',
        'rate_counts',
        'main_img',
        'shoppingcart_id'
    ];


    protected static function boot()
    {
        Parent::boot();
        Product::observe(ProductObserver::class);
    }

    // public function price()
    // {
    //     if ($this->discount > 0) {
    //         return  ($this->price - ($this->price * $this->discount) / 100);
    //     } else {
    //         return  $this->price;
    //     }
    // }

    // public function getPriceAfterDiscount()
    // {
    //     return $this->price();
    // }

    public function subCategories()
    {
        return $this->belongsTo(SubCategory::class, 'SubCategory_id', 'id');
    }

    public function brands()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function images()
    {
        return $this->hasMany(Images::class, 'product_id', 'id');
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, ProductsAttribute::class,
            'product_id', 'attribute_id', 'id', 'id');
    }

    // public function attributesValues()
    // {
    //     return $this->hasMany(ProductsAttribute::class, 'product_id', 'id');
    // }

    public function withlists()
    {
        return $this->belongsToMany(Wishlist::class, WishlistProduct::class,
            'product_id', 'wishlist_id', 'id', 'id');
    }

    public function shoppingcarts()
    {
        return $this->belongsToMany(ShoppingCart::class, ShoppingcartProduct::class,
            'product_id', 'shoppingcart_id','id', 'id');
    }

    public function orderProducts()
    {
        return $this->hasMany(Order_product::class, 'product_id', 'id');
    }


    public function users()
    {
        return $this->belongsToMany('App\Models\User', Wanted::class,
            'product_id', 'user_id', 'id', 'id');
    }

    public function reviews() {
        return $this->hasMany(Review::class, 'user_id', 'id');
    }

    public function getStatus() { return $this->status == 'On' ? "Active" : "In-Active"; }

}
