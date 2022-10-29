<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i=0; $i < 1; $i++) {
            $User = new User();

            $User->name = $faker->name;
            $User->email = $faker->email;
            $User->member_id =(1);
            $User->password = $faker->password;
            
            $User->save();
        }
    }
}
