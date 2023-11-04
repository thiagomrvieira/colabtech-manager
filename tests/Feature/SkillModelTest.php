<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Skill;
use Database\Factories\SkillFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SkillModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_skill_model()
    {
        $skill = SkillFactory::new()->create();

        $this->assertInstanceOf(Skill::class, $skill);
        $this->assertNotNull($skill->name);
    }

}