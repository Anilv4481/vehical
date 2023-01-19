<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SetAvailabilityRequest extends FormRequest
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
        if (!request()->is('admin/battles/create')) {
            return [
                'date' => 'required',

                'start_time' => 'required',
                'end_time' => 'required', //in rs
                'consultant' => 'required',  //in rs
                
                // 'status' => 'required', //1:Open 2:Running
            ];
        } else {
            return [
                'date' => 'required',

                'start_time' => 'required',
                'end_time' => 'required', //in rs
                'consultant' => 'required',  //in rs
                
            ];
        }
    }

    public function messages()
    {
        return [
            'date.required' => __('validation.required', ['attribute' => 'Date']),

            'start_time.required' => __('validation.required', ['attribute' => 'Start Time']),
            'end_time.required' => __('validation.required', ['attribute' => 'End Time']),
            'consultant.required' => __('validation.required', ['attribute' => 'Consultant']),
          
        ];
    }
}
