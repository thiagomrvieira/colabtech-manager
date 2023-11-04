<?php

namespace Tests\Feature;

// tests/Feature/EmployeeRoutesTest.php

use Tests\TestCase;
use App\Models\Employee;
use Database\Factories\EmployeeFactory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployeeRoutesTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_employee()
    {
        $employeeData = [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'cpf' => '12345678901',
        ];

        $response = $this->post('/api/v1/employees', $employeeData);

        $response->assertStatus(201); // Check if the response is a status 201 (Created).
        $this->assertDatabaseHas('employees', $employeeData); // Check if the data was inserted into the database.
    }

    public function test_list_employees()
    {
        $employee = EmployeeFactory::new()->create();

        $response = $this->get('/api/v1/employees');

        $response->assertStatus(200); // Check if the response is a status 200 (OK).
        $response->assertJson([$employee->toArray()]); // Check if the response contains the employee's data.
    }

    public function test_update_employee()
    {
        $employee = EmployeeFactory::new()->create();
        $newData = [
            'cpf' => '23456789012',
        ];

        $response = $this->put("/api/v1/employees/{$employee->id}", $newData);

        $response->assertStatus(200); // Check if the response is a status 200 (OK).
        $this->assertDatabaseHas('employees', $newData); // Check if the data was updated in the database.
    }
}
