<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Exception;

class AdminController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/';

    public function __construct() {
        $this->middleware('role:ROLE_ADMIN');
    }

    public function index()
    {
        $students = User::whereHas('roles', function($q){
                $q->where('name', 'ROLE_STUDENT');
            })
            ->get();

        $mentors = User::whereHas('roles', function($q){
                $q->where('name', 'ROLE_MENTOR');
            })
            ->get();

        return view('admin.index', compact('students', 'mentors'));
    }

    public function create()
    {
        $currentURL = URL::current();

        if (Str::contains($currentURL, 'mentor')) {
            $type = 'mentor';
        } else {
            $type = 'student';
        }

        return view('admin.create', compact('type'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:users|max:255',
            'fullname' => 'required|max:255',
            'type' => 'required'
        ]);
        DB::beginTransaction();
        try {
            $user = new User();
            $user->password =  Hash::make(str_random(8));
            $user->email = $request->email;
            $user->name = $request->fullname;
            $user->save();

            $roleUser = new RoleUser();
            $roleUser->role_id = $request->type == 'mentor' ? 2 : 3;
            $roleUser->user_id = $user->id;
            $roleUser->save();

            DB::commit();

        } catch (Exception $exception) {
            DB::rollback();
            return back()->withError($exception->getMessage())->withInput();
        }

        return redirect()->route('admin.index')->with('success', 'Data has been created successfully');

    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $user = User::find($id);
            $user->delete();
            DB::commit();
        } catch (Exception $exception) {
            DB::rollback();
            return back()->withError($exception->getMessage())->withInput();
        }

        return redirect()->route('admin.index')->with('success', 'Data has been deleted successfully');
    }

    public function studentsOfMentor($id)
    {
        $students = User::join('mentor_student', 'mentor_student.student_id', '=', 'users.id')
            ->whereHas('roles', function($q){
                $q->where('name', 'ROLE_STUDENT');
            })
            ->where('mentor_student.mentor_id', $id)
            ->get();

        return view('mentor.index', compact('students'));
    }

    public function mentorOfStudent($id)
    {
        $user = Auth::user();
        $mentors = User::join('mentor_student', 'mentor_student.mentor_id', '=', 'users.id')
            ->whereHas('roles', function($q){
                $q->where('name', 'ROLE_MENTOR');
            })
            ->where('mentor_student.student_id', $id)
            ->get();

        return view('student.index', compact('mentors'));
    }
}
