<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //call the seeders
        $this->call([
            RolesSeeder::class,
            VoyagerDatabaseSeeder::class,
            UserSeeder::class,
            UsersTableSeeder::class,
            GroupSeeder::class,
            HikeSeeder::class,
            GroupHikeSeeder::class,
            GroupHikeAttendeeSeeder::class,
        ]);
    }
}
