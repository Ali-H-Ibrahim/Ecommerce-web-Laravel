<?php

namespace App\Http\Controllers\Front;

use App\Models\Coupon;
use App\Models\Product;
use App\Models\Setting;
use App\Models\ShoppingCart;
use App\Models\ShoppingcartProduct;
use App\Models\ProductsAttribute;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Output\ConsoleOutput;
use Session;

class CartController extends Controller
{

    public function showShoppingCart()
    {
        $cart = ShoppingCart::with('products')->where('user_id', Auth::id())->get();
        $setting = Setting::first();

    //     $p = Product::where('shoppingcart_id', $c -> id)->first();
    //     $a = ProductsAttribute::where('product_id', $c -> id)->get();
    //    return response()->json($a);
        return view('front.mainPages.cart', compact('cart', 'setting'));
    }

    public function storeShoppingCart(Request $request)
    {
        $userId = Auth::id();

        $shoppingcart = $this->hasShoppingcart($userId);

        if (!$shoppingcart) {
            $shoppingcart = Shoppingcart::create([
                'user_id' => $userId
            ]);
        }

        $check = ShoppingcartProduct::where('product_id', $request->id)
            ->where('shoppingcart_id', Auth::user()->shoppingcart->id)
            ->first();

        $product = Product::find($request->id);

        $subtotal = (Auth::user()->shoppingcart->subtotal) + ($product->price);

        Auth::user()->shoppingcart->update([
            'subtotal' => $subtotal
        ]);

        if ($check) {
            return \Response::json(['error' => 'Product already has on your ShoppingCart']);
        } else {

            ShoppingcartProduct::create([
                'shoppingcart_id' => $shoppingcart->id,
                'product_id' => $request->id,
            ]);

            return \Response::json(['success' => 'Product added on ShoppingCart']);
        }

    }

    public function hasShoppingcart($userId)
    {
        return Shoppingcart::where('user_id', $userId)->first();
    }

    public function checkout($grand_total)
    {
        $cart = ShoppingCart::get();

        return view('front.mainPages.checkout', compact('cart', 'grand_total'));

    }

    public function coupon(Request $request)
    {
        $coupon = Coupon::where('coupon', $request->coupon)->first();

        if ($coupon) {
            Session::put('coupon', [
                'coupon' => $coupon->coupon,
                'discount' => $coupon->discount,
                'balance' => Auth::user()->shoppingcart->subtotal - $coupon->discount
            ]);

            return \Response::json(['success' => 'Successfully Coupon Applied']);

        } else {
            return \Response::json(['error' => 'Invalid Coupon']);
        }

    }

    public function couponDelete()
    {
        Session::forget('coupon');

        $notification = array(
            'message' => 'Coupon removed Successfully',
            'alert-type' => 'success'
        );

        return \Response::json(['success' => 'Coupon removed Successfully']);
    }

    public function PaymentPage()
    {
        $cart = ShoppingCart::get();
        return view('pages.payment', compact('cart'));
    }

    public function updateShoppingCart(Request $request)
    {
        $request->validate([
            'count' => 'required | numeric | min:1'
        ]);

        $this->updateSubtotal($request->product_id, $request->shoppingcart_id, $request->count);

        ShoppingcartProduct::where('shoppingcart_id', $request->shoppingcart_id)
            ->where('product_id', $request->product_id)
            ->update($request->only('count'));

        return \Response::json(['success' => 'Product quantity updated successfully']);
    }

    public function updateSubtotal($product_id, $shoppingcart_id, $count)
    {
        $cart = ShoppingCart::find($shoppingcart_id);

        $product = Product::find($product_id);

        $cartProduct = ShoppingcartProduct::where('shoppingcart_id', $shoppingcart_id)
            ->where('product_id', $product_id)->first();

        if ($count > ($cartProduct->count))
            $subtotal = ($cart->subtotal) + ($product->price);
        else
            $subtotal = ($cart->subtotal) - ($product->price);

        $cart->update([
            'subtotal' => $subtotal
        ]);
    }

    public function deleteShoppingCart($id)
    {
        $product = Product::find($id);
        $shoppingcart = ShoppingCart::where('user_id', Auth::id())->first();
        $shoppingcartProduct = ShoppingcartProduct::where('shoppingcart_id', $shoppingcart->id)->where('product_id', $id)->first();

        if (!$shoppingcart) {
            return \Response::json(['error' => 'Product does not exist']);
        } else {
            $subtotal = ($shoppingcart->subtotal) - ($product->price);
            $shoppingcart->update([
                'subtotal' => $subtotal
            ]);
            $shoppingcartProduct->delete();
            return \Response::json(['success' => 'Product deleted successfully']);
        }
    }

}
