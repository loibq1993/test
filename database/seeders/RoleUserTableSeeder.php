<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('role_user')->count() == 0) {
            $users = User::all();
            $userRole = [];
            foreach ($users as $key => $user) {
                $userRole[$key] = [
                    'role_id' => rand(1,3),
                    'user_id' => $user->id
                ];
            }
            DB::table('role_user')->insert($userRole);
        }
    }
}
