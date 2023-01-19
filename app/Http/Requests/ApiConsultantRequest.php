<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiConsultantRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'f_name' => 'required',
            'l_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'password' => 'required',
            'experiance' => 'required',
            'about' => 'required',
            'advisory' => 'required',
            'bank_account' => 'required',
            'picture' => '',
            'certificate_image' => '',
            'push_notification' => 'required',
            'user_language' => 'required',
            'email_status' => 'required',
            'phone_status' => 'required',
            'recommended' => 'required',
            'status' => 'required',
          
        ];
    }


    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'f_name.required' => __('validation.required', ['attribute' => 'First Name']),
            'l_name.required' => __('validation.required', ['attribute' => 'Last Name']),
            'email.required' => __('validation.required', ['attribute' => 'Email']),
            'phone.required' => __('validation.required', ['attribute' => 'Phone']),
            'gender.required' => __('validation.required', ['attribute' => 'Gender']),
            'password.required' => __('validation.required', ['attribute' => 'Password']),
            'experiance.required' => __('validation.required', ['attribute' => 'Experiance']),
            'about.required' => __('validation.required', ['attribute' => 'About']),
            'advisory.required' => __('validation.required', ['attribute' => 'Advisory']),
            'bank_account.required' => __('validation.required', ['attribute' => 'Bank Account']),
            'picture.required' => __('validation.required', ['attribute' => 'Picture']),
            'certificate_image.required' => __('validation.required', ['attribute' => 'Certificate']),
            'push_notification.required' => __('validation.required', ['attribute' => 'Push Notification']),
            'user_language.required' => __('validation.required', ['attribute' => 'User Language']),
            'email_status.required' => __('validation.required', ['attribute' => 'Email Status']),
            'phone_status.required' => __('validation.required', ['attribute' => 'Phone Status']),
            'recommended.required' => __('validation.required', ['attribute' => 'Recommended']),
            'status.required' => __('validation.required', ['attribute' => 'Status']),
        ];
    }
}