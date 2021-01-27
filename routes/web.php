<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// rotte pubbliche che fanno riferimento al controller homecontroller
Route::get('/', 'HomeController@index')->name('home');
Route::get('/contatti', 'HomeController@contatti')->name('contatti');
Route::get('/posts', 'PostController@index')->name('posts.index');

//rotte che servono ai file di autenticazone
Auth::routes();

//rotte lato admin che fanno riferimento al parte riservata da loggati
Route::middleware('auth')->namespace('Admin')->prefix('admin')->name('admin.')->group(function() {

    Route::get('/', 'HomeController@index')->name('index');

    Route::resource('/posts', 'PostController');

    Route::resource('/categories', 'CategoryController');
});
