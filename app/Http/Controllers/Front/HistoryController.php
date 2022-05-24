<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HistoryController extends Controller
{
    public function index()
    {
        $history = History::get();
        $user = Auth::user();
        $history = $history -> where('user_id',$user->id);
        return view('front.user.search_history', compact('user','history'));
    }

    public function store(Request $request)
    {
        if (Auth::check()) {
            History::create([
                'user_id' => Auth::id(),
                'value' => $request -> search_value,
            ]);
        }
        return response()->json('log-in to store search history');
    }

    public function deleteRecord(Request $request)
    {
        $user = Auth::user();
        $id = $request -> id;
        $history = History::find($id);
        if(!$history){
            return redirect() -> route('view.history') -> with('error','Could not fing search record');
        }
        $history->delete();
        return response()->json([
            'status'=>true,
            'id'=>$id,
        ]);
    }

    public function deleteAllRecord(Request $request)
    {
        $user = User::find($request -> id);
        $history = History::where('user_id',$user->id) -> get();
        foreach($history as $h){
            $h-> delete();
        }
        return response()->json([
            'status'=>true,
        ]);
    }

}
