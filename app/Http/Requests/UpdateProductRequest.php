<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'  => 'sometimes|string',
            'description' => 'sometimes|string',
            'price'   => 'sometimes|numeric',
        ];
    }
}
