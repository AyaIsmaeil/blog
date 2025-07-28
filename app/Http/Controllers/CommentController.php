<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{
    function create(Post $post){
        return view('comments.create',compact('post'));
    }
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        Comment::create([
            'post_id' => $post->id,
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);

        return redirect()->route('posts.show', $post)->with('success', 'Comment created successfully.');
    }
    
    public function edit(string $id){
        

    }
        
    public function update(Request $request, string $id){

        
    }
    public function destroy(string $id)
    {
        
    }
}
