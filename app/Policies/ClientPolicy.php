<?php

namespace App\Policies;

use App\Models\Client;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;

class ClientPolicy
{
    use HandlesAuthorization;

    public function authorize(User $user, Client $client): Response
    {
        return $user->id === $client->userId || auth()->user()->isAdmin
            ? Response::allow()
            : Response::deny('You do not owner this client');

        $response = Gate::inspect('update', $client);

        $response ? $response->allowed() : $response->message();
    }
}
