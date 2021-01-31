<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index(){
        return view('usersignup.userviewpage');
    }
    public function editUser(){
        return view('usersignup.usereditpage');
    }
    public function accountSetting(){
        return view('usersignup.accountSettingPage');
    }
}
