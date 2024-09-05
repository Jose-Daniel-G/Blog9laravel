<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    public function definition(): array
    {
        return [
            'url' => 'posts/'.$this->faker->image('public/storage/posts', 640, 480, null, false)//posts/imagen.jpg
        ];
    }
}
