<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use App\Services\EmployeeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        if($employee) {
            $response = [
                'employee' => $employee,
                'user' => $employee->user,
            ];
        }
        return $response;
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
}
