<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'prof_name'             => 'required',
            'prof_mail'             => 'required|email|unique:admins,email,' .$this->id,
            'old_pass'              => 'nullable|required_with:password|password:admin',
            'password'              => 'nullable|min:8|different:old_pass|string|confirmed',
            'password_confirmation' => 'nullable|min:8|required_with:password|string|same:password',
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
            // NAME MESSAGES
            'prof_name.required'     => __('admin/validation.required'),
            'prof_mail.required'     => __('admin/validation.required'),

            // EMAIL MESSAGES
            'prof_mail.email'        => __('admin/validation.email'),
            'prof_mail.unique'       => __('admin/validation.unique'),

            // OLD PASSWORD MESSAGES
            'old_pass.required_with'    => __('admin/validation.required_with'),
            'old_pass.password'         => __('admin/validation.password'),

            // NEW PASSWORD MESSAGES
            'password.min'          => __('admin/validation.min'),
            'password.different'    => __('admin/validation.different'),
            'password.string'       => __('admin/validation.string'),
            'password.confirmed'    => __('admin/validation.confirmed'),

            // CONFIRMATION PASSWORD MESSAGES
            'password_confirmation.required_with'   => __('admin/validation.required_with'),
            'password_confirmation.string'          => __('admin/validation.string'),
            'password_confirmation.same'            => __('admin/validation.same'),
            'password_confirmation.min'             => __('admin/validation.min'),

        ];
    }
}
