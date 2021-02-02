<?php

namespace App\Http\Controllers\MultiAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function show(){
        return view('multiauth.admindashboard');
    }
    public function userlist_show(){
        return view('multiauth.admin_userlist');
    }
}
