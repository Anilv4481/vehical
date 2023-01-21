<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ShopRegistrationrequest extends FormRequest
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
        if (!request()->is('admin/shopregistration/create')) {
            return [
                'company_name' => 'required|max:150',
                'company_gst_no' => 'required|numeric',
                'company_owner_name' => 'required|max:150',
                'company_address' => 'required',
                'company_email' => 'required',
                'company_mobile' => 'required|numeric|digits:10',
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
                'company_name' => 'required|max:150',
                'company_gst_no' => 'required|numeric',
                'company_owner_name' => 'required|max:150',
                'company_address' => 'required',
                'company_email' => 'required',
                'company_mobile' => 'required|numeric|digits:10',
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
            'company_name.required' => __('validation.required', ['attribute' => 'Company name must be require']),
            'company_gst_no.required' => __('validation.required', ['attribute' => 'Gst number must be require']),
            'company_owner_name.required' => __('validation.required', ['attribute' => 'Owner name must be require']),
            'company_address.required' => __('validation.required', ['attribute' => 'Address must be require']),
            'company_email.required' => __('validation.required', ['attribute' => 'Company Email']),
            'company_mobile.required' => __('validation.required', ['attribute' => 'Mobile Number must be require']),
            'company_year_of_exp.required' => __('validation.required', ['attribute' => 'Company Year of Exp must be require']),
            'company_aboutus.required' => __('validation.required', ['attribute' => 'About us']),
            'company_password.required' => __('validation.required', ['attribute' => 'Password must be require']),

            'company_c_password.required' => __('validation.required', ['attribute' => 'Confirm Password must be require']),
            'company_work_place_photo.required' => __('validation.required', ['attribute' => 'Company Work Place Photo']),
            'company_profile_image.required' => __('validation.required', ['attribute' => 'Profile Image must be require']),
            'company_location.required' => __('validation.required', ['attribute' => 'Location must be require']),
        ];
    }
}
