<?php

namespace App\Http\Controllers;

use App\Oex_students;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentOperation extends Controller
{
    public function dashboard()
    {
        if(!Session::get('id'))
        {
            return redirect()->route('student-singup');
        }
        return view('student.dashboard');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('id');
        return redirect()->route('student-singup');
    }

    public function student_exam()
    {
        $students = Oex_students::where('id',Session::get('id'))->get()->first();
        return view('student.exam')->with('students',$students);
    }
}
