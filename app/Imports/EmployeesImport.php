<?php

namespace App\Imports;

use App\Models\Employee;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployeesImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            Employee::Create([
                'name' => $row['nome'],
                'email' => $row['email'],
                'cpf' => $row['cpf'],
                'user_id' => auth()->user()->id,
            ]);
        }
    }
}
