<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index(){
        $data = array();
        $user = auth()->user();

        $data['status'] = $user->status == 1 ? 'Active' : 'Blocked';
        $data['role'] = $this->getRoleType($user->role_type);
        $data['verified'] = $user->verified_at ? 'Yes' : 'No';

        return view('usersignup.userviewpage')->with($data);
    }
    public function editUser(){
        return view('usersignup.usereditpage');
    }
    public function accountSetting(){
        return view('usersignup.accountSettingPage');
    }
    public function getRoleType($id){
        if($id == 0) return 'Normal User';
        if($id == 1) return 'Dress Staff';
        if($id == 2) return 'Product Staff';
        if($id == 3) return 'Admin';
    }
}
