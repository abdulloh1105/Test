<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|unique:products,name,'.$this->segment(3),
            'price' => 'required',
            'shop_id' => 'required',
            'description' => 'sometimes'
        ];
    }
}
