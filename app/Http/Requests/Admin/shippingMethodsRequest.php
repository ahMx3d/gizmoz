<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class shippingMethodsRequest extends FormRequest
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
        return [
            // 
            'id'        => 'required|exists:settings',
            'type'      => 'required|in:free,local,rate',
            'ship_name' => 'required',
            'ship_val'  => 'nullable|numeric|integer|min:0',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            // 
            'id.required'   => __('admin/validation.required'),
            // 'id.exists'      => 'قيمة الحقل غير صالحه',

            'type.required' => __('admin/validation.required'),
            // 'type.in'       => 'قيمة الحقل غير صالحه',

            'ship_name.required'    => __('admin/validation.required'),
            'ship_val.integer'      => __('admin/validation.integer'),
            'ship_val.numeric'      => __('admin/validation.numeric'),
            'ship_val.min'          => __('admin/validation.min'),
        ];
    }
}
