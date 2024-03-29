<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request, Company $company)
    {
        $fields = $request->validate([
            'name'  => 'required|string',
            'isAdmin' => 'required|boolean',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed',
        ]);

        $user = User::create([
           'name' => $fields['name'],
           'isAdmin' => $fields['isAdmin'],
           'companyId' => $company->id,
           'email' => $fields['email'],
           'password' => bcrypt($fields['password']),
        ]);

        $token = $user->createToken($request->nameToken)->plainTextToken;

        $response = [
            'user' => $user,
            'api_token' => $token,
        ];

        return response($response, 201);
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $fields['email'])->first();

        $company = Company::where('_id', $user->companyId)->first();

        if (!$company->isActive) {
            return response([
                'message' => 'Empresa inativa!',
            ], 403);
        }

        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'E-mail ou senha inválidos!',
            ], 401);
        }

        $token = $user->createToken('LoggedUser')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
        ];

        return response($response, 201);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response([
            'message' => 'Até breve!'
        ], 200);
    }

}
