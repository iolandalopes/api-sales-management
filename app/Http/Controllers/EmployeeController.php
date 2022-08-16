<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Imports\EmployeesImport;
use App\Models\Employee;
use App\Services\EmployeeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{
    protected EmployeeService $service;

    public function __construct(EmployeeService $service)
    {
        $this->service = $service;
    }

    public function store(StoreEmployeeRequest $request): JsonResponse
    {
        return response()->json($this->service->create($request->validated()));
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee): JsonResponse
    {
        $this->authorize('employee', [$employee, $request->user_id]);

        return response()->json($this->service->update($employee, $request->validated()));
    }

    public function destroy(Request $request, Employee $employee): JsonResponse
    {
        $this->authorize('employee', [$employee, $request->user_id]);

        return response()->json($this->service->delete($employee));
    }

    public function import(Request $request): JsonResponse
    {
        Excel::import(new EmployeesImport, $request->file);

        return response()->json('Success');
    }
}
