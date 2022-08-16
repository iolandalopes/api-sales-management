<?php

namespace App\Observers;

use App\Mail\Welcome;
use App\Models\Employee;
use Illuminate\Support\Facades\Mail;

class EmployeeObserver
{
    public function created(Employee $employee): void
    {
        Mail::to($employee)->send(new Welcome($employee));
    }
}
