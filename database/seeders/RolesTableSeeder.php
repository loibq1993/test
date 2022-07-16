<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [
            [
                'name' => "ROLE_ADMIN",
                'description' => 'admin'
            ],
            [
                'name' => "ROLE_MENTOR",
                'description' => 'mentor'
            ],
            [
                'name' => "ROLE_STUDENT",
                'description' => 'student'
            ],
        ];
        if(DB::table('roles')->count() == 0) {
            DB::table('roles')->insert($role);
        }
    }
}
