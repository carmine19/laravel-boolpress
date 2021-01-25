<?php

use Illuminate\Database\Seeder;
use Faker\Generator as faker;
//use Carbon\Carbon;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        //con questo ciclo prendiamo i dati fake da un fakegenerator
        for ($i = 0; $i < 50; $i++) {

            $new_posts = new Post();
            $new_posts->title = $faker->title;
            $new_posts->subtitle = $faker->words(3, true);
            $new_posts->description = $faker->paragraph();
            $new_posts->img = $faker->imageUrl(640, 480, 'animals', true);
            $new_posts->save();
        }
    }
}
        //questa versione di seeder per i dati è quello locale, quando abbiamo i dati nella nostra app,
        //in questo caso abbiamo i dati in config

        /*
         * $new_posts= config('posts');

        foreach ($new_posts as $post) {
            $new_posts_ele = new Author();
            $new_posts_ele->name = $author['name'];
            $new_posts_ele->lastname = $author['lastname'];
            //carbon è una libreria per le date che estende la classe datetime base di php
            $data_nascita = $new_posts_ele['date_of_birth'];
            $new_posts_ele->date_of_birth = Carbon::createFromFormat('d/m/Y', $data_nascita);
            $new_posts_ele->save();
        */
