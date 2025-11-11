<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model; 

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {
        
        Model::unguard(); 
        
        // --- 1. Usuarios ---

        // Usuario admin
        $admin = User::create([
            'name' => 'Administrador',
            'email' => 'admin@test.com',
            'phone' => '3001234567',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Usuario estudiante
        $student = User::create([
            'name' => 'Juan Pérez',
            'email' => 'student@test.com',
            'phone' => '3007654321',
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);
        
        // Otro estudiante para pruebas
        $student2 = User::create([
            'name' => 'Ana López',
            'email' => 'ana@test.com',
            'phone' => '3009876543',
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        // --- 2. Cursos ---
        
        $course1 = Course::create([
            'name' => 'Laravel Avanzado',
            'hours' => 40,
        ]);

        $course2 = Course::create([
            'name' => 'Vue.js Fundamentals',
            'hours' => 30,
        ]);

        $course3 = Course::create([
            'name' => 'PHP Moderno',
            'hours' => 25,
        ]);

        // --- 3. Relaciones (Tabla Pivote course_user) ---

        // Asignar cursos al estudiante Juan Pérez
        $student->courses()->attach([$course1->id, $course2->id]);
        
        // Asignar cursos al estudiante Ana López
        $student2->courses()->attach([$course2->id, $course3->id]);
        
        // Vuelve a activar la protección de asignación masiva de Eloquent.
        Model::reguard(); 
    }
}