<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Course;

class DashboardController extends Controller
{
    public function index()
    {
        // Si no hay usuario autenticado, redirigir a login o mostrar un mensaje
        if (!Auth::check()) {
            return view('dashboard'); // La vista Blade tiene @auth para manejar esto
        }

        $user = Auth::user();
        
        // 1. Datos del Administrador
        if ($user->role === 'admin') {
            
            $totalUsers = User::count();
            $adminCount = User::where('role', 'admin')->count();
            $studentCount = User::where('role', 'student')->count();

            $totalCourses = Course::count();
            // Sumar las horas de todos los cursos
            $totalHours = Course::sum('hours'); 
            
            // Contar el número total de registros 
            $totalAssignments = \DB::table('course_user')->count();

            // Últimos 5 usuarios registrados
            $recentUsers = User::latest()->take(5)->get();

            $popularCourses = Course::withCount('users')
                ->orderByDesc('users_count')
                ->take(5)
                ->get();

            return view('dashboard', [
                'totalUsers' => $totalUsers,
                'adminCount' => $adminCount,
                'studentCount' => $studentCount,
                'totalCourses' => $totalCourses,
                'totalHours' => $totalHours,
                'totalAssignments' => $totalAssignments,
                'recentUsers' => $recentUsers,
                'popularCourses' => $popularCourses,
            ]);

        } else { 
            
            $myCourses = $user->courses;

            return view('dashboard', [
                'totalUsers' => $totalUsers ?? null,
                'adminCount' => $adminCount ?? null,
                'studentCount' => $studentCount ?? null,
                'totalCourses' => $totalCourses ?? null,
                'totalHours' => $totalHours ?? null,
                'totalAssignments' => $totalAssignments ?? null,
                'recentUsers' => $recentUsers ?? null,
                'popularCourses' => $popularCourses ?? null,
                'myCourses' => $myCourses,
            ]);
        }
    }
}