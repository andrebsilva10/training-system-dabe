<?php

namespace Tests\Models;

use App\Models\Training;
use Tests\TestCase;

class TrainingTest extends TestCase
{
    public function testShouldSaveTraining(): void
    {
        $trainingName = 'Estudar composer';
        $training = new Training(name: $trainingName);

        $this->assertTrue($training->save());
        $this->assertNotEquals(-1, $training->getId());
        $this->assertEquals(1, sizeof(Training::all()));
    }

    public function testShouldReturnAllTheTrainings(): void
    {
        for ($i = 0; $i < 5; $i++) {
            $training = new Training(name: 'Training ' . $i);
            $training->save();
        }
        $this->assertEquals(5, sizeof(Training::all()));
    }
}