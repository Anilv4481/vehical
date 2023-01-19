<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CarBikeDetailsRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if (!request()->is('admin/vehicalshop/create')) {
            return [
                'vehical_company_name' => 'required',
                'vehical_name' => 'required',
                'vehical_registration_no' => 'required',

            ];
        } else {
            return [
                'vehical_company_name' => 'required',
                'vehical_name' => 'required',
                'vehical_registration_no' => 'required',
            ];
        }
    }

    public function messages()
    {
        return [
            'vehical_company_name.required' => __('validation.required', ['attribute' => 'vehical company name must be require']),
            'vehical_name.required' => __('validation.required', ['attribute' => 'vehical name must be require']),
            'vehical_registration_no.required' => __('validation.required', ['attribute' => 'vehical registration number must be require']),

        ];
    }

}
