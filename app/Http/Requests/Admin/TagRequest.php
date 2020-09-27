<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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
            'tag_name' => 'required|string|max:100',
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
            // TAG NAME VALIDATION MESSAGES
            'tag_name.required'    => __('admin/validation.required'),
            'tag_name.string'      => __('admin/validation.string'),
            'tag_name.max'         => __('admin/validation.max'),

        ];
    }
}
