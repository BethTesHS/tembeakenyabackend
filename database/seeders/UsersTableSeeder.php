<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use TCG\Voyager\Models\Role;
use TCG\Voyager\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $users = DB::table('users')->get();
        $roles = DB::table('roles')->get();

        foreach ($users as $user) {
            $role = $roles->where('role_id', $user->role_id)->first();
            if ($role) {
                DB::table('user_roles')->insert([
                    'user_id' => $user->id,
                    'role_id' => $role->role_id,
                ]);
            }
        }
    }
}
