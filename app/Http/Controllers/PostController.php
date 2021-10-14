<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::orderBy('id', 'DESC')->get();
        
        return view('blog.index', [
            'posts' => $posts,
        ]);
    }

    public function show($id) {
        $post = Post::findOrFail($id);
        
        return view('blog.post', [
            'post' => $post,
        ]);
    }
}
