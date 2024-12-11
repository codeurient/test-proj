<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,  
            'poster' => $this->faker->imageUrl(),  
            'published' => $this->faker->boolean, 
        ];
    }
}
