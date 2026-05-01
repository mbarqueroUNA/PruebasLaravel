<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Course;

class SqlInjectionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function sql_injection_can_break_the_query()
    {
        // PASO 1: Crear datos normales
        Course::factory()->create(['name' => 'Math']);
        Course::factory()->create(['name' => 'Physics']);

        // PASO 2: Payload malicioso
        $payload = "' OR '1'='1";

        // PASO 3: Ejecutar petición vulnerable
        $response = $this->post('/demo-sql', [
            'name' => $payload
        ]);

        // PASO 4: Verificar que devolvió MÁS resultados de los esperados
        $this->assertGreaterThan(
            1,
            count($response->json())
        );
    }
}