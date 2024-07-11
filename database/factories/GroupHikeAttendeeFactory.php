<?php

namespace Database\Factories;

use App\Models\GroupHike;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GroupHikeAttendee>
 */
class GroupHikeAttendeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'group_hike_id' => fake()->randomDigitNotZero(),
            'user_id' => fake()->randomDigitNotZero(),
            'name' => fake()->name(),
            'phone_number' => fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'emergency_contact' => fake()->name() . ', ' . fake()->phoneNumber(),
        ];
    }
}
