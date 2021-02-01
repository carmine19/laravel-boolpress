<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//qui è dove defianiamo le nostre rotte che ci arrivano da backend per poi poterle usare nel frontend con javascript,
//quindi potremmo usare un qualsiasi framework come vuejs,react angular con ad esempio axios
Route::get('/posts','Api\PostController@index');
//versione api in post
Route::post('/posts','Api\PostController@index');

Route::get('/category','Api\CategoryController@index');

Route::get('/tags','Api\TagController@index');


