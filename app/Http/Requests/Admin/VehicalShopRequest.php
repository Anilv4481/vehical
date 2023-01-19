<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class VehicalShopRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if (!request()->is('admin/vehicalshop/create')) {
            return [
                'vehical_shop_address' => 'required',
                'vehical_phone_number' => 'required|numeric|digits:10',
                'vehical_shop_email_id' => 'required|email',
                'vehical_shop_status' => 'required',
                'vehical_shop_profile' => 'required',
                'vehical_type' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'vehical_problem' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'vehical_desc' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
            ];
        } else {
            return [
                'vehical_shop_address' => 'required',
                'vehical_phone_number' => 'required|numeric',
                'vehical_shop_email_id' => 'required',
                'vehical_shop_status' => 'required',
                'vehical_shop_profile' => 'required',
                'vehical_type' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'vehical_problem' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'vehical_desc' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
            ];
        }
    }

    public function messages()
    {
        return [
            'vehical_shop_address.required' => __('validation.required', ['attribute' => 'Vehical shop address']),
            'vehical_phone_number.required' => __('validation.required', ['attribute' => 'Vehical shop phone number']),
            'vehical_shop_email_id.required' => __('validation.required', ['attribute' => 'Vehical shop email']),
            'vehical_shop_status.required' => __('validation.required', ['attribute' => 'Vehical shop status']),
            'vehical_shop_profile.required' => __('validation.required', ['attribute' => 'Vehical shop profile']),
            'vehical_type.required' => __('validation.required', ['attribute' => 'Vehical type']),
            'vehical_problem.required' => __('validation.required', ['attribute' => 'Vehical shop problem']),
            'vehical_desc.required' => __('validation.required', ['attribute' => 'Vehical shop description']),
        ];
    } 
    
}