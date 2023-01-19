<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class HostelServiceRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if (!request()->is('admin/hostelservice/create')) {
            return [
                'company_name' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'company_lic_no' => 'required|numeric',
                'company_licence_photo' => 'required',
                'company_work_photo' => 'required',
                'company_image_logo' => 'required',
                'company_location' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'company_address' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'company_map_location' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'company_aboutus' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
            ];
        } else {
            return [
                'company_name' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'company_lic_no' => 'required|numeric',
                'company_licence_photo' => 'required',
                'company_work_photo' => 'required',
                'company_image_logo' => 'required',
                'company_location' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'company_address' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'company_map_location' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'company_aboutus' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
            ];
        }
    }

    public function messages()
    {
        return [
            'company_name.required' => __('validation.required', ['attribute' => 'Company name']),
            'company_lic_no.required' => __('validation.required', ['attribute' => 'Company licence number']),
            'company_licence_photo.required' => __('validation.required', ['attribute' => 'Company licence photo']),
            'company_work_photo.required' => __('validation.required', ['attribute' => 'Company work photo']),
            'company_image_logo.required' => __('validation.required', ['attribute' => 'Company image logo']),
            'company_location.required' => __('validation.required', ['attribute' => 'Company Location']),
            'company_address.required' => __('validation.required', ['attribute' => 'Company Location']),
            'company_map_location.required' => __('validation.required', ['attribute' => 'Company Map Location']),
            'company_aboutus.required' => __('validation.required', ['attribute' => 'Company About us']),
        ];
    } 
    
}