<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        if (!request()->is('admin/categorys/create')) {
            return [
                'cat_name' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'cat_image' => 'required',
                'cat_status' => 'required', 
            ];
        } else {
            return [
                'cat_name' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'cat_image' => 'required',
                'cat_status' => 'required', 
            ];
        }
    }

    public function messages()
    {
        return [
            'cat_name.required' => __('validation.required', ['attribute' => 'Category Name']),
            'cat_image.required' => __('validation.required', ['attribute' => 'Category Image']),
            'cat_status.required' => __('validation.required', ['attribute' => 'Category Status']),
        ];
    }
}