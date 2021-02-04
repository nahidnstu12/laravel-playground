<?php

namespace App\Http\Controllers\MultiAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function show(){
        return view('multiauth.login');
    }
    protected $redirectTo;
    public function redirectTo()
    {
        switch(Auth::user()->role_type){

            case 1:
                $this->redirectTo = '/user/board';
                return $this->redirectTo;
                break;

            case 1:
                $this->redirectTo = '/dress/board';
                return $this->redirectTo;
                break;

            case 2:
                $this->redirectTo = '/product/board';
                return $this->redirectTo;
                break;

            case 3:
                $this->redirectTo = '/admin/board';
                return $this->redirectTo;
                    break;

            default:
                $this->redirectTo = '/login/mauth';
                return $this->redirectTo;
        }
    }

    protected function credentials(Request $request)
        {
          if(is_numeric($request->get('email'))){
            return ['phone_no'=>$request->get('email'),'password'=>$request->get('password')];
          }
          elseif (filter_var($request->get('email'), FILTER_VALIDATE_EMAIL)) {
            return ['email' => $request->get('email'), 'password'=>$request->get('password')];
          }
          return ['name' => $request->get('email'), 'password'=>$request->get('password')];
        }

    public function authenticate(Request $request){
        $data = array();       

        if(!Auth::attempt($this->credentials($request),$request->remember)){

            $data['status'] = "Login Failed";
            return back()->with($data);
        }
        $data['status'] = "Login Success";

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
