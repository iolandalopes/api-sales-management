<?php

namespace App\Services;

use App\Models\Employee;

class EmployeeService
{
    public function create(array $data)
    {
        $data = array_merge($data, ['user_id' => auth()->user()->id]);


        return Employee::create($data);
    }

    public function update(Employee $employee, array $data): bool
    {
        return $employee->update($data);
    }

    public function delete(Employee $employee): ?bool
    {
        return $employee->delete();
    }
}
