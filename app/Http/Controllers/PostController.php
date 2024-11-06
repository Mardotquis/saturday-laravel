<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // public function show(string $postId)
    // $post = Post::find($post);
    /*
    Then, in the Controller, you type hint that it is a post Model object and define the parameter as $post. And then, the DB search is done automatically by Laravel under the hood. You don't need to call find().
    */
    public function show(Post $post)
    {
        \Log::info('$ $post:/:' . json_encode($post, JSON_PRETTY_PRINT));
        // $post finding isn't needed since it'll infer the ID automatically based on the object and send it
        return view('post', compact('post'));
    }
}