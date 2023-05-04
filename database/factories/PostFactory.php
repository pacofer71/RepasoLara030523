<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo'=>ucfirst($this->faker->unique()->words(random_int(2,4), true)),
            'contenido'=>$this->faker->text(),
            'publicado'=>random_int(1,2),
            'category_id'=>Category::all()->random()->id
        ];
    }
}
