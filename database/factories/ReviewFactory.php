<?php

namespace Database\Factories;

use App\Models\Hike;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->randomDigitNotZero(),
            'hike_id' => fake()->randomDigitNotZero(),
            'review' => fake()->sentence(),
            'rating' => fake()->numberBetween(1, 5),
        ];
    }
}
