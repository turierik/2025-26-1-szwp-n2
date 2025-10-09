<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
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

    public function create(){
        return view('posts.create', [
            'users' => User::all(),
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request){
        $validated = $request -> validate([
            'title' => 'required|string',
            'content' => 'required|string|min:10',
            'author_id' => 'required|integer|exists:users,id',
            'categories' => 'array',
            'categories.*' => 'integer|exists:categories,id|distinct'
        ], [
            'content.min' => 'A tartalom legalább 10 karakter legyen!'
        ]);
        $validated['is_public'] = $request -> has('is_public');
        $post = Post::create($validated);
        $post -> categories() -> sync($validated['categories'] ?? []);
        return redirect() -> route('posts.index');
    }
}
