<?php

use Illuminate\Database\Seeder;

class AuthorBookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authors = App\Author::all();

        // Populate the pivot table
        App\Book::all()->each(function ($book) use ($authors) {
            $book->authors()->attach(
                $authors->random(1)->pluck('id')->toArray()
            );
        });
    }
}
