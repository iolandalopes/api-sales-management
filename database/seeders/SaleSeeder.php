<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SaleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('sales')->updateOrInsert([
            'products' => [
                [
                    'productId' => 'c5cd59d4-28c2-11ed-a261-0242ac120002',
                    'price' => 122.45,
                    'quantity' => 1,
                ],
                [
                    'productId' => '60e5e1cc-28c1-11ed-a261-0242ac120002',
                    'price' => 99.90,
                    'quantity' => 1,
                ]
            ],
            'total' => 222,35,
            'userId' => 'd95b209c-28bf-11ed-a261-0242ac120002',
            'companyId' => 'ca7f10f5-e07b-47b1-9c71-df28ead65cf3',
            'clientId' => '',
        ]);
    }
}
