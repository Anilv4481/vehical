<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ShopRequest extends FormRequest
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
        if (!request()->is('admin/shopregisrtation/create')) {
            return [
                'company_name' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'company_gst_no' => 'numbric',
                'company_owner_name' => 'required',
                'company_address' => 'required',
                'company_email' => 'required',
                'company_mobile' => 'required',
                'company_year_of_exp' => 'required',
                'company_aboutus' => 'required',
                'company_password' => 'required',
                'company_c_password' => 'required',
                'company_work_place_photo' => 'required',
                'company_profile_image' => 'required',
                'company_location' => 'required',
            ];
        } else {
            return [
                'company_name' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'company_gst_no' => 'numbric',
                'company_owner_name' => 'required',
                'company_address' => 'required',
                'company_email' => 'required',
                'company_mobile' => 'required',
                'company_year_of_exp' => 'required',
                'company_aboutus' => 'required',
                'company_password' => 'required',
                'company_c_password' => 'required',
                'company_work_place_photo' => 'required',
                'company_profile_image' => 'required',
                'company_location' => 'required',
            ];
        }
    }

    public function messages()
    {
        return [

             'company_name'  => __('validation.required', ['attribute' => 'Category Name']),
                'company_gst_no' => __('validation.required', ['attribute' => 'company_gst_no']),
                'company_owner_name' => __('validation.required', ['attribute' => 'Category Name']),
                'company_address' => __('validation.required', ['attribute' => 'company_owner_name']),
                'company_email' => __('validation.required', ['attribute' => 'company_email']),
                'company_mobile' => __('validation.required', ['attribute' => 'company_mobile']),
                'company_year_of_exp' => __('validation.required', ['attribute' => 'company_year_of_exp']),
                'company_aboutus' => __('validation.required', ['attribute' => 'company_aboutus']),
                'company_password' => __('validation.required', ['attribute' => 'company_password']),
                'company_c_password' => __('validation.required', ['attribute' => 'company_c_password']),
                'company_work_place_photo' => __('validation.required', ['attribute' => 'company_work_place_photo']),
                'company_profile_image'  => __('validation.required', ['attribute' => 'company_profile_image']),
                'company_location' => __('validation.required', ['attribute' => 'company_location']),
        ];
    }
}
