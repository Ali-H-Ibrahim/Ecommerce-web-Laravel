<?php

namespace App\Observers;

use App\Models\Wishlist;

class WishlistObserver
{
    public function deleted(Wishlist $wishlist)
    {
        $wishlist->products()->delete();
    }

}
