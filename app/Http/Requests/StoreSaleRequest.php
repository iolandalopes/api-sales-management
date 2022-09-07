<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSaleRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'products'  => 'required|array',
        ];
    }
}
