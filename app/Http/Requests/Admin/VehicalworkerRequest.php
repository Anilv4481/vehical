<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class VehicalworkerRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if (!request()->is('admin/vehicalserviceworker/create')) 
        {
            return [
                'service_worker_name' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'service_worker_phone' => 'required|numeric|digits:10',
                'service_worker_email_id' => 'required|email',
                'service_worker_last_location' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'service_worker_profile' => 'required',
                'service_worker_shop_name' => 'required|string|regex:/^[a-zA-Z]+$/u|max:500',
                'longitude'=>'required',
                'latitude'=>'required'
            ];
        } else {
            return [
                'service_worker_name' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'service_worker_phone' => 'required|numeric|digits:10',
                'service_worker_email_id' => 'required|email',
                'service_worker_last_location' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'service_worker_profile' => 'required',
                'service_worker_shop_name' => 'required|string|regex:/^[a-zA-Z]+$/u|max:500',
                'longitude'=>'required',
                'latitude'=>'required'
            ];
        }
    }

    public function messages()
    {
        return [
            'service_worker_name.required' => __('validation.required', ['attribute' => 'Service Worker name']),
            'service_worker_phone.required' => __('validation.required', ['attribute' => 'Service Worker phone number']),
            'service_worker_email_id.required' => __('validation.required', ['attribute' => 'Service Worker email address']),
            'service_worker_last_location.required' => __('validation.required', ['attribute' => 'Service Worker last location']),
            'service_worker_profile.required' => __('validation.required', ['attribute' => 'Service Worker profile']),
            'service_worker_shop_name' => __('validation.required', ['attribute' => 'Service Worker Shop name']),
            'longitude' => __('validation.required', ['attribute' => 'longitude ']),
            'latitude' => __('validation.required', ['attribute' => 'latitude']),
        ];
    } 
    
}