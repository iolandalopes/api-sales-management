<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::post('/employees', [EmployeeController::class, 'store'])->name('employeeStore');
    Route::get('/employees/{employeeId}', [EmployeeController::class, 'show'])->name('employeeShow');
    Route::put('/employees/{employeeId}', [EmployeeController::class, 'update'])->name('employeeUpdate');
    Route::delete('/employees/{employeeId}', [EmployeeController::class, 'destroy'])->name('employeeDestroy');
    Route::post('/import', [EmployeeController::class, 'import']);

    Route::post('logout', [AuthController::class, 'logout']);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::post('/companies', [CompanyController::class, 'store']);
Route::get('/companies/{company}', [CompanyController::class, 'show']);
Route::put('/companies/{company}', [CompanyController::class, 'update']);
Route::delete('/companies/{company}', [CompanyController::class, 'destroy']);
