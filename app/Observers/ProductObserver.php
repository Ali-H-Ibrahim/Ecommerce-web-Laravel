<?php

namespace App\Observers;

use App\Models\Product;
use App\Traits\ecommereTrait;

class ProductObserver
{

    use ecommereTrait;
    /**
     * Handle the Product "created" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function created(Product $product)
    {
        //
    }

    /**
     * Handle the Product "updated" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function updated(Product $product)
    {
        //
    }

    /**
     * Handle the Product "deleted" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function deleted(Product $product)
    {
        $this->deletImage("images\Product\main_photo\\",$product->main_img);

        foreach ( $product->images as $image){
            $this->deletImage("images\Product\images_Product\\",$image->img);
        }
        $product->images()->delete();
      //  $product->images()->delete();
    }

    /**
     * Handle the Product "restored" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function restored(Product $product)
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function forceDeleted(Product $product)
    {
        $this->deletImage("images\Product\main_photo\\",$product->main_img);


        foreach ( $product->images as $image){

            $this->deletImage("images\Product\images_Product\\",$image[]->img);
        }
        $product->images()->delete();


    }
}
