<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Rate;
use App\Models\Request as ModelsRequest;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showDashboard(){
        $userCount = User::count();
        $postCount = Post::count();
        $rateCount = Rate::count();
        return view("admin.dashboard",['userCount'=> $userCount,'postCount'=> $postCount,'rateCount'=> $rateCount ]);
    }
    public function showUsers(){
        $users = User::where('type','=','user')
                        ->get();
        return view("admin.users",["users"=> $users]);
    }
    public function showAgents(){
        $agents = User::where('type','=','agent')
                        ->get();
        return view("admin.agents",["agents"=> $agents]);
    }
    public function showProperties(){
        $properties = Post::all();
        return view("admin.properties",['properties'=> $properties]);
    }
    public function showRequestAgents(){
        $requests = ModelsRequest::where('result','=','under review')->get();
        return view('admin.request-agents',['requests'=> $requests]);
    }

    public function showRates(){
        $rates = Rate::all();
        return view('admin.rates',['rates'=> $rates]);
    }

    public function showReviews(){
        $reviews = Review::all();
        return view('admin.reviews',['reviews'=> $reviews]);
    }

    public function manageRequestAdmin($id){
        if(request()->has('approve')){
            $request = ModelsRequest::find($id);
            $user = User::find($request->user_id);
            $request->result='approved';
            $user->type='agent';
            $user->save();
            $request->save();
        }
        if(request()->has('denied')){
            $request = ModelsRequest::find($id);
            $request->result='denied';
            $request->save();
        }
        return to_route('show.request_agents.admin');
    }

    public function deleteUser($id){
        $user = User::find($id);
        $user->delete();
        return to_route('show.users.admin');
    }
    public function deleteProperty($id){
        $post = Post::find($id);
        $post->delete();
        return to_route('show.properties.admin');
    }
    public function deleteRate($id){
        $rate = Rate::find($id);
        $rate->delete();
        return to_route('show.rates.admin');
    }
    public function deleteReview($id){
        $review = Review::find($id);
        $review->delete();
        return to_route('show.reviews.admin');
    }
}
