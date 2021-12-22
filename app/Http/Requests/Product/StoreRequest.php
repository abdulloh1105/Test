<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|unique:products,name',
            'price' => 'required',
            'shop_id' => 'required',
            'description' => 'sometimes'
        ];
    }
}
