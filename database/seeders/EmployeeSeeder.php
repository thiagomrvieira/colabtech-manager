<?php

namespace Database\Seeders;

use App\Models\Skill;
use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as FakerFactory;


class EmployeeSeeder extends Seeder
{
    /**
     * Create Employees
     */
    public function run()
    {
        $faker = FakerFactory::create();
        $numberOfEmployees = 10;

        for ($i = 0; $i < $numberOfEmployees; $i++) {
            $employee = Employee::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'cpf' => $faker->unique()->numerify('###########'),
            ]);
            
            $this->attachRandomSkills($employee);
        }
    }

    /**
     * Attach a random selection of skills to the employee.
     *
     * @param \App\Employee $employee The employee to associate skills with.
     * @return void
     */
    private function attachRandomSkills(Employee $employee)
    {
        $skills = Skill::inRandomOrder()->limit(rand(1, 3))->get();
        $employee->skills()->attach($skills);
    }

}
