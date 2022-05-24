<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function addReview(Request $request)
    {
        $review = Review::create([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
            'rate' => $request->rate,
            'comment' => $request->review,
        ]);

        if ($review)
            return \Response::json(['success' => 'Review submitted successfully 😊']);
        else
            return \Response::json(['error' => 'Something goes wrong..! 😥']);
    }
}
