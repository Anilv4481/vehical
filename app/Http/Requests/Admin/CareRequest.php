<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CareRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if (!request()->is('admin/carefolder/create')) {
            return [
                'service_type' => 'required',
                'tube' => 'required',
                'vehical' => 'required',

            ];
        } else {
            return [
                'service_type' => 'required',
                'tube' => 'required',
                'vehical' => 'required',

            ];
        }
    }

    public function messages()
    {
        return [
            'service_type.required' => __('validation.required', ['attribute' => 'Service type must be require']),
            'tube.required' => __('validation.required', ['attribute' => 'Tube must be require']),
            'vehical.required' => __('validation.required', ['attribute' => 'Vehical must be require']),

        ];
    }

}
