<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'  => 'required|string',
            'description' => 'required|string',
            'price'   => 'required|numeric',
        ];
    }
}
