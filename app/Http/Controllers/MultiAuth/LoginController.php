<?php

namespace App\Http\Controllers\MultiAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function show(){
        return view('multiauth.login');
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
        return \redirect()->route('admin.board')->with($data);
    }

    public function forgetpass(){
        return view('usersignup.forgetpassword');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return \redirect()->route('login.mauth');
    }
}
