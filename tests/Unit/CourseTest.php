<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class CourseTest extends TestCase
{
        
public function test_curso_tiene_cupo_valido()
{
    $course = new \App\Models\Course([
        'capacity' => 10
    ]);

    $this->assertTrue($course->capacity > 0);
}

}