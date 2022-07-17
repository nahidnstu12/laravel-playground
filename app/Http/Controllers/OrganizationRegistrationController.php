<?php

namespace App\Http\Controllers;

use App\services\RegistraionService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganizationRegistrationController extends Controller
{
    protected $redirect = '/dashboard';
    const VIEW_PATH = 'backend.employer.auth.';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showEmployerRegistrationForm()
    {
        return view(self::VIEW_PATH . 'employer-registration');

    }

    public function storeEmployerRegistration(Request $request)
    {
        $registerService = new RegistraionService();
        $result = $registerService->registerEmployee($request);
        if($this->loginAndForward($result)){
            return redirect($this->redirectPath());
        }
        return redirect()->back()->withErrors([
            'msg'=>'user creation failed!',
            'error'=>$result['validator']
        ]);

    }

    public function loginAndForward($result):bool
    {
        if($result['status']){
            event(new Registered($result['user']));
            Auth::gurd()->login($result['user']);
            return  true;
        }
        return false;
    }

    public function redirectPath()
    {
        if(method_exists($this, 'redirectTo')){
            return $this->redirectTo();
        }
        return property_exists($this, 'redirectTo')
            ? $this->redirectTo : 'dashboard';
    }

}
