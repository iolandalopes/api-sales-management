<?php

namespace Tests\Feature;

use App\Models\User;
use App\Traits\MongoRefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    public function testWhenCallRouteLoginResponse200(): void
    {
        Http::fake();

        User::factory()->make([
            'name' => 'Test Name',
            'email' => 'testing@email.com',
            'password' => '$2y$10$OFW5T3unA96DdNkAxhlb8e9iixRZwiPL7Din3ltccuTcckn8c8S3e',
        ]);

        $request = [
            'name' => 'Test Name',
            'email' => 'testing@email.com',
            'password' => '123',
        ];

        $userAuth = $this->postJson('api/login', $request);

        $userAuth->assertStatus(201);
    }

    public function testWhenCallRouteLoginResponse401()
    {
        $user =  User::factory()->make([
            'name' => 'Test Name',
            'email' => 'testing2@email.com',
            'password' => '123',
        ]);

        $request = [
            'email' => $user->email,
            'password' => '123',
        ];

        $user->createToken('LoggedUser')->plainTextToken;

        $this->postJson('api/login', $request)->assertUnauthorized();
    }
}
