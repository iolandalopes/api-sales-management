<?php

namespace App\Services;

use App\Models\Client;
use Illuminate\Database\Eloquent\Model;

class ClientService
{
    public function create(array $data, string $companyId): Model
    {
        $data = array_merge($data, [
            'userId' => auth()->user()->id,
            'companyId' => $companyId
        ]);
        return Client::create($data);
    }

    public function show(string $company, string $clientId): Model
    {
        return Client::where('companyId', $company)->find($clientId);
    }

    public function update(Client $client, array $data): bool
    {
        return $client->update($data);
    }

    public function delete(Client $client): ?bool
    {
        return $client->delete();
    }
}
