<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::resource('employees', EmployeeController::class)
        ->only(['store', 'index', 'update']);
});