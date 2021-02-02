<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function show(){
        return view('usersignup.register');
    }

    public function register(Request $request){
        $data = array();
        $validator = $request->validate([
            'name'    => 'required|min:3|max:15',
            'email'   => 'required',
            'password'=> 'required|min:2|confirmed'
        ]);

        // if(!auth()->attempt($request->only('email','password'))){
        //     $data['status']="Registration Failed";
        //     return back()->with('status',$data);
        // }

        User::create($validator);
        $data['status']="Successfully Registered";

        // $user = User::create($validator);
        // dd($user);

        return \redirect('/login')->with($data);
    }
}
