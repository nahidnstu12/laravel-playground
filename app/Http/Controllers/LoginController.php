<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function show(){
        return view('usersignup.login');
    }

    public function authenticate(Request $request){
        $data = array();
        $validator = $request->validate([
            'email'     => 'required',
            'password'  => 'required'
        ]);

        if(!Auth::attempt($validator)){

            $data['status'] = "Login Failed";
            return back()->with($data);
        }
        $data['status'] = "Login Success";
        // return view('usersignup.userviewpage')->with($data);
        return \redirect()->route('userdashboard')->with($data);
    }

    public function forgetpass(){
        return view('usersignup.forgetpassword');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return \redirect()->route('login');
    }
}
