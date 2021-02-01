<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

//qui è dove defianiamo le nostre rotte api che poi verrano usate da un framework frontend
class PostController extends Controller
{
    public function index() {

        $all_post = Post::all();

        //questo return ci permette di convertire i dati del backend in frontend, ricordandoci che laravel mette
        // di default lo slug api per le richieste frontend, in questo caso la rotta creata in web è:
        // Route::get('/posts','Api\PostController@index') il nostro link per navigarle è :
        // http://127.0.0.1:8000/api/posts
        return response()->json([
            'success' => true,
            'response' => $all_post,
        ]);
    }

}
