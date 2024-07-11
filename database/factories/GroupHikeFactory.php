<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\Hike;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GroupHike>
 */
class GroupHikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $names = [
            'Trek to Kenze gorge',
            'Hike to Longonot',
            'Swim in Ilovoto Falls',
            'Scaling Kinangop',
            'Abadare Part 1, Mt. Kilimambogo',
            'Abadare Part 2, Elephant Hill',
            'Abadare Part 3, Ole Satima',
            'Abadare Part 4, Rurimeria Hill',
            'Abadare Part 5, 7 Ponds',
        ];
        return [
            'name' => fake()->randomElement($names),
            'description' => fake()->sentence(),
            'group_id' => fake()->randomDigitNotZero(),
            'hike_id' => fake()->randomDigitNotZero(),
            'guide_id' => fake()->randomDigitNotZero(),
            'hike_date' => fake()->dateTimeBetween('now', '+1 month'),
        ];
    }
}
