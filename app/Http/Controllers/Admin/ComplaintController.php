<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Complaint;

class ComplaintController extends Controller
{
    public function index(){
        $complaints = Complaint::get();
        return view('admin.complaint.index',compact('complaints'));
    }

    public function delete(Request $request){

        $id = $request -> id;
        $complaint = Complaint::find($id);
        if(!$complaint){
            return redirect()->back()->with('error','Complaint does not exist');
        }
        $complaint -> delete();
        return response() -> json([
            'status' => true,
            'msg' => "Complaint Deleted Successfully",
            'id' => $id,
        ]);
    }

    public function show($id){

        $complaint = Complaint::find($id);
        if(!$complaint){
            return redirect()->back()->with('error','Complaint does not exist');
        }
        return view('admin.complaint.show',compact('complaint'));
    }
}
