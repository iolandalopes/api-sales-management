<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'  => 'required|string',
            'email' => 'required|email',
            'cpf'   => 'required|string|digits:11|unique:clients,cpf',
        ];
    }
}
