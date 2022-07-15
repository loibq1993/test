<?php

namespace App\Http\Controllers;

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
        return view('student.home');
    }
}
