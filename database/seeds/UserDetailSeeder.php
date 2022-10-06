<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\UserDetail;

class UserDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        
        $new_user_detail = new UserDetail();

        $new_user_detail->first_name = $faker->firstName();
        $new_user_detail->last_name = $faker->lastName();
        $new_user_detail->email = $faker->email();
        $new_user_detail->phone = $faker->phoneNumber();
        $new_user_detail->year = $faker->year();

         $new_user_detail->save();
    }
}
