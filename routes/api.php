<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::post('/employee', [EmployeeController::class, 'store'])->name('store');
    Route::get('/employee/{employee}', [EmployeeController::class, 'show'])->name('show');
    Route::put('/employee/{employee}', [EmployeeController::class, 'update'])->name('update');
    Route::delete('/employee/{employee}', [EmployeeController::class, 'destroy'])->name('destroy');

    Route::post('logout', [AuthController::class, 'logout']);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
