<?php

use Illuminate\Database\Seeder;
use Faker\Generator as faker;
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
        for ($i = 0; $i < 50; $i++ ) {

            $new_posts = new Post();
            $new_posts->title = $faker->title;
            $new_posts->subtitle = $faker->words(3, true);
            $new_posts->description = $faker->paragraph();
            $new_posts->img = $faker->imageUrl(640, 480, 'animals', true);
            $new_posts->save();
        }
    }
}
