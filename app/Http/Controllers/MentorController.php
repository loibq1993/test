<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MentorController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/';

    public function __construct() {
        $this->middleware('role:ROLE_MENTOR');
    }

    public function index()
    {
        $user = Auth::user();
        $students = User::join('mentor_student', 'mentor_student.student_id', '=', 'users.id')
            ->whereHas('roles', function($q){
                $q->where('name', 'ROLE_STUDENT');
            })
            ->where('mentor_student.mentor_id', $user->id)
            ->get();
        return view('mentor.index', compact('students'));
    }

    public function show($id)
    {
        $user = User::find($id);

        return view('mentor.detail', compact('user'));
    }
}
