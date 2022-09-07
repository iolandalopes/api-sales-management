<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            '_id' => 'd95b209c-28bf-11ed-a261-0242ac120002',
            'name' => 'Ana Maria',
            'email' => 'seed@gmail.com',
            'password' => Hash::make('password'),
            'isAdmin' => true,
            'companyId' => 'ca7f10f5-e07b-47b1-9c71-df28ead65cf3',
        ]);
    }
}
