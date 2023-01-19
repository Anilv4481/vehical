<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PackageRequest extends FormRequest
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
        if (!request()->is('admin/packages/create')) {
            return [
                'name' => 'required',

                'amount' => 'required',
                'vat' => 'required', //in rs
                'sar' => 'required',  //in rs
             
            ];
        } else {
            return [
                'name' => 'required',

                'amount' => 'required',
                'vat' => 'required', //in rs
                'sar' => 'required',  //in rs
             
            ];
        }
    }

    public function messages()
    {
        return [
            'name.required' => __('validation.required', ['attribute' => 'Name']),

            'amount.required' => __('validation.required', ['attribute' => 'amount']),
            'vat.required' => __('validation.required', ['attribute' => 'vat']),
            'sar.required' => __('validation.required', ['attribute' => 'sar']),
           
        ];
    }
}
