<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Course;
use App\Models\Enrollment;

class EnrollmentTest extends TestCase
{
    use RefreshDatabase;

    /*
    |--------------------------------------------------------------------------
    | CASO 1: MATRÍCULA DUPLICADA
    |--------------------------------------------------------------------------
    | Un estudiante NO debería matricular el mismo curso dos veces
    */

    /** @test */
    public function estudiante_no_puede_matricular_dos_veces_el_mismo_curso()
    {
        // PASO 1: Existe un estudiante
        $student = User::factory()->create([
            'role' => 'student'
        ]);

        // PASO 2: Existe un curso
        $course = Course::factory()->create([
            'capacity' => 30
        ]);

        // PASO 3: Primera matrícula (válida)
        $this->actingAs($student)
             ->post(route('enroll', $course->id));

        // PASO 4: Segunda matrícula (debería FALLAR)
        $this->actingAs($student)
             ->post(route('enroll', $course->id));

        // PASO 5: Validación del sistema
        // El sistema SOLO debería tener UNA matrícula
        $this->assertEquals(
            1,
            Enrollment::where('user_id', $student->id)
                      ->where('course_id', $course->id)
                      ->count()
        );
    }

    /*
    |--------------------------------------------------------------------------
    | CASO 2: CUPO AGOTADO
    |--------------------------------------------------------------------------
    | Un curso NO debería permitir más matrículas que su capacidad
    */

    /** @test */
    public function no_se_puede_matricular_un_curso_sin_cupo()
    {
        // PASO 1: Curso con cupo 1
        $course = Course::factory()->create([
            'capacity' => 1
        ]);

        // PASO 2: Primer estudiante
        $studentA = User::factory()->create(['role' => 'student']);
        $this->actingAs($studentA)
             ->post(route('enroll', $course->id));

        // PASO 3: Segundo estudiante
        $studentB = User::factory()->create(['role' => 'student']);
        $this->actingAs($studentB)
             ->post(route('enroll', $course->id));

        // PASO 4: Validación del sistema
        // SOLO debe existir una matrícula
        $this->assertEquals(
            1,
            Enrollment::where('course_id', $course->id)->count()
        );
    }
}
