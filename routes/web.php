<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController; 
use App\Http\Controllers\Web\LoginController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');


// 1. Muestra el formulario de inicio de sesión (GET /login)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// 2. Procesa el intento de inicio de sesión (POST /login)
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

// 3. Maneja el cierre de sesión (POST /logout)
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('home'); 
})->name('home');

Route::middleware(['auth', 'role:admin'])->group(function () {
    // Rutas para usuarios
    Route::resource('users', UserController::class);

    // Rutas para cursos
    Route::resource('courses', CourseController::class);

    // Rutas para asignaciones
    Route::resource('assignments', AssignmentController::class);

    // Rutas para asignación de cursos a estudiantes
    Route::get('assignments/create', [AssignmentController::class, 'create'])->name('assignments.create');
    Route::post('assignments', [AssignmentController::class, 'store'])->name('assignments.store');
});