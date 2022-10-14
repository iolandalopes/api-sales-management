<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'   => 'required|string',
            'code'   => 'required|int|digits:14',
            'isActive' => 'required|boolean'
        ];
    }
}
