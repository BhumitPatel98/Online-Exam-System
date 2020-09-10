<?php

namespace App\Http\Controllers;

use App\Oex_exam_master;
use App\Oex_students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Validator;

class PortalOperation extends Controller
{
    public function dashboard()
    {
        
       if(!Session::get('portal_session'))
       {
           return redirect()->route('portal-login');
       }

       $exams  = Oex_exam_master::orderBy('created_at','desc')->where('status',1)->get(); 

       return view('portal.dashboard')->with('exams',$exams);
    }

    public function exam_form($id)
    {
        $exams = Oex_exam_master::where('id',$id)->get();

        return view('portal.exam_form')->with('exams',$exams);
    }

    public function exam_form_submit(Request $request)
    {
        $validated= Validator($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'mobile_no' => 'required|digits:10',
            'dob' => 'required',
            'password' => 'required'
        
        ]);

        if($validated->passes())
        {

           $data = Oex_students::create([
    
            'name' => $request->name,
            'email'=> $request->email,
            'mobile_no'=>$request->mobile_no,
            'dob'=> $request->dob,
            'oex_exam_masters_id'=>$request->id,
            'password'=>$request->password,
            
            
        ])->id;
        $arr = array('status'=>'true','message'=>'success','reload'=>route('portal-print',$data));
        }
        else
        {
            $arr = array('status'=>'false','message'=>$validated->errors()->all());
        }
        return json_encode($arr);
    }
    
    public function portal_print($id)
    {
        $students = Oex_students::find($id);

        return view('portal.print')->with('students',$students);
    }
}
