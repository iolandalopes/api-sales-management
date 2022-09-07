<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'  => 'sometimes|string',
            'email' => 'sometimes|email',
            'cpf'   => 'sometimes|string|digits:11|unique:clients,cpf',
        ];
    }
}
