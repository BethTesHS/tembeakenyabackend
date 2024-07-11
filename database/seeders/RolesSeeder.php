<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::firstOrNew(['name' => 'hiker']);
        if (!$role->exists) {
            $role->fill([
                'display_name' => __('voyager::seeders.roles.user'),
            ])->save();
        }
        $role = Role::firstOrNew(['name' => 'guide']);
        if (!$role->exists) {
            $role->fill([
                'display_name' => __('voyager::seeders.roles.admin'),
            ])->save();
        }
        $role = Role::firstOrNew(['name' => 'admin']);
        if (!$role->exists) {
            $role->fill([
                'display_name' => __('voyager::seeders.roles.admin'),
            ])->save();
        }
        //create 3 roles: hiker role, guide role and admin role
        // Role::factory()->create([
        //     'roleName' => 'hiker',
        //     'id' => 1,
        // ]);
        // Role::factory()->create([
        //     'roleName' => 'guide',
        //     'id' => 2,
        // ]);
        // Role::factory()->create([
        //     'roleName' => 'admin',
        //     'id' => 3,
        // ]);
    }
}
