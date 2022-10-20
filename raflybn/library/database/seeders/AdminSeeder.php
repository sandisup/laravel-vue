<?php

namespace Database\Seeders;

use App\Models\Admin;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i=0; $i < 20; $i++) {
            $admin = new Admin;

            $admin->name = $faker->name;
            $admin->gender = $faker->title($gender = 'male'|'female');    
            $admin->phone_number = $faker->randomNumber(8);
            $admin->email = $faker->email;
            $admin->address = $faker->address;
            
            $admin->save(); 
        } 
    }
}
