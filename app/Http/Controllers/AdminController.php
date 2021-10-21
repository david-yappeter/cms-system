<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function index() {
        return view("admin.index");
    }

    public function create() {
        return view("admin.posts-create");
    }
    
    public function list() {
        // $posts = auth()->user()->posts;
        $posts = Post::paginate(10);
        return view("admin.posts-list", ['posts' => $posts]);
    }

    public function store(Request $request) {
        $inputs = $request->validate([
            'title'=> 'required|min:8|max:255',
            'post_image'=> 'mimes:png,jpg,jpeg',
            'body'=> 'required',
        ]);

        if($request->post_image) {
            $inputs['post_image'] = $request->post_image->store('images');
        }

        auth()->user()->posts()->create($inputs);

        $request->session()->flash('message-create', 'Post was created');
        return redirect()->route('admin.post.list');
    }

    public function delete(Request $request, Post $post) {
        $p = parse_url($post->post_image);
        if($p["host"] === "localhost") {
            unlink(substr($p["path"], 1));
        }
        $post->delete();
        $request->session()->flash('message-delete', 'Post was deleted');
        return back();
    }

    public function edit($id) {
        $post = Post::findOrFail($id);
        return view("admin.posts-update", ['post' => $post]);
    }

    public function patch(Post $post) {
        $inputs = request()->validate([
            'title' => 'required|min:8|max:255',
            'post_image' =>'mimes:png,jpg,jpeg',
            'body' =>'required',
        ]);


        if(request()->post_image) {
            $post['post_image'] = request()->post_image->store('images');
        }
        $post->title = $inputs["title"];
        $post->body = $inputs["body"];

        auth()->user()->posts()->save($post);

        request()->session()->flash('message-update', 'Successfully Update Post');
        return back();
    }
}
