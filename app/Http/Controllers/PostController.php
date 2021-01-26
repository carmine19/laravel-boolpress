<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{

    public function index() {

        $all_post = Post::all();

        $data = [
            'posts' => $all_post,
        ];

        return view('guest.posts.index', $data);
    }


}
