<?php

namespace App\Http\Controllers\MultiAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DressBoardController extends Controller
{
    public function show(){
        return view('multiauth.dressdashboard');
    }
}
