<?php

namespace App\Shop\Products\Requests;

use App\Shop\Base\BaseFormRequest;

class CreateProductRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'sku' => ['required'],
            'name_fa' => ['required', 'unique:products'],
            'name_en' => ['required', 'unique:products'],
            'name_ar' => ['required', 'unique:products'],
            'name_tr' => ['required', 'unique:products'],
            'price' => ['required'],
            'cover' => ['required', 'file', 'image:png,jpeg,jpg,gif'],
            'categories' => ['required'],
            'description_fa' => ['required'],
            'description_en' => ['required'],
            'description_ar' => ['required'],
            'description_tr' => ['required'],
        ];
    }
}
