<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hike>
 */
class HikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word,
            'map_data' => json_encode(['map' => 'data']),
            'distance' => fake()->randomFloat(2, 1, 10),
            'estimated_duration' => fake()->time(),
            'group_id' => fake()->randomElement([1,2,3]),
            'user_id' => fake()->randomDigitNotZero(),
        ];
    }
}
