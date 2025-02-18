<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store($agentId){
        request()->validate([
            'rating'=> 'required',
        ]);
        $review = new Review;
        $review->user_id = Auth::user()->id;
        $review->agent_id = $agentId;
        $review->review = request()->rating;
        $review->save();
        return back();
    }
}
