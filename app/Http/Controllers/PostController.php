<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{

    function index(){
        $posts=Post::all();
        return view('posts.index',compact('posts'));
    }

    function create(){
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create',compact('categories','tags'));
    }
    function show(Post $post){
        $comments = $post->comments()->get();
        return view('posts.show',compact('post','comments'));
    }
    function store(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'required|exists:tags,id',
        ]);
        $posts=Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'user_id' => auth()->user()->id
        ]);

        $posts->tags()->attach($request->tags);
        return redirect()->route('posts.index');

    }



    

}
