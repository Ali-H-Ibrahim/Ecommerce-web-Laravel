<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use DB;

class CouponController extends Controller {

    public function index(){
        $coupon = Coupon::get();
        return view('admin.coupon.index', compact('coupon'));
    }

    public function storeCoupon(Request $request){

        Coupon::create([
            'coupon' => $request->coupon,
            'discount' => $request->discount
        ]);

        $notification = array(
            'messege' => 'Coupon Inserted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);

    }

    public function deleteCoupon($id){
        Coupon::where('id', $id)->delete();
        $notification = array(
            'messege' => 'Coupon Deleted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);

    }

    public function editCoupon($id) {
        $coupon = Coupon::where('id', $id)->first();
        return view('admin.coupon.edit', compact('coupon'));
    }

    public function updateCoupon(Request $request, $id) {

        $coupon = Coupon::find($id);

        $coupon->update([
            'coupon' => $request->coupon,
            'discount' => $request->discount
        ]);

        $notification = array(
            'messege' => 'Coupon Updated Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('show.coupon')->with($notification);
    }



}
