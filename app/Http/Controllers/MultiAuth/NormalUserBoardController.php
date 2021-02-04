<?php

namespace App\Http\Controllers\MultiAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NormalUserBoardController extends Controller
{
    public function show(){
        return view('multiauth.normalUser');
    }
}
