<?php

namespace Database\Factories;

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
    public function definition()
    {
        return [
            'title' => fake()->sentence(3),
            'content' => fake()->paragraphs(10, true),
            'lead' => fake()->text(200),
            'author_id' => random_int(1, 20),
            'topic_id' => random_int(1, 3)
        ];
    }
}
