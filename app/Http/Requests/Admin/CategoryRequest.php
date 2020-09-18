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
        return [
            //
            'cate_name' => 'required|string|max:100',
            'cate_stat' => 'in:0,1',
            'cate_main' => 'required_with:sub|exists:cates,id',
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
            // CATEGORY NAME VALIDATION MESSAGES
            'cate_name.required'    => __('admin/validation.required'),
            'cate_name.string'      => __('admin/validation.string'),
            'cate_name.max'         => __('admin/validation.max'),

            // CATEGORY STATUS VALIDATION MESSAGES
            'cate_stat.in'          => __('admin/validation.in'),

            // MAIN CATEGORY SELECTION MESSAGES
            'cate_main.required_with'    => __('admin/validation.required'),
            'cate_main.exists'           => __('admin/validation.exists'),

        ];
    }
}
