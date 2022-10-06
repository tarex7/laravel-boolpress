<?php

use Illuminate\Database\Seeder;

use Faker\Generator as Faker;
use App\Models\Post;
use App\Models\Category;
use App\User;



class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run (Faker $faker)
    {
        $categories_ids = Category::pluck('id')->toArray();
        $users_ids = User::pluck('id')->toArray();

        for($i = 0; $i < 10; $i++) {

            $new_post = new Post();

            $new_post->title = $faker->text(50);
            $new_post->category_id = Arr::random($categories_ids);
            $new_post->user_id = Arr::random($users_ids);
            $new_post->text = $faker->paragraphs(8,true);
            $new_post->image = $faker->imageUrl(300, 200, 'animals', true);
     
            $new_post->save();
        }
    }
}
