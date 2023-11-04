<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SkillSeeder extends Seeder
{
    /**
     * Create Skills
     */
    public function run()
    {
        $skills = ['Git', 'React', 'PHP', 'NodeJS', 'DevOps', 'Banco de Dados', 'TypeScript'];

        foreach ($skills as $skillName) {
            Skill::firstOrCreate(['name' => $skillName]);
        }
    }
}
