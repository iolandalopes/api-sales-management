<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('companies')->insert([
            '_id' => 'ca7f10f5-e07b-47b1-9c71-df28ead65cf3',
            'name' => 'Company LTDA',
            'code' => 123021454777,
            'status' => 'active',
        ]);
    }
}
