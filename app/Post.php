<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'subtitle', 'content', 'slug', 'img'];

    //con questa funzione colleghiamo e mappiamo il model Category con quello Post,
    //in questo caso abbiamo una relazione 1(tabella category) a molti(tabella post),
    // "belongsTo" si usa per mappare la tabella "1"
    public function category() {
        return $this->belongsTo('App\Category');
    }
}
