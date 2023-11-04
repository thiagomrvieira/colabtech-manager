<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Employee;
use Database\Factories\EmployeeFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployeeControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_employee()
    {
        $employeeData = [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'cpf' => '12345678901',
        ];

        $response = $this->postJson('/api/v1/employees', $employeeData);

        $response->assertStatus(201)
            ->assertJson($employeeData);

        $this->assertDatabaseHas('employees', $employeeData);
    }

    public function test_list_employees()
    {
        EmployeeFactory::new()->count(5)->create();

        $response = $this->get('/api/v1/employees');

        $response->assertStatus(200)
            ->assertJsonCount(5);
    }

    public function test_update_employee()
    {
        $employee = EmployeeFactory::new()->create();
        $newData = [
            'name' => 'Updated Name',
            'email' => 'updated@example.com',
        ];

        $response = $this->putJson("/api/v1/employees/{$employee->id}", $newData);

        $response->assertStatus(200)
            ->assertJson($newData);

        $this->assertDatabaseHas('employees', $newData);
    }
}
