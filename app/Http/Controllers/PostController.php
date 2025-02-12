<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function showAddPost()
    {
        return view('post.addpost');
    }
    public function store()
    {
        request()->validate([
            'title' => 'required|min:5|max:20',
            'description' => 'required|max:250',
            'address' => 'required',
            'image' => 'required|file|mimes:jpg,jpeg,png',
            'price' => 'required|numeric',
        ]);
        if (request()->hasFile('image')) {
            $image = request()->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('../images/posts/'), $imageName);
            $post = new Post();
            $post->title = request()->title;
            $post->description = request()->description;
            $post->address = request()->address;
            $post->type = request()->type;
            $post->image = $imageName;
            $post->price = request()->price;
            $post->user_id = Auth::user()->id;
            $post->save();
            return to_route('show.profile');
        }

    }

    public function showBuyPosts()
    {
        if (Auth::check()) {
            $myPosts = Post::where('type', 'sell')->where('user_id', Auth::user()->id)->get();
            $posts = Post::where('type', 'sell')->where('user_id', '!=', Auth::user()->id)->get();
            return view('post.buyposts', ['myPosts' => $myPosts, 'posts' => $posts]);
        }
        $posts = Post::where('type', 'sell')->get();
        return view('post.buyposts', ['posts' => $posts]);
    }

    public function showRentPosts()
    {
        if (Auth::check()) {
            $myPosts = Post::where('type', 'rent')->where('user_id', Auth::user()->id)->get();
            $posts = Post::where('type', 'rent')->where('user_id', '!=', Auth::user()->id)->get();
            return view('post.rentpost', ['myPosts' => $myPosts, 'posts' => $posts]);
        }
        $posts = Post::where('type', 'rent')->get();
        return view('post.rentpost', ['posts' => $posts]);
    }

    public function showDetail($postId)
    {
        $post = Post::find($postId);
        return view('post.viewdetail', ['post' => $post]);
    }
    public function showEdit($postId)
    {
        $post = Post::find($postId);
        return view('post.editpost', ['post' => $post]);
    }
    public function edit($postId)
    {
        $post = Post::find($postId);
        request()->validate([
            'title' => 'required|min:5|max:20',
            'description' => 'required|max:250',
            'address' => 'required',
            'image' => 'file|mimes:jpg,jpeg,png',
        ]);
        if (request()->hasFile('image')) {
            $image = request()->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('../images/posts/'), $imageName);
            $post->image = $imageName;
        }
        $post->title = request()->title;
        $post->description = request()->description;
        $post->address = request()->address;
        $post->type = request()->type;
        $post->price = request()->price;
        $post->user_id = Auth::user()->id;
        $post->save();
        return to_route('show.profile');
    }
    public function delete($postId)
    {
        $post = Post::find($postId);
        $post->delete();
        return to_route('show.profile');
    }
}
