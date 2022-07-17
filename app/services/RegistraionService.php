<?php

namespace App\services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RegistraionService
{
    public $userService;
    public $employerService;

    public function __construct()
    {
        $this->employerService = new EmployerService();
        $this->userService = new UserService();
    }

    public function registerEmployer(Request $request)
    {
        DB::beginTransaction();
        try {
            $user = $this->createUser($request, 'Employer');
            $request['user_id'] = $user->id;

            $validatedEmployerData = $this->employerService
                ->validator($request->only(['user_id', 'institute_type', 'office_phone']))
                ->validate();
            $employer = $this->employerService->store($validatedEmployerData);
            DB::commit();
            return [
                'status'=>true,
                'user'=> $user
            ];
        }catch (\Throwable $exception){
            $validator = $exception->getMessage();
            DB::rollBack();
            Log::debug($exception->getMessage());
            return [
                'status'=>false,
               'validator'=> $validator
            ];
        }
    }

    public function createUser($request, $model)
    {
        $request['user_type_id'] = User::USER_TYPES_CODE[$model];
        $request['phone'] = $request->phone ?? $request->office_phone;
        $validatedUserData = $this->userService
            ->validator($request->only(['user_type_id', 'name', 'phone', 'username', 'email']));

        return $this->userService->store($validatedUserData);
    }
}
