<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $user = new User();

        $user->name = 'tarex7';
        $user->email = 'tarex7@gmail.com';
        $user->password = bcrypt('password');

        $user->save();

        for($i = 0; $i < 8; $i++) {
            $user = new User();

            $user->name = $faker->userName();
            $user->email = $faker->email();
            $user->password = bcrypt($faker->password());
    
            $user->save();
        }
    }
}
