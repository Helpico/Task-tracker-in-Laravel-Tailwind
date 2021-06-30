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
       
        // Eager loading
        $posts = Post::latest()->with(['user', 'dones'])->paginate(5);         
        
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

    public function destroy(Post $post)
    {
        // see: PostPolicy & @can in index.blade.php & Auth provider
        $this->authorize('delete', $post);

        $post->delete();

        return back();
    }

    public function edit(Post $post)
    {
        return view('posts.edit', ['post'=>$post]);
    }

    public function update(Request $request, Post $post)
        {
            
            $this->validate($request, [	
                'body' => 'required'
            ]);
            
            $data = $request->all();
            
            $post->fill($data);
            
            $post->save();
            
            // Redirect to the List of Tasks
            return redirect()->route('posts');

        }

    }