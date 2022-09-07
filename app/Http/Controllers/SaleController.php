<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use App\Models\Company;
use App\Models\Sale;
use App\Services\SaleService;
use Illuminate\Http\JsonResponse;

class SaleController extends Controller
{
    protected SaleService $service;

    public function __construct(SaleService $service)
    {
        $this->service = $service;
    }

    public function store(StoreSaleRequest $request, Company $company, Client $client): JsonResponse
    {
        return response()->json($this->service->create($request->validated(), $company->id, $client->id));
    }

    public function show(Company $company, Client $client): JsonResponse
    {
        return response()->json($this->service->show($company->id, $client->id));
    }

    public function update(UpdateClientRequest $request, Sale $sale): JsonResponse
    {
        // $this->authorize('authorize', $client);

        return response()->json($this->service->update($sale, $request->validated()));
    }

    public function destroy(Sale $sale): JsonResponse
    {
        // $this->authorize('authorize', $client);

        return response()->json($this->service->delete($sale));
    }
}
