<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MentorStudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('mentor_student')->count() == 0) {
            $mentors = User::whereHas(
                'roles', function($q){
                $q->where('name', 'ROLE_MENTOR');
            }
            )->get();
            $data = [];
            foreach ($mentors as $mentor) {
                $students = User::select('id')->whereHas(
                    'roles', function($q){
                    $q->where('name', 'ROLE_STUDENT');
                }
                )->inRandomOrder()->limit(2)->get();
                foreach ($students as $key => $student)
                {
                    $data[$key] = [
                        'mentor_id' => $mentor->id,
                        'student_id' => $student->id
                    ];
                }
                DB::table('mentor_student')->insert($data);
            }
        }
    }
}
