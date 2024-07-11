<?php

namespace Database\Seeders;

use App\Models\GroupHike;
use App\Models\GroupHikeAttendee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupHikeAttendeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        // Get all group hikes
        $groupHikes = GroupHike::all();

        // Register attendees for each group hike
        foreach ($groupHikes as $groupHike) {
            foreach ($groupHike->group->members as $member) {
                GroupHikeAttendee::factory()->create([
                    'group_hike_id' => $groupHike->id,
                    'user_id' => $member->id,
                    'name' => $member->firstName . ' ' . $member->lastName,
                    'phone_number' => $member->phone_number ?? fake()->phoneNumber(),
                    'email' => $member->email,
                    'emergency_contact' => 'Emergency Contact for ' . $member->firstName,
                ]);
            }
        }
    }
}
