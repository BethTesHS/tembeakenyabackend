<?php

namespace Database\Seeders;

use App\Models\Hike;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        // Create 4 hikes
        $hikes = Hike::factory()->count(4)->create();

        // Get all hikers
        $hikers = [
            User::findOrFail(5),
            User::findOrFail(6),
            User::findOrFail(7),
            User::findOrFail(8),
            User::findOrFail(9),
            User::findOrFail(10),
        ];

        // Add reviews from all hikers to the first 2 hikes
        foreach ($hikes->take(2) as $hike) {
            foreach ($hikers as $hiker) {
                Review::factory()->create([
                    'user_id' => $hiker->id,
                    'hike_id' => $hike->id,
                ]);
            }
        }
    }
}
