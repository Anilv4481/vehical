<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiRegisterRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;

    public function rules()
    {
        return [
            'fullname' => 'required',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'phone' => 'required|unique:users,phone|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'password' => 'required|min:8|required_with:c_password|same:c_password|strong_password',
            'c_password' => 'required|min:8',
            'about' => 'required',
            'user_type' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' => __('validation.required', ['attribute' => 'Full Name']),
            'about.required' => __('validation.required', ['attribute' => 'About']),
            'user_type.required' => __('validation.required', ['attribute' => 'User type']),
            'phone.required' => __('validation.required', ['attribute' => 'Phone']),
            'email.required' => __('validation.required', ['attribute' => 'Email']),
            'email.email' => __('validation.email', ['attribute' => 'Email']),
            'email.unique' => __('validation.unique', ['attribute' => 'Email']),
            'password.required' => __('validation.required', ['attribute' => 'Password']),
            'password.strong_password' => __('validation.strong_password', ['attribute' => 'Password']),
            'c_password.required' => __('validation.required', ['attribute' => 'Confirm Password']),
        ];
    }

}