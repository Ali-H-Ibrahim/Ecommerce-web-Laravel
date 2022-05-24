<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
class ChatsController extends Controller
{

    public function index()
    {
        return view('front.chat.chat');
    }

    public function getMessages()
    {
        return Message::with('user')->get();
    }

    public function sendMessage(Request $request)
    {

        /**************************** new **********************************************/

       // $id_user=User::where('admin',1)->whereNotIn('id',[Auth::id()])->first()->id;

        $message =Message::create([

            'message'=>$request->message,
            'from_user_id'=>Auth::id(),
            'to_user_id'=>null,
            'new'=>1,
            'page'=>0
        ]);

        return response()->json([
            'status'=>true,

        ]);

    }



    public function check(Request $request)
    {

        $messageNew=getMessageNew();


        //  $category=UserSystemNotification::get();

        if($messageNew){



            $subCategories=[];
            foreach ($messageNew as $subCateg){

                $subCategories[]=[

                    'masg' => $subCateg->message,
                    'id'=>$subCateg->id

                ];
            }

            return response()->json([
                'status'=>true,
                'data'=>$subCategories,
                'count'=>$messageNew->count()
            ]);
        }else
            return response()->json([
                'status'=>false,
                'msg'=>"error",
            ]);


    }



}
