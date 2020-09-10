<?php

namespace App\Http\Controllers;

use App\Oex_portal;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PortalController extends Controller
{
    public function portal_singup()
    {
        if($session_data = Session::get('portal_session'))
        {
            return redirect()->route('portal-dashboard');
        }
            return view('portal.singup');
    }

    public function portal_singup_sub(Request $request)
    {
        $validated= Validator($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'mobile_no' => 'required|digits:10',
            'password' => 'required'
        
        ]);

        if($validated->passes())
        {

            $is_exits = Oex_portal::where('email',$request->email)->get()->toArray();

            if($is_exits)
            {

                $arr = array('status'=>'false','message'=>'Email is Already used');

            }
            else
            {

                Oex_portal::create([

                    'name' => $request->name,
                    'email'=> $request->email,
                    'mobile_no'=>$request->mobile_no,
                    'password'=>$request->password,  
                    
                ]);
                $arr = array('status'=>'true','message'=>'success','reload'=>route('portal-login'));

            }

        }
        else
        {
            $arr = array('status'=>'false','message'=>$validated->errors()->all());
        }

        return json_encode($arr);
    }

    public function portal_login()
    {
        if($session_data = Session::get('portal_session'))
       {
           return redirect()->route('portal-dashboard');
       }
      return view('portal.login');
    }

    public function portal_login_sub(Request $request)
    {
        $portal = Oex_portal::where('email',$request->email)->where('password',$request->password)->get();
        if(count($portal)>0)
        {
            if($portal[0]['status']==1)
            {
                $request->session()->put('portal_session',$portal[0]['id']);
                $arr = array('status'=>'true','message'=>'success','reload'=>route('portal-dashboard'));
            }
            else
            {
                $arr = array('status'=>'false','message'=>'Your Id is Deactivated');
            }
        }
        else
        {
            $arr = array('status'=>'false','message'=>'Email and Password Wrong');
        }

        return json_encode($arr);
    }

}
