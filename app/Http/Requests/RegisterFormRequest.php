<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'    => 'required|min:3|max:15|unique:users',
            'email'   => 'required|unique:users',
            'password'=> 'required|min:2|confirmed',
            // 'phone_no'=> 'required|regex:/(01)[0-9]{9}/|unique:users'
            'phone_no' => 'required'
        ];
    }

    public function messages()
    {
        return[
            'phone_no.required' => 'Phone Number Needed',
            'phone_no.regex' => 'You Should Provide Bd format Number'
        ];
    }
}
