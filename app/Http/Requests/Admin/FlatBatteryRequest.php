<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class FlatBatteryRequest extends FormRequest
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
        if (!request()->is('admin/flatbatterys/create')) {
            return [
                'vehical_type' => 'required',
                'vehical_no' => 'required',
                'vehical_pic' => 'required',
                'battery_pic' => 'required',
                'location' => 'required',

            ];
        } else {
            return [
                'vehical_type' => 'required',
                'vehical_no' => 'required',
                'vehical_pic' => 'required',
                'battery_pic' => 'required',
                'location' => 'required',
            ];
        }
    }

    public function messages()
    {
        return [
            'vehical_type.required' => __('validation.required', ['attribute' => 'Please Select any vehical']),
            'vehical_no.required' => __('validation.required', ['attribute' => 'Vehical number must be require']),
            'vehical_pic.required' => __('validation.required', ['attribute' => 'Vehical Pic must be require']),
            'battery_pic.required' => __('validation.required', ['attribute' => 'Battery Pic must be require']),
            'location.required' => __('validation.required', ['attribute' => 'Location must be require']),

        ];
    }
}
