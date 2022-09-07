<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::post('/companies/{company}/employees', [EmployeeController::class, 'store'])->name('employeeStore');
    Route::get('/employees/{employeeId}', [EmployeeController::class, 'show'])->name('employeeShow');
    Route::put('/employees/{employeeId}', [EmployeeController::class, 'update'])->name('employeeUpdate');
    Route::delete('/employees/{employeeId}', [EmployeeController::class, 'destroy'])->name('employeeDestroy');
    Route::post('/import', [EmployeeController::class, 'import']);

    Route::post('companies/{company}/clients', [ClientController::class, 'store']);
    Route::get('companies/{company}/clients/{client}', [ClientController::class, 'show']);
    Route::put('/clients/{client}', [ClientController::class, 'update']);
    Route::delete('/clients/{client}', [ClientController::class, 'destroy']);

    Route::post('companies/{company}/products', [ProductController::class, 'store']);
    Route::get('companies/{company}/products/{product}', [ProductController::class, 'show']);
    Route::put('/products/{product}', [ProductController::class, 'update']);
    Route::delete('/products/{product}', [ProductController::class, 'destroy']);

    Route::post('companies/{company}/clients/{client}/sales', [SaleController::class, 'store']);
    Route::get('companies/{company}/clients/{client}/sales/{sale}', [SaleController::class, 'show']);
    Route::put('/sales/{sale}', [SaleController::class, 'update']);
    Route::delete('/sales/{sale}', [SaleController::class, 'destroy']);

    Route::post('logout', [AuthController::class, 'logout']);
});

Route::post('companies/{company}/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::post('/companies', [CompanyController::class, 'store']);
Route::get('/companies/{company}', [CompanyController::class, 'show']);
Route::put('/companies/{company}', [CompanyController::class, 'update']);
Route::delete('/companies/{company}', [CompanyController::class, 'destroy']);
