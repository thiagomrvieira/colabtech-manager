<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeResource;
use Illuminate\Support\Facades\Validator;
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
    public function store(Request $request): JsonResponse
    {
        // TODO: Move to a Form Request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'cpf' => 'required|string|size:14|unique:employees,cpf',
            'phone' => 'nullable|regex:/\(\d{2}\) \d{5}-\d{4}/',
            'skills' => 'required|array|min:1|max:3',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
        // TODO: Move to a Form Request

        $employee = Employee::create($request->all());

        return response()->json($employee, 201);
    }

    /**
     * Update an existing employee.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Employee $employee): JsonResponse
    {
        // TODO: Move to a Form Request
        $validator = Validator::make($request->all(), [
            'validated' => 'boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
        // TODO: Move to a Form Request

        $employee->update($request->all());

        return response()->json($employee, 200);
    }
}

