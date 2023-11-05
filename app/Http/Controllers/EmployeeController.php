<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class EmployeeController extends Controller
{

    /**
     * List all employees.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $employees = Employee::with('skills')->orderBy('name')->get();

        return EmployeeResource::collection($employees);
    }
    
    /**
     * Create a new employee.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(EmployeeStoreRequest $request): JsonResponse
    {
        $employee = Employee::create($request->validated());
    
        return response()->json($employee, 201);
    }

    /**
     * Update an existing employee.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(EmployeeUpdateRequest $request, Employee $employee): JsonResponse
    {
        $employee->update($request->validated());

        return response()->json($employee, 200);
    }
}

