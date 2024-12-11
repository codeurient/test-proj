<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Genre::factory(10)->create();
        Movie::factory(10)->create();

        // MovieGenreSeeder çağırılır
        $this->call(MovieGenreSeeder::class);
    }
}
