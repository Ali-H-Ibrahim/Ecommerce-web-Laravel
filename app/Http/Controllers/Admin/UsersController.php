<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function ShowNormalUser(){

        $users=User::where('Admin',null)->select('id','name','email')->get();

        //return response()->json($users);
        return view('admin.user.showNormalUser',compact('users'));

       // return response()->json($users);


    }

    public function ShowAdmin(){

        $users=User::where('Admin',1)->select('id','name','email')->get();

        //return response()->json($users);
        return view('admin.user.showAdmin',compact('users'));

       // return response()->json($users);


    }

    public function addAdmain(Request $request){
        $id=$request->id;
        $user=User::find($id);
        if(!$user){
            return redirect()->back()->with('error','User does not exist');
        }

        $user->update([
           'Admin'=>1
        ]);


        //return redirect()->back()->with('delete','Category and all related sub-categories,products deleted successfully');
        return response()->json([
            'status'=>true,
            'msg'=>"Add successfully",
            'id'=>$id,
        ]);
    }

}
