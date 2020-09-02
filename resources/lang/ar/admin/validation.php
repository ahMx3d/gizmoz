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
        'numeric' => 'هذا الحقل يجب ان يكون بين :min and :max',
        'file' => 'هذا الحقل يجب ان يكون بين :min and :max كيلو بايت',
        'string' => 'هذا الحقل يجب ان يكون بين :min and :max رموز',
        'array' => 'هذا الحقل يجب ان يكون بين :min and :max عنصر',
    ],
    'boolean' => 'The :attribute field must be true or false',
    'confirmed' => 'تأكيد هذا الحقل غير متطابق',
    'date' => 'The :attribute is not a valid date',
    'date_equals' => 'The :attribute must be a date equal to :date',
    'date_format' => 'The :attribute does not match the format :format',
    'different' => 'هذا الحقل يجب أن يكون مختلفًا في القيمة',
    'digits' => 'The :attribute must be :digits digits',
    'digits_between' => 'The :attribute must be between :min and :max digits',
    'dimensions' => 'The :attribute has invalid image dimensions',
    'distinct' => 'The :attribute field has a duplicate value',
    'email' => 'هذا الحقل يجب أن يكون عنوان بريد إلكتروني صالحًا',
    'ends_with' => 'The :attribute must end with one of the following: :values',
    'exists' => 'The selected :attribute is invalid',
    'file' => 'The :attribute must be a file',
    'filled' => 'The :attribute field must have a value',
    'gt' => [
        'numeric' => 'هذا الحقل يجب ان يكون اكبر من  :value',
        'file' => 'هذا الحقل يجب ان يكون اكبر من  :value كيلو بايت',
        'string' => 'هذا الحقل يجب ان يكون اكبر من  :value رموز',
        'array' => 'هذا الحقل يجب ان يكون اكبر من  :value عنصر',
    ],
    'gte' => [
        'numeric' => 'هذا الحقل يجب ان يكون اكبر من او يساوى  :value',
        'file' => 'هذا الحقل يجب ان يكون اكبر من او يساوى  :value كيلو بايت',
        'string' => 'هذا الحقل يجب ان يكون اكبر من او يساوى  :value رموز',
        'array' => 'هذا الحقل يجب ان يكون اكبر من او يساوى  :value عنصر',
    ],
    'image' => 'The :attribute must be an image',
    'in' => 'القيمة المحددة غير صالحة',
    'in_array' => 'The :attribute field does not exist in :other',
    'integer' => 'هذا الحقل يجب أن يكون عددًا صحيحًا',
    'ip' => 'The :attribute must be a valid IP address',
    'ipv4' => 'The :attribute must be a valid IPv4 address',
    'ipv6' => 'The :attribute must be a valid IPv6 address',
    'json' => 'The :attribute must be a valid JSON string',
    'lt' => [
        'numeric' => 'هذا الحقل يجب ان يكون اصغر من  :value',
        'file' => 'هذا الحقل يجب ان يكون اصغر من  :value كيلو بايت',
        'string' => 'هذا الحقل يجب ان يكون اصغر من  :value رموز',
        'array' => 'هذا الحقل يجب ان يكون اصغر من  :value عنصر',
    ],
    'lte' => [
        'numeric' => 'هذا الحقل يجب ان يكون اصغر من او يساوى  :value',
        'file' => 'هذا الحقل يجب ان يكون اصغر من او يساوى  :value كيلو بايت',
        'string' => 'هذا الحقل يجب ان يكون اصغر من او يساوى  :value رموز',
        'array' => 'هذا الحقل يجب ان يكون اصغر من او يساوى  :value عنصر',
    ],
    'max' => [
        'numeric' => 'هذا الحقل قد لا يكون اكبر من :max',
        'file' => 'هذا الحقل قد لا يكون اكبر من :max كيلو بايت',
        'string' => 'هذا الحقل قد لا يكون اكبر من :max رموز',
        'array' => 'هذا الحقل قد لا يكون اكبر من :max عنصر',
    ],
    'mimes' => 'The :attribute must be a file of type: :values',
    'mimetypes' => 'The :attribute must be a file of type: :values',
    'min' => [
        'numeric' => 'هذا الحقل يجب ان يكون علي الاقل :min',
        'file' => 'هذا الحقل يجب ان يكون علي الاقل :min كيلو بايت',
        'string' => 'هذا الحقل يجب ان يكون علي الاقل :min رموز',
        'array' => 'هذا الحقل يجب ان يكون علي الاقل :min عنصر',
    ],
    'not_in' => 'القيمة المحددة غير صالحة',
    'not_regex' => 'The :attribute format is invalid',
    'numeric' => 'هذا الحقل يجب ان يكون رقم',
    'password' => 'كلمة المرور غير صحيحه',
    'present' => 'The :attribute field must be present',
    'regex' => 'The :attribute format is invalid',
    'required' => 'هذا الحقل مطلوب',
    'required_if' => 'The :attribute field is required when :other is :value',
    'required_unless' => 'The :attribute field is required unless :other is in :values',
    'required_with' => 'هذا الحقل مطلوب',
    'required_with_all' => 'The :attribute field is required when :values are present',
    'required_without' => 'The :attribute field is required when :values is not present',
    'required_without_all' => 'The :attribute field is required when none of :values are present',
    'same' => 'هذا الحقل يجب أن يتطابق مع تأكيده',
    'size' => [
        'numeric' => 'هذا الحقل يجب ان يكون :size',
        'file' => 'هذا الحقل يجب ان يكون :size كيلو بايت',
        'string' => 'هذا الحقل يجب ان يكون :size رموز',
        'array' => 'هذا الحقل يجب ان يحتوى :size عنصر',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values',
    'string' => 'هذا الحقل يجب ان يكون نصا',
    'timezone' => 'The :attribute must be a valid zone',
    'unique' => 'تم أخذ هذه القيمه بالفعل',
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
