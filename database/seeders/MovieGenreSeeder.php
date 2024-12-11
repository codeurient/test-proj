<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Database\Seeder;

class MovieGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Movie::all()->each(function ($movie) {
           
            $genres = Genre::inRandomOrder()->take(rand(1, 3))->pluck('id')->toArray();
            
           
            $movie->genres()->attach($genres, [
                'created_at' => now(),
                'updated_at' => now()
            ]);
        });
    }
}
