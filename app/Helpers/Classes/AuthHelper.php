<?php

namespace App\Helpers\Classes;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

class AuthHelper
{
    public function getAuthUser(string $guard = 'web'): ?Authenticatable
    {
        if(empty($guard)){
            if(Auth::check()){
                return Auth::user();
            }else{
                return null;
            }
        }

        if(Auth::guard($guard)->check()){
            return Auth::guard($guard)->user();
        }
        return null;
    }

    public static function checkAuthUser(string $guard='web'):bool
    {
        if(empty($guard))
            return false;
        return Auth::guard($guard)->check();

    }
}
