<?php

use App\Models\Message;
use App\Models\Product;
use App\Models\Category;
use App\Models\ShoppingcartProduct;
use App\Models\SubCategory;
use App\Models\SystemNotification;

if (function_exists('allll') == FALSE) {
    function allll()
    {
        $subCategories = SubCategory::with('categories')->get();
        return $subCategories;
    }
}

if (function_exists('getAllCategories') == FALSE) {
    function getAllCategories()
    {
        $categories = Category::with('subCategories')->with('products')->has('products')->get();

        return $categories;
    }
}

if (function_exists('getAllProducts') == FALSE) {
    function getAllProducts()
    {
        $products = Product::orderby('updated_at', 'desc')->paginate(5);

        return $products;
    }
}

if (function_exists('getFeaturedProducts') == FALSE) {
    function getFeaturedProducts()
    {
        $products = Product::where('featured', 1)->orderby('updated_at', 'desc')->latest()->get();

        return $products;
    }
}

if (function_exists('getNotificationsNew') == FALSE) {
    function getNotificationsNew()
    {

        $categories = null;
        if (Auth::user())
            $categories = Auth::user()->notifications()->with('notificationsNewUser')->where('new', 1)->get();
        // $categories =SystemNotification::with('User')->where('user_id',Auth::id())->where('new',1);

        return $categories;
    }
}


if (function_exists('getNotifications') == FALSE) {
    function getNotifications()
    {

        $categories = null;
        if (Auth::user())
            $categories = Auth::user()->notifications()->with('notificationsNewUser')->where('new',null)->paginate(5);
        // $categories =SystemNotification::with('User')->where('user_id',Auth::id())->where('new',1);

        return $categories;
    }
}

if (function_exists('getNotificationsall') == FALSE) {
    function getNotificationsall()
    {

        $categories = null;
        if (Auth::user())
            $categories = Auth::user()->notifications()->with('notificationsNewUser')->where('new',null)->get();
        // $categories =SystemNotification::with('User')->where('user_id',Auth::id())->where('new',1);

        return $categories;
    }
}

if (function_exists('getMessageNew') == FALSE) {
    function getMessageNew()
    {

        $categories = null;
        if (Auth::user()) {
            $categories = Message::where('to_user_id', Auth::id())->where('new', 1)->get();
            $messageNew = $categories;


            if ($messageNew)
                foreach ($messageNew as $wanted) {

                    $wanted->update([
                        'new' => 0
                    ]);
                }
        }

        // $categories =SystemNotification::with('User')->where('user_id',Auth::id())->where('new',1);

        return $categories;
    }
}

if (function_exists('OKMessage') == FALSE) {

    function OKMessage()
    {

        $categories = null;

        $admins = \App\Models\User::select('id')->where('admin', 1)->get();
        if (Auth::user()) {
            $categories = Message::where('to_user_id', Auth::id())->wherein('from_user_id', $admins)->orwhere('to_user_id', null)->where('from_user_id', Auth::id())->get();
//            $categories2 =Message::wherein('to_user_id',$admins)->where('from_user_id', Auth::id() )->get()->toArray();
//
//            if($categories || $categories2)
//        $result = array_merge($categories, $categories2);
//        $collection = collect([
//            $result
//        ]);
        }

        return $categories;
    }
}
if (function_exists('OKMessageId') == FALSE) {

    function OKMessageId($id)
    {

        $categories = null;

        $admins = \App\Models\User::select('id')->where('admin', 1)->get();
        if (Auth::user()) {
            $categories = Message::where('to_user_id', $id)->wherein('from_user_id', $admins)->orwhere('to_user_id',null)->where('from_user_id', $id)->get();
//            $categories2 =Message::wherein('to_user_id',$admins)->where('from_user_id', Auth::id() )->get()->toArray();
//
//            if($categories || $categories2)
//        $result = array_merge($categories, $categories2);
//        $collection = collect([
//            $result
//        ]);
        }

        return $categories;
    }
}




if (function_exists('userId') == FALSE) {

    function userId($id)
    {

        $categories = null;

        $user = \App\Models\User::find($id);


        return $user;
    }
}


if (function_exists('custom') == FALSE) {

    function custom()
    {

        $categories = null;

        $admins = \App\Models\User::select('id')->where('admin', 1)->get();
        if (Auth::user()) {
            $categories = Message::select('from_user_id')->where('to_user_id', null)->get();
//            $categories2 =Message::wherein('to_user_id',$admins)->where('from_user_id', Auth::id() )->get()->toArray();
//
//            if($categories || $categories2)
//        $result = array_merge($categories, $categories2);
//        $collection = collect([
//            $result
//        ]);
            $admins = \App\Models\User::wherein('id', $categories)->get();

        }


        return $admins;
    }
}


if (function_exists('getFatherCategory') == FALSE) {
    function getFatherCategory($subCategory)
    {
        $category = $subCategory->categories;
        return $category;
    }
}

if (function_exists('getProductCategory') == FALSE) {
    function getProductCategory($product)
    {
        $subcategory = $product->subCategories;
        $category = $subcategory->categories;
        return $category;
    }
}

if (function_exists('getProductBrand') == FALSE) {
    function getProductBrand($product)
    {
        $brand = $product->brands;
        return $brand;
    }
}

if (function_exists('getAllCategoryBrands') == FALSE) {
    function getAllCategoryBrands($category)
    {
        $products = $category->products()->get();
        $brands = collect([]);
        foreach ($products as $product) {
            $brand = $product->brands;
            $brands->push($brand);
        }
        $brands = $brands->unique();
        return $brands;
    }
}

if (function_exists('getShoppingcartProductCount') == FALSE) {
    function getShoppingcartProductCount($cart, $product)
    {
        $sp = ShoppingcartProduct::where('shoppingcart_id', $cart->id)
                            ->where('product_id', $product->id)
                            ->first();
        return $sp->count;
    }
}
