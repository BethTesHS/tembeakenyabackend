<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        // Get the users
        $superAdmin = User::where(['role_id' => 3])->first();
        $guides = [
            User::findOrFail(2),
            User::findOrFail(3),
            User::findOrFail(4),
        ];
        $hikers = [
            User::findOrFail(5),
            User::findOrFail(6),
            User::findOrFail(7),
            User::findOrFail(8),
            User::findOrFail(9),
            User::findOrFail(10),
        ];

        // Create 3 groups, each with a different guide as the admin
        foreach ($guides as $guide) {
            $group = Group::factory()->create([
                'guide_id' => $guide->id,
            ]);
            $group->members()->attach($guide->id); // Add guide as member
            $group->members()->attach($superAdmin->id); // Add super admin as member

            // Add 3 hikers to each group
            foreach ($hikers as $hiker) {
                $group->members()->attach($hiker->id);
            }
        }

    }
}
