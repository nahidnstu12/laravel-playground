<?php

namespace App\services;


use App\Models\Employer;
use Illuminate\Validation\Validator;

class EmployerService
{

    public function validator(array $data, $id=null):Validator
    {
        $rules = [
            'institute_type' => ['integer', 'required', 'max: 10'],
            'user_id' => ['integer', 'required'],
            'office_phone'=> ['string', 'nullable', 'max:15'],
            'status'=>['boolean', 'nullable']

        ];
        return \Illuminate\Support\Facades\Validator::make($data, $rules);
    }
    public function store(array $data): Employer
    {
        $employer = new Employer();
        $employer->fill($data);
        $employer->save();
        return $employer;
    }
}
