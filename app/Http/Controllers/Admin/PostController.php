<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;


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
        $all_tag = Tag::all();

        $data = [

            'categories' => $all_category,
            'tags' => $all_tag,
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
        //validazione dati, si passano i dati alla funzione $request che li riceve da create,
        //da li, prima di salvarli, si convalidano i campi con il metodo chiave => valore.
        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'subtitle' => 'required|max:255|nullable',
            'slug' => 'nullable|max:255',
            'content'=> 'required',
            'img' => 'nullable',
            'category_id' => 'nullable|exists:categories,id',
        ]);

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
        //il sync ci permette di salvare i dati multipli che ci arrivano dalla checbox
        if(array_key_exists('tags', $form_data)) {
            // aggiungo i tag al post
            $new_post->tags()->sync($form_data['tags']);
        }

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
         $all_tag = Tag::find($id);
        $data = [
            'posts' => $all_post,
            'tags' => $all_tag,
        ];
        return view('admin.posts.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        $data = [
            'post' => $post,
            'categories' => Category::all(),
            'tags' => Tag::all(),
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
        //il sync ci permette di salvare i dati multipli che ci arrivano dalla checbox
        $post->tags()->sync($data['tags']);
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
        // per cancellare i dati delle tabelle molti a molti, usiamo sempre sync invece di specificare l attach
        // e detach ogni volta
        $delete_post->tags()->sync([]);
        $delete_post->delete();

        return redirect()->route('admin.posts.index');
    }
}
