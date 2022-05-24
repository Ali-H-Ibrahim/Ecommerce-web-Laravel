<?php

namespace App\Observers;

use App\Models\Category;
use App\Traits\ecommereTrait;

class CategoryObserver
{
    use ecommereTrait;

    /**
     * Handle the Category "created" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function created(Category $category)
    {
        //
    }

    /**
     * Handle the Category "updated" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function updated(Category $category)
    {
        //
    }

    /**
     * Handle the Category "deleted" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function deleted(Category $category)
    {
        foreach ($category->products as $product){
            $this->deletImage("images\Product\main_photo\\",$product->main_img);
            foreach($product->images as $image){
                $this->deletImage("images\Product\images_Product\\",$image->img);
            }
            $product->images()->delete();

        }
        $category->products()->delete();
        $category->subCategories()->delete();
    }

    /**
     * Handle the Category "restored" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function restored(Category $category)
    {
        //
    }

    /**
     * Handle the Category "force deleted" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function forceDeleted(Category $category)
    {
        //
    }
}
