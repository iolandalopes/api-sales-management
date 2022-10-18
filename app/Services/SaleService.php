<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Database\Eloquent\Model;

class SaleService
{
    public $total;

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
        $this->total = 0;
        $itens = [];

        $itens = collect($data['products'])->map(function ($value) {
            $product = Product::find($value['_id']);

            $item['name'] = $product->name;
            $item['price'] = $product->price;
            $item['quantity'] = $value['quantity'];
            $item['totalItem'] = $product->price * $value['quantity'];
            $this->total += $item['totalItem'];
            $itens[] = $item;

            return $item;
        });

        $data = [
            'products' => $itens,
            'userId' => auth()->user()->id,
            'companyId' => $company,
            'clientId' => $client,
            'total' => $this->total,
        ];

        return $data;
    }
}
