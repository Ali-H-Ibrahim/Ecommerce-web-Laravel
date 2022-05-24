<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\UserSystemNotification;
use App\Models\Wanted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SystemNotificationController extends Controller
{


    public function storeWanted(Request $request)
    {

        if($request->has('id')) {
            Wanted::create([
                'user_id' => Auth::id(),
                'product_id' => $request->id,

            ]);
        }
        if($request->has('id_brand')) {

            Wanted::create([
                'user_id' => Auth::id(),
                'brand_id' => $request->id_brand,

            ]);}

        }

        public function Unfollow(Request $request)
    {

        if($request->has('id')) {
         $pruduct=Wanted::where('product_id',$request->id)->get();
            $pruduct->delete();
        }
        if($request->has('id_brand')) {

            $brand=Wanted::where('brand_id',$request->id_brand)->get();
            $brand->delete();

        }}




    public function veiwed()
    {
        $hh=UserSystemNotification::where('new',1)->where('user_id',Auth::id())->get();

        $category2=getNotificationsNew();

      //  $category=UserSystemNotification::get();

        if($category2){

            $subCategories=[];
            foreach ($category2 as $subCateg){
                $subCategories[]=[

                    'masg' => $subCateg->messages,

                ];
            }



            if($hh){
                foreach ($hh as$wanted) {

                    $wanted->update([
                        'new'=>null
                    ]);


                }}


            return response()->json([
                'status'=>true,
                'data'=>$subCategories,
            ]);
        }else
            return response()->json([
                'status'=>false,
                'msg'=>"error",
            ]);







        // Auth::user()->deletenotificationsOnlyNew()->delete();

    }



    public function check(Request $request)
    {
        $category2=getNotificationsNew();
        $category3=$categories = Message::where('to_user_id', Auth::id())->where('new', 1)->get();

            return response()->json([
                'status'=>true,
                'count'=>$category2->count(),
                'countMasg'=>$category3->count()
            ]);


    }


}
