<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class NotificationRequest extends FormRequest
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
        if (!request()->is('admin/notifications/create')) {
            return [
                'notification' => 'required',
                'message' => 'required',
                
            ];
        } else {
            return [
                'notification' => 'required',
                'message' => 'required',
            ];
        }
    }

    public function messages()
    {
        return [
            'notification.required' => __('validation.required', ['attribute' => 'Notification']),
            'message.required' => __('validation.required', ['attribute' => 'Message']),
          
        ];
    }
}
