<?php

namespace Database\Factories;

use App\Models\Category;
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
        $titel = $this->faker->text(55);
        return [
            'title' => $titel,
            'content' => fake()->paragraph(10),
            'bio' => fake()->text(255),
            'image' => fake()->image(),
            'slug' => Str::slug($titel),
            'category_id' => Category::factory(),
        ];
    }
}
