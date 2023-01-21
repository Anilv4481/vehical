<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PetrolDesielRequest extends FormRequest
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
        if (!request()->is('admin/petroldesiels/create')) {
            return [
                'vehical_type' => 'required',
                'vehical_no' => 'required',
                'vehical_pic' => 'required',
                'fuel_type' => 'required',
                'quanity_fuel' => 'required',
                'location' => 'required',

            ];
        } else {
            return [
                'vehical_type' => 'required',
                'vehical_no' => 'required',
                'vehical_pic' => 'required',
                'fuel_type' => 'required',
                'quanity_fuel' => 'required',
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
            'fuel_type.required' => __('validation.required', ['attribute' => 'Fuel must be require']),
            'quanity_fuel.required' => __('validation.required', ['attribute' => 'Quantity fuel must be require']),
            'location.required' => __('validation.required', ['attribute' => 'Location must be require']),

        ];
    }
}
