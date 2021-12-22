<?php

namespace App\Http\Requests\Shop;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|unique:shops,name,'.$this->segment(3),
            'description' => 'sometimes'
        ];
    }
}
