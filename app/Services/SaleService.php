<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Database\Eloquent\Model;

class SaleService
{
    public function create(array $data, string $companyId, string $clientId): Model
    {
        $itens = [];

        $totalItem = 0;

        foreach ($data['products'] as $item) {
            $product = Product::find($item['_id']);
            $totalItem += $product->price * $item['quantity'];
            $item['name'] = $product->name;
            $itens[] = $item;
        }

        $data = [
            'products' => $itens,
            'userId' => auth()->user()->id,
            'companyId' => $companyId,
            'clientId' => $clientId,
            'total' => $totalItem,
        ];

        return Sale::create($data);
    }

    public function show(string $company, string $sale): Model
    {
        return Sale::where('companyId', $company)->find($sale);
    }

    public function update(Sale $sale, array $data): bool
    {
        return $sale->update($data);
    }

    public function delete(Sale $sale): ?bool
    {
        return $sale->delete();
    }
}
