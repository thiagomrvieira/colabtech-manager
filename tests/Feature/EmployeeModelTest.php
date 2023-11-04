<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Employee;
use Database\Factories\EmployeeFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;


class EmployeeModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_employee_model()
    {
        $employee = EmployeeFactory::new()->create();

        $this->assertInstanceOf(Employee::class, $employee);
        $this->assertNotNull($employee->name); 
        $this->assertNotNull($employee->email);
        $this->assertNotNull($employee->cpf); 
    }
}