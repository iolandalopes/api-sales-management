<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Company;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected ProductService $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    public function store(StoreProductRequest $request, Company $company): JsonResponse
    {
        return response()->json($this->service->create($request->validated(), $company->id));
    }

    public function show(Company $company, Product $product): JsonResponse
    {
        return response()->json($this->service->show($company->id, $product->id));
    }

    public function update(UpdateProductRequest $request, Product $product): JsonResponse
    {
        return response()->json($this->service->update($product, $request->validated()));
    }

    public function destroy(Request $request, Product $product): JsonResponse
    {
        return response()->json($this->service->delete($product));
    }
}
