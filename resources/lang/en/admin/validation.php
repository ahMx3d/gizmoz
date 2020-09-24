<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'The :attribute must be accepted',
    'active_url' => 'The :attribute is not a valid URL',
    'after' => 'The :attribute must be a date after :date',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date',
    'alpha' => 'The :attribute may only contain letters',
    'alpha_dash' => 'The :attribute may only contain letters, numbers, dashes and underscores',
    'alpha_num' => 'The :attribute may only contain letters and numbers',
    'array' => 'The :attribute must be an array',
    'before' => 'The :attribute must be a date before :date',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date',
    'between' => [
        'numeric' => 'This field must be between :min and :max',
        'file' => 'This field must be between :min and :max kilobytes',
        'string' => 'This field must be between :min and :max characters',
        'array' => 'This field must have between :min and :max items',
    ],
    'boolean' => 'The :attribute field must be true or false',
    'confirmed' => 'This field confirmation does not match',
    'date' => 'The :attribute is not a valid date',
    'date_equals' => 'The :attribute must be a date equal to :date',
    'date_format' => 'The :attribute does not match the format :format',
    'different' => 'This field must be differ in value',
    'digits' => 'The :attribute must be :digits digits',
    'digits_between' => 'The :attribute must be between :min and :max digits',
    'dimensions' => 'The :attribute has invalid image dimensions',
    'distinct' => 'The :attribute field has a duplicate value',
    'email' => 'This field must be a valid email address',
    'ends_with' => 'The :attribute must end with one of the following: :values',
    'exists' => 'The selected value is invalid',
    'file' => 'The :attribute must be a file',
    'filled' => 'The :attribute field must have a value',
    'gt' => [
        'numeric' => 'This field must be greater than :value',
        'file' => 'This field must be greater than :value kilobytes',
        'string' => 'This field must be greater than :value characters',
        'array' => 'This field must have more than :value items',
    ],
    'gte' => [
        'numeric' => 'This field must be greater than or equal :value',
        'file' => 'This field must be greater than or equal :value kilobytes',
        'string' => 'This field must be greater than or equal :value characters',
        'array' => 'This field must have :value items or more',
    ],
    'image' => 'The :attribute must be an image',
    'in' => 'The selected value is invalid',
    'in_array' => 'The :attribute field does not exist in :other',
    'integer' => 'This field must be an integer',
    'ip' => 'The :attribute must be a valid IP address',
    'ipv4' => 'The :attribute must be a valid IPv4 address',
    'ipv6' => 'The :attribute must be a valid IPv6 address',
    'json' => 'The :attribute must be a valid JSON string',
    'lt' => [
        'numeric' => 'This field must be less than :value',
        'file' => 'This field must be less than :value kilobytes',
        'string' => 'This field must be less than :value characters',
        'array' => 'This field must have less than :value items',
    ],
    'lte' => [
        'numeric' => 'This field must be less than or equal :value',
        'file' => 'This field must be less than or equal :value kilobytes',
        'string' => 'This field must be less than or equal :value characters',
        'array' => 'This field must not have more than :value items',
    ],
    'max' => [
        'numeric' => 'This field may not be greater than :max',
        'file' => 'This field may not be greater than :max kilobytes',
        'string' => 'This field may not be greater than :max characters',
        'array' => 'This field may not have more than :max items',
    ],
    'mimes' => 'This field must be a file ended with extension types: :values',
    'mimetypes' => 'This field must be a file ended with extension types: :values',
    'min' => [
        'numeric' => 'This field must be at least :min',
        'file' => 'This field must be at least :min kilobytes',
        'string' => 'This field must be at least :min characters',
        'array' => 'This field must be at least :min items',
    ],
    'not_in' => 'The selected value is invalid',
    'not_regex' => 'The :attribute format is invalid',
    'numeric' => 'This field must be a number',
    'password' => 'The password is incorrect',
    'present' => 'The :attribute field must be present',
    'regex' => 'The :attribute format is invalid',
    'required' => 'This field is required',
    'required_if' => 'The :attribute field is required when :other is :value',
    'required_unless' => 'The :attribute field is required unless :other is in :values',
    'required_with' => 'This field is required',
    'required_with_all' => 'The :attribute field is required when :values are present',
    'required_without' => 'The :attribute field is required when :values is not present',
    'required_without_all' => 'The :attribute field is required when none of :values are present',
    'same' => 'This field must match its confirmation',
    'size' => [
        'numeric' => 'This field must be :size',
        'file' => 'This field must be :size kilobytes',
        'string' => 'This field must be :size characters',
        'array' => 'This field must contain :size items',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values',
    'string' => 'This field must be a string',
    'timezone' => 'The :attribute must be a valid zone',
    'unique' => 'This value has already been taken',
    'uploaded' => 'The :attribute failed to upload',
    'url' => 'The :attribute format is invalid',
    'uuid' => 'The :attribute must be a valid UUID',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
