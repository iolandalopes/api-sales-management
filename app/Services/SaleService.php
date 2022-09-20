<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Database\Eloquent\Model;

class SaleService
{
    public function create(array $data, string $companyId, string $clientId): Model
    {
        return Sale::create($this->generateSale($data, $companyId, $clientId));
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

    public function generateSale(array $data, string $company, string $client): array
    {
        $itens = [];

        $totalValue = 0;

        foreach ($data['products'] as $item) {
            $product = Product::find($item['_id']);
            $totalValue += $product->price * $item['quantity'];
            $item['name'] = $product->name;
            $item['price'] = $product->price;
            $item['totalItem'] = $product->price * $item['quantity'];
            $itens[] = $item;
        }

        $data = [
            'products' => $itens,
            'userId' => auth()->user()->id,
            'companyId' => $company,
            'clientId' => $client,
            'total' => $totalValue,
        ];

        return $data;
    }
}
