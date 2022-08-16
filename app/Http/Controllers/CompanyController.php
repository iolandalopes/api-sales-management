<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use App\Services\CompanyService;
use Illuminate\Http\JsonResponse;

class CompanyController extends Controller
{
    protected CompanyService $service;

    public function __construct(CompanyService $service)
    {
        $this->service = $service;
    }

    public function store(StoreCompanyRequest $request): JsonResponse
    {
        return response()->json($this->service->create($request->validated()));
    }

    public function update(UpdateCompanyRequest $request, Company $company): JsonResponse
    {
        return response()->json($this->service->update($company, $request->validated()));
    }

    public function destroy(Company $company): JsonResponse
    {
        return response()->json($this->service->delete($company));
    }
}
