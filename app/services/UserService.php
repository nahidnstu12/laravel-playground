<?php

namespace App\services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\RequiredIf;
use Illuminate\Validation\Validator;

class UserService
{
    public function validator(array $data, $id = null): Validator
    {
        $rules = [
            'user_type_id' =>[
                'required', 'integer','nullable'
            ],
            'name' => [
                'bail',
                'required',
                'string',
                'max: 200'
            ],
            'phone' => ['string', 'nullable', 'max: 20', Rule::unique('users')->ignore($id)],
            'username' => [
                'bail',
                'required',
                Rule::unique('users')->ignore($id),
            ],
            'email' => [
                'bail',
                'required',
                'email',
                Rule::unique('users')->ignore($id),
            ],
            'password' => [
                'bail',
                new RequiredIf(!$id),
            ],

        ];

        return \Illuminate\Support\Facades\Validator::make($data, $rules);
    }

    public function store(array $data): User
    {
        $data['password'] = Hash::make($data['password']);
        $user = new User();
        $user->fill($data);
        $user->save();
        return $user;
    }
}
