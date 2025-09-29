<?php

namespace Database\Factories;
use App\Models\User;
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
            'title' => fake() -> words(rand(2, 5), true),
            'content' => fake() -> text(),
            'is_public' => fake() -> boolean(),
            'author_id' => User::inRandomOrder() -> first() -> id
        ];
    }
}
