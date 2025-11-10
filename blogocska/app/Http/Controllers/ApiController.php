<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use App\Http\Resources\PostResource;

class ApiController extends Controller
{
    public function login(Request $request){
        $validated = $request -> validate([
            "email" => "required|string|email",
            "password" => "required|string|min:8"
        ]);

        if (Auth::attempt($validated)){
            $user = User::where('email', $validated['email']) -> first();
            $token = $user -> createToken('loginToken');
            return response() -> json(["token" => $token -> plainTextToken], 201);
        } else {
            return response() -> json(["message" => "Login failed."], 401);
        }
    }

    public function index(){
        $posts = Post::all();
        return PostResource::collection($posts);
    }

    public function show(string $post){
        // if (filter_var($post, FILTER_VALIDATE_INT) === false){
        //     return response() -> json(["message" => 'post must be an integer!'], 422);
        // }

        validator(
            ['post' => $post],
            ['post' => 'required|integer']
        ) -> validate();

        // $post = Post::find($post);
        // if ($post)
        //     return new PostResource($post);
        // else
        //     return response() -> json(["message" => 'Post not found!'], 404);

        $post = Post::findOrFail($post);
        return new PostResource($post);
    }
}
