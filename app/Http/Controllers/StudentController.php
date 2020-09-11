<?php

namespace App\Http\Controllers;

use App\Oex_students;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function student_singup()
    {
        return view('student.singup');
    }

    public function student_login_sub(Request $request)
    {
        $data = Oex_students::where('email',$request->email)->where('password',$request->password)->get()->first();

        // return $data->id;
        
        if($data)
        {
            $request->session()->put('id',$data->id);
            $arr = array('status'=>'true','message'=>'success','reload'=>route('student-dashboard'));
        }
        else
        { 
            $arr = array('status'=>'false','message'=>'Email and Password wrong');
        }
        return json_encode($arr);
    }
}
