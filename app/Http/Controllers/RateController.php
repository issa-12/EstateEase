<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RateController extends Controller
{
    public function store(){
        $rate = new Rate;
        $rate->comment = request()->comment;
        $rate->rate = request()->rating;
        $rate->user_id = Auth::user()->id;
        $rate->save();
        return to_route('home');
    }
}
