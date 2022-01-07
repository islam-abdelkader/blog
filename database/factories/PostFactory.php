<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => Category::factory(),
            'user_id' => User::factory(),
            'title' => $this->faker->sentence(6),
            'slug' => $this->faker->slug(),
            'excerpt' => '<p>' . implode('</p><p>', $this->faker->paragraphs(3)) . '</p>',
            'body' => '<p>' . implode('</p><p>', $this->faker->paragraphs(8)) . '</p>',
            'bublished_at' => now(),
        ];
    }
}
