<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Publisher;
use App\Models\Author;
use App\Models\Catalog;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $catalog = Catalog::first();
        $publisher = Publisher::first();
        $author = Author::first();

        for ($i = 0; $i <1; $i++){
            $book = new Book;
            // $book-> publisher_id = $publisher_id;
            
            $book->isbn = $faker->randomNumber(9);
            $book->title = $faker->name;
            $book->year = rand(2010, 2022);

            // $book->publisher_id = rand(1,20);
            // $book->author_id = rand(1,20);
            // $book->catalog_id = rand(1,4);   
            // $publisher_id = optional($publisher)->id;
            // $author_id = optional($author)->id;
            // $catalog_id = optional($catalog)->id;
            $book->publisher_id = $publisher;
            $book->author_id = $author;
            $book->catalog_id = $catalog;

            $book->qty = rand(10,20);
            $book->price = rand(10000, 20000);

            $book->save();
        }
    }
}
