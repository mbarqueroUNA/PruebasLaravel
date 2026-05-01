<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Administrador
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@unigest.test',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);

        // Docentes
        for ($i = 1; $i <= 3; $i++) {
            User::create([
                'name' => 'Docente ' . $i,
                'email' => "docente$i@unigest.test",
                'password' => Hash::make('password'),
                'role' => 'teacher'
            ]);
        }

        // Estudiantes
        for ($i = 1; $i <= 20; $i++) {
            User::create([
                'name' => 'Estudiante ' . $i,
                'email' => "estudiante$i@unigest.test",
                'password' => Hash::make('password'),
                'role' => 'student'
            ]);
        }
    }
}