<?php

namespace App\Shop\Products\Requests;

use App\Shop\Base\BaseFormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 'sku' => ['required'],
            'name_fa' => ['required', Rule::unique('products')->ignore($this->segment(3))],
            'name_en' => ['required', Rule::unique('products')->ignore($this->segment(3))],
            'name_ar' => ['required', Rule::unique('products')->ignore($this->segment(3))],
            'name_tr' => ['required', Rule::unique('products')->ignore($this->segment(3))],
            'price' => ['required'],
            // 'cover' => ['required', 'file', 'image:png,jpeg,jpg,gif'],
            'categories' => ['required'],
            'description_fa' => ['required'],
            'description_en' => ['required'],
            'description_ar' => ['required'],
            'description_tr' => ['required'],
        ];
    }
}
