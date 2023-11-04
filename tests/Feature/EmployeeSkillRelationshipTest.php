<?php

namespace Tests\Feature;

use Tests\TestCase;
use Database\Factories\SkillFactory;
use Database\Factories\EmployeeFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployeeSkillRelationshipTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_employee_has_skills_relationship()
    {
        $employee = EmployeeFactory::new()->create();
        $skills = SkillFactory::new()->count(3)->create();

        $employee->skills()->attach($skills);

        $this->assertCount(3, $employee->skills);
    }

    public function test_skill_belongs_to_employees_relationship()
    {
        $employee = EmployeeFactory::new()->create();
        $skills = SkillFactory::new()->count(3)->create();

        $employee->skills()->attach($skills);

        foreach ($skills as $skill) {
            $this->assertTrue($employee->skills->contains($skill));
        }
    }

}

