<?php

namespace App\Http\Controllers\Admin;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class ChatsController extends Controller
{

    public function index()
    {
        return view('admin.chat.chat-app');
    }

    public function getMessages(Request  $request)
    {
        $admins = User::select('id')->where('admin', 1)->get();
        $categories = Message::where('to_user_id', $request->user_id)->wherein('from_user_id', $admins)->orwhere('to_user_id', null)->where('from_user_id', $request->user_id)->get();


        $subCategories = [];
        foreach ($categories as $subCateg) {
            $image=User::find($subCateg->from_user_id)->image;
            $subCategories[] = [
                'message' => $subCateg->message,
                'from_user_id' => $subCateg->from_user_id,
                'to_user_id' => $subCateg->to_user_id,
                'page' => $subCateg->page,
                'image' => $image,

            ];
            $subCateg->update([
                'new' => 0
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $subCategories
        ]);    }

    public function sendMessage(Request $request)
    {

        /**************************** new **********************************************/

        //$id_user=User::where('admin',1)->whereNotIn('id',[Auth::id()])->first()->id;

        $message =Message::create([

            'message'=>$request->message,
            'from_user_id'=>Auth::id(),
            'to_user_id'=>$request->id_customer,
            'new'=>1,
            'page'=>1
        ]);

        return response()->json([
            'status'=>true,

        ]);

    }




    public function check1(Request $request)
    {
       $admins = User::select('id')->where('admin', 1)->get();
       $categories = Message::where('to_user_id',null)->where('from_user_id', $request->id_customer)->where('new',1)->get();


        $subCategories = [];
        foreach ($categories as $subCateg) {
            $image=User::find($subCateg->from_user_id)->image;
            $subCategories[] = [
                'message' => $subCateg->message,
                'from_user_id' => $subCateg->from_user_id,
                'to_user_id' => $subCateg->to_user_id,
                'page' => $subCateg->page,
                'image' => $image,



            ];

            $subCateg->update([
                'new' => 0
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $subCategories
        ]);    }


}
