<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/';

    public function __construct() {
        $this->middleware('role:ROLE_STUDENT');
    }

    public function index()
    {
        $user = Auth::user();
        $mentors = User::join('mentor_student', 'mentor_student.mentor_id', '=', 'users.id')
            ->whereHas('roles', function($q){
                $q->where('name', 'ROLE_MENTOR');
            })
            ->where('mentor_student.student_id', $user->id)
            ->get();

        return view('student.index', compact('mentors'));
    }

    public function show($id)
    {
        $user = User::find($id);

        return view('student.detail', compact('user'));
    }
}
