<?php

namespace App\Http\Controllers\MultiAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function show(){
        return view('multiauth.register');
    }

    public function register(Request $request){
        $data = array();
        $validator = $request->validate([
            'name'    => 'required|min:3|max:15',
            'email'   => 'required',
            'password'=> 'required|min:2|confirmed'
        ]);

        User::create($validator);
        $data['status']="Successfully Registered";

        return \redirect('/login/mauth')->with($data);
    }
}
