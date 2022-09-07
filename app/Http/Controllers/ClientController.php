<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use App\Models\Company;
use App\Services\ClientService;
use Illuminate\Http\JsonResponse;

class ClientController extends Controller
{
    protected ClientService $service;

    public function __construct(ClientService $service)
    {
        $this->service = $service;
    }

    public function store(StoreClientRequest $request, Company $company): JsonResponse
    {
        return response()->json($this->service->create($request->validated(), $company->id));
    }

    public function show(Company $company, Client $client): JsonResponse
    {
        return response()->json($this->service->show($company->id, $client->id));
    }

    public function update(UpdateClientRequest $request, Client $client): JsonResponse
    {
        $this->authorize('authorize', $client);

        return response()->json($this->service->update($client, $request->validated()));
    }

    public function destroy(Client $client): JsonResponse
    {
        $this->authorize('authorize', $client);

        return response()->json($this->service->delete($client));
    }
}
