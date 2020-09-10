<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CateRequest extends FormRequest
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
            'cate_slug' => 'required|string|unique:cates,slug,' .$this->id,
            'cate_stat' => 'in:0,1',
            // 'cate_imag' => 'required_without:edit|mimes:jpg,jpeg,png',
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

            // CATEGORY SLUG VALIDATION MESSAGES
            'cate_slug.required'    => __('admin/validation.required'),
            'cate_slug.string'      => __('admin/validation.string'),
            'cate_slug.unique'      => __('admin/validation.unique'),

            // CATEGORY STATUS VALIDATION MESSAGES
            'cate_stat.in'          => __('admin/validation.in'),

            // MAIN CATEGORY SELECTION MESSAGES
            'cate_main.required_with'    => __('admin/validation.required'),
            'cate_main.exists'           => __('admin/validation.exists'),

        ];
    }
}
