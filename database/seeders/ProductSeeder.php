<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->updateOrInsert([
            '_id' => 'c5cd59d4-28c2-11ed-a261-0242ac120002',
            'name' => 'Camisa polo',
            'description' => '',
            'price' => 122.45,
            'companyId' => 'ca7f10f5-e07b-47b1-9c71-df28ead65cf3',
        ]);

        DB::table('products')->updateOrInsert([
            '_id' => '60e5e1cc-28c1-11ed-a261-0242ac120002',
            'name' => 'Camisa polo',
            'description' => '',
            'price' => 99.90,
            'companyId' => 'ca7f10f5-e07b-47b1-9c71-df28ead65cf3',
        ]);
    }
}
