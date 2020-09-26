<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            'brand_name' => 'required|string|max:100',
            'brand_stat' => 'in:0,1',
            'brand_imag' => 'required_without:edit|mimes:jpg,jpeg,png',
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
            // BRAND NAME VALIDATION MESSAGES
            'brand_name.required'    => __('admin/validation.required'),
            'brand_name.string'      => __('admin/validation.string'),
            'brand_name.max'         => __('admin/validation.max'),

            // BRAND STATUS VALIDATION MESSAGES
            'brand_stat.in'          => __('admin/validation.in'),

            // MAIN BRAND SELECTION MESSAGES
            'brand_imag.required_without' => __('admin/validation.required'),
            'brand_imag.mimes'            => __('admin/validation.mimes'),

        ];
    }
}
