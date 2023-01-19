<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ConsultantRequest extends FormRequest
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
        if (!request()->is('admin/consultents/create')) {
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
        } else {
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
