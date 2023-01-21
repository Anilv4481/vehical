<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class FlatTyreRequest extends FormRequest
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
        if (!request()->is('admin/flattyres/create')) {
            return [
                'vehical_type' => 'required',
                'tube' => 'required',
                'tyre_size' => 'required',
                'tyre_photo' => 'required',
                'vehical_no' => 'required',
                'location' => 'required',

            ];
        } else {
            return [
                'vehical_type' => 'required',
                'tube' => 'required',
                'tyre_size' => 'required',
                'tyre_photo' => 'required',
                'vehical_no' => 'required',
                'location' => 'required',
            ];
        }
    }

    public function messages()
    {
        return [
            'vehical_type.required' => __('validation.required', ['attribute' => 'Please Select any vehical']),
            'tube.required' => __('validation.required', ['attribute' => 'Tube field must be require']),
            'tyre_size.required' => __('validation.required', ['attribute' => 'Tyre size must be require']),
            'tyre_photo.required' => __('validation.required', ['attribute' => 'Tyre photo must be require']),
            'vehical_no.required' => __('validation.required', ['attribute' => 'Vehical number must be require']),
            'location.required' => __('validation.required', ['attribute' => 'Location must be require']),

        ];
    }
}
