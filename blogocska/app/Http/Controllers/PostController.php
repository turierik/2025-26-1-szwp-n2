<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        // $kiskutya = Post::all();   N+1 PROBLÉMA!!!
        $kiskutya = Post::with('author') -> get();
        return view('posts.index', ['posts' => $kiskutya]);
    }

    public function show(Post $post){
        return view('posts.show', ['post' => $post]);
    }
}
