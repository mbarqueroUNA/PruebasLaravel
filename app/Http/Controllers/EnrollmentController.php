<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
/* 
public function store($courseId)
    {
        
        $course = Course::find($courseId);

        Enrollment::create([
            'user_id' => Auth::id(),
            //prueba JMETER
            'course_id' => $course->id,
        ]);

        return back()->with('success', 'Matrícula realizada con éxito.');
    }
*/

/*

public function store($courseId)
{
    $userId = auth()->id();

    // 1️⃣ Bloquear matrícula duplicada
    $alreadyEnrolled = Enrollment::where('user_id', $userId)
        ->where('course_id', $courseId)
        ->exists();

    if ($alreadyEnrolled) {
        return back()->withErrors('Ya estás matriculado en este curso.');
    }

    // 2️⃣ Obtener el curso
    $course = Course::findOrFail($courseId);

    // 3️⃣ Contar matrículas actuales
    $currentEnrollments = Enrollment::where('course_id', $courseId)->count();

    // 4️⃣ Validar cupo
    if ($currentEnrollments >= $course->capacity) {
        return back()->withErrors('El curso no tiene cupos disponibles.');
    }

    // 5️⃣ Crear matrícula SOLO SI TODO ES VÁLIDO
    Enrollment::create([
        'user_id' => $userId,
        'course_id' => $courseId,
    ]);

    return back()->with('success', 'Matrícula realizada con éxito.');
}


*/

//JMETER prueba de rendimiento

public function store($courseId)
{
    sleep(29);
    // 1️⃣ Buscar el curso o fallar (404 si no existe)
    $course = Course::findOrFail($courseId);

    // 2️⃣ Obtener usuario (web) o usar usuario dummy para JMeter
    $userId = auth()->id() ?? 1;

    // 3️⃣ Crear la matrícula
    Enrollment::create([
        'user_id'   => $userId,
        'course_id' => $course->id,
    ]);
    

    // 4️⃣ Respuesta
    return response()->json([
        'message' => 'Matrícula realizada con éxito'
    ], 200);
}



    



    
}