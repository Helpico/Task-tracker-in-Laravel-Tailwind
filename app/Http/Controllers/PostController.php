<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\News;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application posts.
     *
     */

    public function index()
    {
       
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);         
        
        return view('posts.index', [
            'posts' => $posts
        ]);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        $request->user()->posts()->create([
            'body' => $request->body
        ]);

        return back();
    }
}