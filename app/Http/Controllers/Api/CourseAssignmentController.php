<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseAssignmentController extends Controller
{
    public function assign(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id',
        ]);

        $user = User::findOrFail($validated['user_id']);
        $course = Course::findOrFail($validated['course_id']);

        if ($user->courses()->where('course_id', $course->id)->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'El curso ya está asignado a este usuario'
            ], 400);
        }

        $user->courses()->attach($course->id);

        return response()->json([
            'success' => true,
            'message' => 'Curso asignado exitosamente',
            'data' => $user->load('courses')
        ], 200);
    }

    public function unassign(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id',
        ]);

        $user = User::findOrFail($validated['user_id']);
        $user->courses()->detach($validated['course_id']);

        return response()->json([
            'success' => true,
            'message' => 'Curso desasignado exitosamente'
        ], 200);
    }

    public function getUserCourses($userId)
    {
        $user = User::with('courses')->findOrFail($userId);

        return response()->json([
            'success' => true,
            'data' => $user->courses
        ], 200);
    }
}