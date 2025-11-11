<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\CourseAssignmentController;

// Rutas públicas
Route::post('/login', [AuthController::class, 'login']);

// Rutas protegidas
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    // Rutas de administrador
    Route::middleware('admin')->group(function () {
        Route::apiResource('users', UserController::class);
        Route::apiResource('courses', CourseController::class);
        Route::post('/assign-course', [CourseAssignmentController::class, 'assign']);
        Route::post('/unassign-course', [CourseAssignmentController::class, 'unassign']);
    });

    // Rutas de estudiante
    Route::get('/my-courses', function () {
        return response()->json([
            'success' => true,
            'data' => auth()->user()->courses
        ]);
    })->name('my-courses');
    
    Route::get('/users/{user}/courses', [CourseAssignmentController::class, 'getUserCourses']);
});