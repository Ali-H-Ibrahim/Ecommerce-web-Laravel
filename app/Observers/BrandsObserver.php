<?php

namespace App\Observers;

use App\Models\Brand;
use App\Traits\ecommereTrait;

class BrandsObserver
{ use ecommereTrait;
    /**
     * Handle the Brand "created" event.
     *
     * @param  \App\Models\Brand  $brand
     * @return void
     */
    public function created(Brand $brand)
    {
        //
    }

    /**
     * Handle the Brand "updated" event.
     *
     * @param  \App\Models\Brand  $brand
     * @return void
     */
    public function updated(Brand $brand)
    {
        //
    }

    /**
     * Handle the Brand "deleted" event.
     *
     * @param  \App\Models\Brand  $brand
     * @return void
     */
    public function deleted(Brand $brand)
    {
        $this->deletImage("images\brands\logo\\",$brand->logo);
        foreach ($brand->products as $product){
            $this->deletImage("images\Product\main_photo\\",$product->main_img);
            foreach($product->images as $image){
                $this->deletImage("images\Product\images_Product\\",$image->img);
            }
            $product->images()->delete();
        }
        $brand->products()->delete();
    }

    /**
     * Handle the Brand "restored" event.
     *
     * @param  \App\Models\Brand  $brand
     * @return void
     */
    public function restored(Brand $brand)
    {
        //
    }

    /**
     * Handle the Brand "force deleted" event.
     *
     * @param  \App\Models\Brand  $brand
     * @return void
     */
    public function forceDeleted(Brand $brand)
    {
        foreach ($brand->products as $product){

            $this->deletImage("images\Product\main_photo\\",$product->main_img);
            foreach ( $product->images as $image){
                $this->deletImage("images\Product\images_Product\\",$image->img);
            }
            $product->images()->delete();
        }
        $brand->products()->delete();
    }
}
