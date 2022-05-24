<?php

namespace App\Observers;

use App\Models\SubCategory;
use App\Traits\ecommereTrait;

class SubCategoryObserver
{    use ecommereTrait;
    /**
     * Handle the SubCategory "created" event.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return void
     */
    public function created(SubCategory $subCategory)
    {
        //
    }

    /**
     * Handle the SubCategory "updated" event.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return void
     */
    public function updated(SubCategory $subCategory)
    {
        //
    }

    /**
     * Handle the SubCategory "deleted" event.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return void
     */
    public function deleted(SubCategory $subCategory)
    {
        foreach ($subCategory->products as $product){
            $this->deletImage("images\Product\main_photo\\",$product->main_img);
            foreach($product->images as $image){
                $this->deletImage("images\Product\images_Product\\",$image->img);
            }
            $product->images()->delete();
        }
        $subCategory->products()->delete();
    }

    /**
     * Handle the SubCategory "restored" event.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return void
     */
    public function restored(SubCategory $subCategory)
    {
        //
    }

    /**
     * Handle the SubCategory "force deleted" event.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return void
     */
    public function forceDeleted(SubCategory $subCategory)
    {
        //
    }
}
