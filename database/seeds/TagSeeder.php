<?php

use Illuminate\Database\Seeder;
use App\Models\Tag;
use Faker\Generator as Faker;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $labels = ['FrontEnd', 'BackEnd', 'UI/UX', 'FullStack', 'DevOps'];

        foreach ($labels as  $label) {
            
            $new_tag = new Tag();

            $new_tag->label = $label;
            $new_tag->color = $faker->hexColor();

            $new_tag->save();
    }
}

}