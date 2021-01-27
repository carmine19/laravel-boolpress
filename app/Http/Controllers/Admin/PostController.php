<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_post = Post::all();
        $data = [
            'posts' => $all_post,
        ];
        return view('admin.posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.

     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_category = Category::all();

        $data = [

            'categories' => $all_category,
        ];

        return view('admin.posts.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $new_post = new Post();
        // $new_dress->name = $data['name'];
        // $new_dress->description = $data['description'];
        // $new_dress->price = $data['price'];
        // $new_dress->season = $data['season'];
        // $new_dress->size = $data['size'];
        // $new_dress->color = $data['color'];
        $new_post->fill($data);
        $new_post->save();

        return redirect()->route('admin.posts.show',['post' => $new_post->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $all_post = Post::find($id);
        $data = [
            'posts' => $all_post,
        ];
        return view('admin.posts.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $all_post = Post::find($id);
        $data = [
            'posts' => $all_post,
        ];
        return view('admin.posts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();
        $post->update($data);
        return redirect()->route('admin.posts.show', ['post' => $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_post = Post::find($id);
        $delete_post->delete();

        return redirect()->route('admin.posts.index');
    }
}
