<?php

namespace App\Policies;

use App\Models\Employee;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmployeePolicy
{
    use HandlesAuthorization;

    public function authorize(string $userId, Employee $employee): bool
    {
        return json_decode($userId)->_id === $employee->user_id;
    }

}
