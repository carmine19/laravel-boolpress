<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'categories';
    protected $fillable = ['name', 'slug'];

    public function post()
    {

        //con questa funzione colleghiamo e mappiamo il model Category con quello Post,
        //in questo caso abbiamo una relazione 1(tabella category) a molti(tabella post),
        // "hasMany" si usa per mappare la tabella "molti"
        return $this->hasMany('App\Post');
    }
}
