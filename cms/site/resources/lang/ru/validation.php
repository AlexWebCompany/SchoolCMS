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

    'accepted'             => ':attribute должен быть принят.',
    'active_url'           => ':attribute является не допустимым URL',
    'after'                => ':attribute должен быть после :date.',
    'alpha'                => ':attribute может содержать только буквы.',
    'alpha_dash'           => ':attribute может содержать только буквы, цифры и дефисы.',
    'alpha_num'            => ':attribute может содержать только буквы и цифры.',
    'array'                => ':attribute должен быть массивом.',
    'before'               => ':attribute должен быть до :date.',
    'between'              => [
        'numeric' => ':attribute должен быть между :min и :max.',
        'file'    => ':attribute должен быть между :min и :max килобайтами.',
        'string'  => ':attribute должен быть между :min и :max символами.',
        'array'   => ':attribute должен быть между :min и :max предметами.',
    ],
    'boolean'              => ':attribute должно быть активно или не активно.',
    'confirmed'            => ':attribute Подтверждение не совпадает.',
    'date'                 => ':attribute не является действительной датой.',
    'date_format'          => ':attribute не соответствует формату :format.',
    'different'            => ':attribute и :other должны быть разными.',
    'digits'               => ':attribute должно быть :digits цифрами.',
    'digits_between'       => ':attribute должен быть между :min и :max цифрами.',
    'dimensions'           => ':attribute Недействительные размеры изображения.',
    'distinct'             => ':attribute имеет повторяющееся значение.',
    'email'                => ':attribute адрес эл. почты должен быть действительным',
    'exists'               => 'выбранный :attribute недействительным.',
    'file'                 => ':attribute должен быть файл.',
    'filled'               => ':attribute обязательно для заполнения.',
    'image'                => ':attribute должно быть изображение.',
    'in'                   => 'выбранный :attribute недействительным.',
    'in_array'             => ':attribute не существует в :other.',
    'integer'              => ':attribute должно быть целым числом.',
    'ip'                   => ':attribute должен быть действительный IP-адрес.',
    'json'                 => ':attribute должна быть действительной строкой JSON.',
    'max'                  => [
        'numeric' => ':attribute не может быть больше, чем :max.',
        'file'    => ':attribute не может быть больше, чем :max килобайтов.',
        'string'  => ':attribute не может быть больше, чем :max символов.',
        'array'   => ':attribute не может иметь более :max предметов.',
    ],
    'mimes'                => ':attribute должен быть файл type: :values.',
    'mimetypes'            => ':attribute должен быть файл type: :values.',
    'min'                  => [
        'numeric' => ':attribute должен быть не менее :min.',
        'file'    => ':attribute должен быть не менее :min килобайтов.',
        'string'  => ':attribute должен быть не менее :min символов.',
        'array'   => ':attribute должны иметь по крайней мере, :min предметов.',
    ],
    'not_in'               => 'выбранный :attribute недействительным.',
    'numeric'              => ':attribute должен быть числом.',
    'present'              => ':attribute должен присутствовать.',
    'regex'                => ':attribute формат является недействительным.',
    'required'             => ':attribute обязательно для заполнения.',
    'required_if'          => ':attribute обязательно для заполнения, когда :other является :value.',
    'required_unless'      => ':attribute не требуется, если :other в :values.',
    'required_with'        => ':attribute обязательно для заполнения, когда :values существует.',
    'required_with_all'    => ':attribute обязательно для заполнения :values существует.',
    'required_without'     => ':attribute обязательно для заполнения :values is not present.',
    'required_without_all' => ':attribute поле обязательно для заполнения, если ни один из :values не существует.',
    'same'                 => ':attribute and :other must match.',
    'size'                 => [
        'numeric' => ':attribute должен быть :size.',
        'file'    => ':attribute должен быть :size килобайтов.',
        'string'  => ':attribute должен быть :size символов.',
        'array'   => ':attribute должен быть :size предметов.',
    ],
    'string'               => ':attribute должен быть строкой.',
    'timezone'             => ':attribute должен быть действительным зона.',
    'unique'               => ':attribute уже был взят.',
    'uploaded'             => ':attribute не удалось загрузить.',
    'url'                  => ':attribute формат является недействительным.',

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
