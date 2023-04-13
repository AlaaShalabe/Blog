<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $titel = $this->faker->sentence();
        return [
            'titel' => $titel,
            'content' => fake()->text(1000),
            'bio' => fake()->realText(50),
            'image' => fake()->imageUrl(),
            'slug' => Str::slug($titel),
            'category_id' => $this->faker->randomElement(Category::pluck('id')),
            'user_id' => rand(1, 3),
        ];
    }
}
