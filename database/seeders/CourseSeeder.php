<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run()
    {
        $courses = [
            ['code' => 'INF-101', 'name' => 'Introducción a la Informática', 'capacity' => 30, 'teacher_id' => 2],
            ['code' => 'INF-102', 'name' => 'Programación I', 'capacity' => 25, 'teacher_id' => 2],
            ['code' => 'INF-201', 'name' => 'Programación II', 'capacity' => 25, 'teacher_id' => 3],
            ['code' => 'INF-202', 'name' => 'Bases de Datos', 'capacity' => 20, 'teacher_id' => 3],
            ['code' => 'INF-301', 'name' => 'Ingeniería de Software', 'capacity' => 20, 'teacher_id' => 4],
            ['code' => 'INF-302', 'name' => 'Calidad de Software', 'capacity' => 15, 'teacher_id' => 4],
            ['code' => 'INF-401', 'name' => 'Redes', 'capacity' => 20, 'teacher_id' => 2],
            ['code' => 'INF-402', 'name' => 'Seguridad Informática', 'capacity' => 15, 'teacher_id' => 3],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}