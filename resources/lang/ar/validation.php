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

    'accepted'             => 'يجب أن يتم قبول :attribute',
    'active_url'           => ':attribute URL خاطئ',
    'after'                => 'يجب أن يكون :attribute بعد  :date',
    'after_or_equal'       => ' يجب أن يكون :attribute بعد أو مساوي  :date ',
    'alpha'                => 'يجب أن يحوي :attribute على حروف فقط',
    'alpha_dash'           => 'يجب أن يحتوي :attribute على حروف و أرقام و داش',
    'alpha_num'            => 'يجب أن يحتوي :attribute على حروف و أرقام فقط',
    'array'                => 'يجب أن يكون :attribute مجموعة',
    'before'               => 'يجب أن يكون تاريخ :attribute قبل :date ',
    'before_or_equal'      => 'يجب أن يكون تاريخ :attribute قبل أو مساوي ل:date',
    'between'              => [
        'numeric' => 'يجب أن يكون :attribute ما بين :max و  :min',
        'file'    => 'يجب أن يكون حجم :attribute ما بين :max و :min كيلوبايت',
        'string'  => 'يجب أن يكون :attribute ما بين :min و :max حروف',
        'array'   => 'يجب أن يكون عدد بنود :attribute بين :min و :max',
    ],
    'boolean'              => 'يجب أن يكون :attribute صح أو خطأ',
    'confirmed'            => ':attribute غير متطابق مع التأكيد',
    'date'                 => ':attribute ليس تاريخاً صحيحاً',
    'date_format'          => ':attribute لا يطابق الصيغة :format',
    'different'            => 'يجب ألا يتطابق :attribute و :other',
    'digits'               => 'يجب أن يكون :attribute :digits رقم',
    'digits_between'       => 'يجب أن يكون :attribute بين :max و :min رقم',
    'dimensions'           => 'أبعاد الصورة :attribute غير صالحة.',
    'distinct'             => 'يحتوي :attribute على قيمة مكررة.',
    'email'                => 'يجب أن يكون :attribute بريداً إلكترونياً صالحاً.',
    'exists'               => 'ال:attribute المنتخب غير صالح',
    'file'                 => 'يجب أن يكون :attribute ملفاً',
    'filled'               => 'إدراج :attribute اجباري',
    'image'                => 'يجب أن يكون :attribute صورة',
    'in'                   => 'ال:attribute المنتخب غير صالح',
    'in_array'             => ' :attribute غير موجود في :other',
    'integer'              => 'يجب أن يكون :attribute عدداً',
    'ip'                   => 'يجب أن يكون :attribute IP صالح',
    'ipv4'                 => 'يجب أن يكون :attribute IPv4 صالح',
    'ipv6'                 => 'يجب أن يكون :attribute IPv6 صالح',
    'json'                 => 'يجب أن يكون :attribute json string صالح',
    'max'                  => [
        'numeric' => 'لا يجب أن يكون :attribute أكبر من :max',
        'file'    => 'يجب ألا يكون حجم :attribute أكبر من :max كيلوبايت',
        'string'  => 'يجب ألا يكون طول :attribute أكبر من :max حروف',
        'array'   => 'يجب ألا يكون عدد بنود :attribute اكبر من :max',
    ],
    'mimes'                => 'يجب أن يكون ملف :attribute من نوع : :values',
    'mimetypes'            => ' يجب أن يكون ملف :attribute من نوع : :values ',
    'min'                  => [
        'numeric' => 'يجب أن يكون :attribute أكبر من :min',
        'file'    => 'يجب أن يكون حجم :attribute أكبر من :min كيلوبايت',
        'string'  => 'يجب أن يكون طول :attribute على الأقل :min حروف',
        'array'   => ' يجب ألا يكون عدد بنود :attribute أصغر من :max ',
    ],
    'not_in'               => ' ال:attribute المنتخب غير صالح ',
    'numeric'              => 'يجب أن يكون :attribute عدداً',
    'present'              => 'یجب ملء :attribute',
    'regex'                => 'صيغة :attribute غير صالحة',
    'required'             => ' یجب ملء :attribute ',
    'required_if'          => 'ملء :attribute اجباري عندما يكون :other :value',
    'required_unless'      => 'ملء :attribute إجباري ما لم يكن :other ضمن :values',
    'required_with'        => 'يجب ملء :attribute عندما يكون :values موجود',
    'required_with_all'    => ' يجب ملء :attribute عندما يكون :values موجود ',
    'required_without'     => 'يجب ملء :attribute عندما لا يكون :values موجود',
    'required_without_all' => 'يجب ملء :attribute عندما لا يكون أي من :values موجود',
    'same'                 => 'يجب أن يتطابق :attribute و :other',
    'size'                 => [
        'numeric' => 'يجب أن يكون :attribute :size',
        'file'    => 'يجب أن يكون حجم :attribute :size كيلوبايت',
        'string'  => 'يجب أن يكون طول :attribute :size حرف',
        'array'   => 'يجب أن يحتوي :attribute على :size بنود',
    ],
    'string'               => 'يجب أن يكون :attribute كلمة',
    'timezone'             => 'يجب أن تكون :attribute منطقة صالحة',
    'unique'               => 'تم تثبيت :attribute مسبقاً',
    'uploaded'             => 'لم يتم تحميل :attribute بنجاح',
    'url'                  => 'صيغة :attribute غير صالحة',

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
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];