<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function homeSearch()
    {
        $name = request()->search_name;
        if(empty($name)){
            return back();
        }
        if (Auth::check()) {
            $myPosts = Post::where("address", "like", "%$name%")
                ->where("user_id",'=', Auth::user()->id)
                ->get();
            $posts = Post::where("address", "like", "%$name%")
                ->where('user_id','!=', Auth::user()->id)
                ->get();
            return view("home", ['posts'=>$posts,'myPosts' => $myPosts]);
        }
        $posts = Post::where("address", "like", "%$name%")
                ->get();
        return view("home", ['posts'=>$posts]);
    }
    public function buySearch()
    {
        $name = request()->search_name;
        if(empty($name)){
            return back();
        }
        if (Auth::check()) {
            $myPosts = Post::where("address", "like", "%$name%")
                ->where('type','=','sell')
                ->where("user_id", Auth::user()->id)
                ->get();
            $posts = Post::where("address", "like", "%$name%")
                ->where('type','=','sell')
                ->where('user_id','!=', Auth::user()->id)
                ->get();
            return view('post.buyposts', ['posts'=>$posts,'myPosts' => $myPosts]);
        }
        $posts = Post::where("address", "like", "%$name%")
                ->where('type','=','sell')
                ->get();
            return view('post.buyposts', ['posts'=>$posts]);
    }
    public function rentSearch()
    {
        $name = request()->search_name;
        if(empty($name)){
            return back();
        }
        if (Auth::check()) {
            $myPosts = Post::where("address", "like", "%$name%")
                ->where("user_id",'=', Auth::user()->id)
                ->where('type','=','rent')
                ->get();
            $posts = Post::where("address", "like", "%$name%")
                ->where('user_id','!=', Auth::user()->id)
                ->where('type','=','rent')
                ->get();
            return view('post.rentpost', ['posts'=>$posts,'myPosts' => $myPosts]);
        }
        $posts = Post::where("address", "like", "%$name%")
                ->where('type','=','rent')
                ->get();
            return view('post.rentpost', ['posts'=>$posts]);
    }
}
