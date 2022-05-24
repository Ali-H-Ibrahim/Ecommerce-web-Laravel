<?php


namespace App\Observers;


use App\Models\ShoppingCart;

class ShoppingcartObserver
{

    public function deleted(ShoppingCart $shoppingCart)
    {
        $shoppingCart->products()->delete();
    }

}
