<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class VehicalServiceRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if (!request()->is('admin/vehicalservice/create')) {
            return [
                'vehicalservice_name' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'vehical_image' => 'required',
            ];
        } else {
            return [
                'vehicalservice_name' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'vehical_image' => 'required',
            ];
        }
    }

    public function messages()
    {
        return [
            'vehicalservice_name.required' => __('validation.required', ['attribute' => 'Vehical service name']),
            'vehical_image.required' => __('validation.required', ['attribute' => 'Vehical service image']),
        ];
    } 
    
}