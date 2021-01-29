<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Post;
use App\Tag;


class PostController extends Controller
{

    public function index() {

        $all_post = Post::all();
        $all_tag = Tag::all();

        $data = [
            'posts' => $all_post,
            'tags' => $all_tag,
        ];

        return view('guest.posts.index', $data);
    }

    public function show($slug) {
        $post = Post::where('slug', $slug)->first();
        if(!$post) {
            abort(404);
        }
        $data = ['post' => $post];
        return view('guest.posts.show', $data);
    }

}
