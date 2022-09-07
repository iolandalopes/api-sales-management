<?php

namespace App\Services;

use App\Models\Employee;
use Jenssegers\Mongodb\Eloquent\Model;

class EmployeeService
{
    public function create(array $data, string $companyId): Model
    {
        $data = array_merge($data, [
            'user_id' => auth()->user()->id,
            'companyId' => $companyId,
        ]);

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
