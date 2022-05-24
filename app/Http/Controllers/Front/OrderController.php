<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Order_product;
use App\Http\Requests\OrderRequest;
use App\Models\Setting;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function showOrders()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('front.mainPages.orders', compact('orders'));
    }


	public function store(Request $request)
    {
        $userId = Auth::id();

        // Get Cart
        $carts = ShoppingCart::where('user_id', $userId)->get();

        // Payment
        $todayPayment = Carbon::today();
        $todayRequired = Carbon::today();
        $todayShip = Carbon::today();

        $payment_date = $todayPayment;
        $ship_date = $todayShip->addDays(10);
        $required_date = $todayRequired->addDays(20);

        // Create new Order
        $order = Order::create([
            'order_number' => random_int(1,100000),
            'user_id' => $userId,
            'first_name' => $request -> first_name,
            'last_name' => $request -> last_name,
            'city' => $request -> city,
            'address' => $request-> address,
            'phone_number' => $request -> mobile,
            'zip_code' => $request -> zipcode,
            'ship_date' => $ship_date,
            'required_date' => $required_date,
            'payment_date' => $payment_date,
            'grand_total' => $request -> grand_total,
            'payment_method'=> $request -> payment_method
        ]);


        $discount = 10;
        // Store all the cart items into product order
        foreach ($carts as $cart) {

            foreach ($cart->products as $current_product) {

                $total_price = getShoppingcartProductCount($cart, $current_product) * ($current_product -> price);

                Order_product::create([
                    'order_id' => $order->id,
                    'product_id' => $current_product->id,
                    'quantity' => getShoppingcartProductCount($cart, $current_product),
                    'price' => $current_product->price,
                    'discount' => $discount,
                    'total_price' => $total_price,
                ]);
            }

            $cart->delete();
        }

        $rewardedPoints = 5;
        $points = $rewardedPoints + Auth::user()->user_points;

        Auth::user()->update([
           'user_points' => $points
        ]);

        return \Response::json(['success' => 'Your Order submitted successfully 😊   ' . $rewardedPoints .' Added to your account 💰']);

    }

}
