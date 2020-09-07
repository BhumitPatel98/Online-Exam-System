<?php

namespace App\Http\Controllers;

use App\Oex_category;
use App\Oex_exam_master;
use App\Oex_students;
use App\Oex_portal;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
       return view('admin.dashboard');
    }

    public function exam_category()
    {
        $categories = Oex_category::all(); 

        return view('admin.exam_category')->with('categories',$categories);
    }

    public function add_new_category(Request $request)
    {
        $validated= $request->validate([
            'name' => 'required',
        ]);

        if($validated)
        {

            Oex_category::create([

                'name' => $request->name,
                'status' => 1,
                
            ]);
            $arr = array('status'=>'true','message'=>'success','reload'=>route('admin-exam-category'));

        }
        else
        {
            $arr = array('status'=>'false','message'=>$validated);
        }

        return json_encode($arr);

    }

    public function delete_category($id)
    {
       $data =  Oex_category::find($id);

       $data->delete();

       return redirect()->route('admin-exam-category');
    }

    public function edit_category($id)
    {
        $categories =  Oex_category::find($id);

        return view('admin.edit_category')->with('categories',$categories);
    }

    public function update_category(Request $request)
    {
        $data = Oex_category::find($request->id);

        $data->name = $request->name;

        $data->save();

        echo json_encode(array('status'=>'true','message'=>'Category Update Successfully','reload'=>route('admin-exam-category')));
        
    }

    public function category_status($id)
    {
       $data = Oex_category::find($id);

       if($data->status == 1)
       {
            $data->status=0;
            $data->save();
       }
       else
       {
            $data->status=1;
            $data->save();
       }
    }

    

    public function manage_exam()
    {
        $categories = Oex_category::where('status',1)->get(); 

        $exams = Oex_exam_master::all(); 

        return view('admin.manage_exam')->with('categories',$categories)->with('exams',$exams);

    }

    public function add_new_exam(Request $request)
    {
        $validated= $request->validate([
            'title' => 'required',
            'exam_date' => 'required',
            'exam_category' => 'required',
            
        ]);

        if($validated)
        {

            Oex_exam_master::create([

                'title' => $request->title,
                'exam_date'=> $request->exam_date,
                'oex_categories_id'=>$request->exam_category,
                'status' => 1,
                
            ]);
            $arr = array('status'=>'true','message'=>'success','reload'=>route('admin-manage-exam'));

        }
        else
        {
            $arr = array('status'=>'false','message'=>$validated);
        }

        return json_encode($arr);
    }

    public function exam_status($id)
    {
       $data = Oex_exam_master::find($id);

       if($data->status == 1)
       {
            $data->status=0;
            $data->save();
       }
       else
       {
            $data->status=1;
            $data->save();
       }
    }

    public function delete_exam($id)
    {
        $data =  Oex_exam_master::find($id);

        $data->delete();
 
        return redirect()->route('admin-manage-exam');
    }

    public function edit_exam($id)
    {
        $categories = Oex_category::where('status',1)->get();
        
        $exams =  Oex_exam_master::find($id);

        return view('admin.edit_exam')->with('exams',$exams)->with('categories',$categories);

    }

    public function update_exam(Request $request)
    {
        $data = Oex_exam_master::find($request->id);

        $data->title = $request->title;

        $data->exam_date = $request->exam_date;

        $data->oex_categories_id = $request->exam_category;

        $data->save();

        echo json_encode(array('status'=>'true','message'=>'Exam Update Successfully','reload'=>route('admin-manage-exam')));
        
    }



    public function manage_students()
    {
    
        $datas = Oex_exam_master::where('status',1)->get();

        $exams =  Oex_students::orderBy('created_at','desc')->get();

        return view('admin.manage_students')->with('datas',$datas)->with('exams',$exams);
    }

    public function add_new_students(Request $request)
    {
            //dd($request->toArray());

            $validated= $request->validate([
                'name' => 'required',
                'email' => 'required',
                'mobile_no' => 'required',
                'dob' => 'required',
                'exam' => 'required',
                'password' => 'required',
            
            ]);
    
            if($validated)
            {
    
                Oex_students::create([
    
                    'name' => $request->name,
                    'email'=> $request->email,
                    'mobile_no'=>$request->mobile_no,
                    'dob'=> $request->dob,
                    'oex_exam_masters_id'=>$request->exam,
                    'password'=>$request->password,
                    'status' => 1,
                    
                    
                ]);
                $arr = array('status'=>'true','message'=>'success','reload'=>route('manage-students'));
    
            }
            else
            {
                $arr = array('status'=>'false','message'=>$validated);
            }
    
            return json_encode($arr);
    }

    public function student_status($id)
    {
        $data =  Oex_students::find($id);

       if($data->status == 1)
       {
            $data->status=0;
            $data->save();
       }
       else
       {
            $data->status=1;
            $data->save();
       }
    }

    public function delete_students($id)
    {

        $data = Oex_students::find($id);

        $data->delete();

        return redirect()->route('manage-students');

    }

    public function edit_students($id)
    {
        $students = Oex_students::find($id);

        $datas = Oex_exam_master::where('status',1)->get();

        return view('admin.edit_students')->with('students',$students)->with('datas',$datas);
    }

    public function update_students(Request $request)
    {

        $data = Oex_students::find($request->id);

        $data->name = $request->name;

        $data->email = $request->email;

        $data->mobile_no = $request->mobile_no;

        $data->dob = $request->dob;

        $data->oex_exam_masters_id = $request->exam;

        $data->password = $request->password;

        $data->save();

        echo json_encode(array('status'=>'true','message'=>'Student Update Successfully','reload'=>route('manage-students')));
    }



    public function manage_portal()
    {
        $portals = Oex_portal::orderBy('created_at','desc')->get();

        return view('admin.manage_portal')->with('portals',$portals);
    }

    public function add_new_portal(Request $request) 
    {
        $validated= $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile_no' => 'required',
            'password' => 'required',
        
        ]);

        if($validated)
        {

            Oex_portal::create([

                'name' => $request->name,
                'email'=> $request->email,
                'mobile_no'=>$request->mobile_no,
                'password'=>$request->password,
                'status' => 1,
                
                
            ]);
            $arr = array('status'=>'true','message'=>'success','reload'=>route('manage-portal'));

        }
        else
        {
            $arr = array('status'=>'false','message'=>$validated);
        }

        return json_encode($arr);
    }

    public function portal_status($id)
    {
     
        $data =  Oex_portal::find($id);

        if($data->status == 1)
        {
             $data->status=0;
             $data->save();
        }
        else
        {
             $data->status=1;
             $data->save();
        }

    }

    public function delete_portal($id)
    {
        $data = Oex_portal::find($id);

        $data->delete();

        return redirect()->route('manage-portal');
    }
}
