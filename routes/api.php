<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnrollmentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Estas rutas:
| - NO usan CSRF
| - Son ideales para pruebas de rendimiento (JMeter)
*/

Route::post('/enroll/{course}', [EnrollmentController::class, 'store']);