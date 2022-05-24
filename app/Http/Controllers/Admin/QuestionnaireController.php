<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Questionnaire;

class QuestionnaireController extends Controller
{
    public function index(){
        $questionnaires = Questionnaire::get();
        return view('admin.questionnaire.index',compact('questionnaires'));
    }

    public function delete(Request $request){

        $id = $request -> id;
        $questionnaire = Questionnaire::find($id);
        if(!$questionnaire){
            return redirect()->back()->with('error','Questionnaire does not exist');
        }
        $questionnaire->delete();
        return response()->json([
            'status'=>true,
            'msg'=>"Questionnaire Deleted Successfully",
            'id' => $id,
        ]);
    }

    public function show($id){

        $questionnaire = Questionnaire::find($id);
        if(!$questionnaire){
            return redirect()->back()->with('error','Questionnaire does not exist');
        }
        return view('admin.questionnaire.show',compact('questionnaire'));
    }
}
