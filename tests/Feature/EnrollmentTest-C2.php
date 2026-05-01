<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Course;

class EnrollmentTest extends TestCase
{
    /*
    |--------------------------------------------------------------------------
    | PRUEBA DE INTEGRACIÓN
    |--------------------------------------------------------------------------
    | Esta prueba valida el SISTEMA, no el test:
    | - Usa base de datos
    | - Usa migraciones
    | - Usa autenticación
    | - Ejecuta una acción real del sistema
    */

    use RefreshDatabase;

    /** @test */
    public function estudiante_puede_matricular_un_curso()
    {
        /*
        |-----------------------------------------------------------
        | PASO 1: EXISTE UN ESTUDIANTE EN EL SISTEMA
        |-----------------------------------------------------------
        | Esto simula que el sistema tiene un usuario registrado
        */
        $student = User::factory()->create([
            'role' => 'student'
        ]);

        /*
        |-----------------------------------------------------------
        | PASO 2: EXISTE UN CURSO DISPONIBLE
        |-----------------------------------------------------------
        | El sistema ya tiene un curso creado
        */
        $course = Course::factory()->create([
            'capacity' => 30
        ]);

        /*
        |-----------------------------------------------------------
        | PASO 3: EL ESTUDIANTE EJECUTA UNA ACCIÓN REAL
        |-----------------------------------------------------------
        | Simulamos:
        | - el usuario inicia sesión
        | - envía una petición POST para matricularse
        */
        $response = $this->actingAs($student)
                         ->post(route('enroll', $course->id));

        /*
        |-----------------------------------------------------------
        | PASO 4: VALIDAMOS EL EFECTO EN EL SISTEMA
        |-----------------------------------------------------------
        | La pregunta clave del QA:
        | ¿El sistema guardó la matrícula?
        */
        $this->assertDatabaseHas('enrollments', [
            'user_id'   => $student->id,
            'course_id' => $course->id,
        ]);
    }
}
