<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class ProductService
{
    public function create(array $data, string $companyId): Model
    {
        $data = array_merge($data, [
            'companyId' => $companyId
        ]);
        return Product::create($data);
    }

    public function show(string $company, string $product): Model
    {
        return Product::where('companyId', $company)->find($product);
    }

    public function update(Product $product, array $data): bool
    {
        return $product->update($data);
    }

    public function delete(Product $product): ?bool
    {
        return $product->delete();
    }
}
