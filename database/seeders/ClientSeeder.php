<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('clients')->updateOrInsert([
            '_id' => 'c5cd59d4-28c2-11ed-a261-0242ac120002',
            'name' => 'Client ONE',
            'email' => 'client@gmail.com',
            'cpf' => '06945623495',
            'userId' => 'd95b209c-28bf-11ed-a261-0242ac120002',
            'companyId' => 'ca7f10f5-e07b-47b1-9c71-df28ead65cf3',
        ]);
    }
}
