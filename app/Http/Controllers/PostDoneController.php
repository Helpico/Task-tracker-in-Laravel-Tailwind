<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PostDoneController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }  

    public function store(Post $post, Request $request) 
    {
        // Еxtra protection since we hide 'Done' link in the view
        if ($post->doneBy($request->user())){
            // empty response with a conflict http code
            return response(null, 409); 
        }
        
        $post->dones()->create([
            'user_id' => $request->user()->id // User who clicked
        ]);
        
        return back();

    }

    public function destroy(Post $post, Request $request)
    {
        $request->user()->dones()->where('post_id', $post->id)->delete();

        return back();
    }
}












