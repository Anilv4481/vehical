<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SubcategoryRequest extends FormRequest
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
        if (!request()->is('admin/subcategorys/create')) {
            return [
                'sub_cat_name' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'sub_cat_image' => 'required',
                'cat_id' => 'required'
            ];
        } else {
            return [
                'sub_cat_name' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
                'sub_cat_image' => 'required',
                'cat_id' => 'required'
            ];
        }
    }

    public function messages()
    {
        return [
            'sub_cat_name.required' => __('validation.required', ['attribute' => 'Subcategory Name']),
            'sub_cat_image.required' => __('validation.required', ['attribute' => 'Subcategory Image']),
            'cat_id.required' => __('validation.required', ['attribute' => 'Category List']),
        ];
    }
}