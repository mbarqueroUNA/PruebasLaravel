<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\GradeController;

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| ❌ RUTAS INSEGURAS (SIN AUTH)
|--------------------------------------------------------------------------
| Estas rutas son públicas.
| CUALQUIERA puede entrar sin login.
| Esto debe FALLAR en la Prueba de Seguridad - Caso 1.
*/

// ❌ Cualquiera puede ver los cursos
Route::resource('courses', CourseController::class);

// ❌ Cualquiera puede intentar matricular
Route::post('/enroll/{course}', [EnrollmentController::class, 'store'])
    ->name('enroll');

// ❌ Cualquiera puede intentar asignar notas
Route::post('/grade', [GradeController::class, 'store'])
    ->name('grade.store');


//Solo pruebas
Route::post('/demo-sql', [CourseController::class, 'vulnerableSearch']);

    

/*
|--------------------------------------------------------------------------
| Auth
|--------------------------------------------------------------------------
*/



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');
