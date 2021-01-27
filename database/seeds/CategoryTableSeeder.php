<?php

use Illuminate\Database\Seeder;
use App\Category;
use Faker\Generator as Faker;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {

            $new_category = new Category();
            $new_category->name = $faker->words(1, true);
            $slug = Str::slug($new_category->name);
            $slug_base = $slug;
            // verifico che lo slug non esista nel database
            $slug_presente = Category::where('slug', $slug)->first();
            $contatore = 1;
            // entro nel ciclo while se ho trovato un post con lo stesso $slug
            while($slug_presente) {
                // genero un nuovo slug aggiungendo il contatore alla fine
                $slug = $slug_base . '-' . $contatore;
                $contatore++;
                $post_presente = Post::where('slug', $slug)->first();
            }
            // quando esco dal while sono sicuro che lo slug non esiste nel db
            // assegno lo slug al post
            $new_category->slug = $slug;
            $new_category->save();
        }
    }
}
