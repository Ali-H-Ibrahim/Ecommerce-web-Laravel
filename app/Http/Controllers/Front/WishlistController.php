<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use App\Models\Wishlist;
use App\Http\Controllers\Controller;
use App\Models\WishlistProduct;
use Illuminate\Http\Request;
use DB;
use Auth;

class WishlistController extends Controller
{

    public function showWishList()
    {
        $wishlist = Wishlist::with('products')->where('user_id', Auth::id())->get();
        return view('front.mainPages.wish_list', compact('wishlist'));
    }

    public function addWishlist(Request $request)
    {

        $userId = Auth::id();
		$wishlist = $this->hasWishlist($userId);

        if (!$wishlist) {
            $wishlist = Wishlist::create([
                'user_id' => $userId,
            ]);
        }


        $check = WishlistProduct::where('product_id', $request->id)->first();

        if ($check) {
            return \Response::json(['error' => 'Product already has on your wishlist']);
        } else {

            WishlistProduct::create([
                'wishlist_id' => $wishlist->id,
                'product_id' => $request->id
            ]);

            return \Response::json(['success' => 'Product added on wishlist']);
        }

    }

	public function hasWishlist($userId) {
		return Wishlist::where('user_id', $userId)->first();
	}

    public function deleteWishlist($id)
    {
        $wishlist = Wishlist::where('user_id', Auth::id())->first();
        $wishlistProduct = WishlistProduct::where('wishlist_id', $wishlist->id)->where('product_id', $id)->first();

        if (!$wishlistProduct) {
            return \Response::json(['error' => 'Product does not exist']);
        } else {
            $wishlistProduct->delete();
            return \Response::json(['success' => 'Product deleted successfully']);
        }
    }


}
