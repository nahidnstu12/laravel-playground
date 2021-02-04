<?php

namespace App\Http\Controllers\MultiAuth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterFormRequest;
use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function show(){
        return view('multiauth.register');
    }

    public function register(RegisterFormRequest $request){
        $data = array();
        $validator = $request->validated();
        $validator = $request->all();
        // dd($validator);
        User::create($validator);

       

        $data['status']="Successfully Registered";

        return \redirect('/login/mauth')->with($data);
    }
}
