<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $query = Course::query();

        if ($request->has('search')) {
            $query->where('name', 'like', "%{$request->search}%");
        }

        $courses = $query->paginate(10);

        return response()->json([
            'success' => true,
            'data' => $courses
        ], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'hours' => 'required|integer|min:1',
        ]);

        $course = Course::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Curso creado exitosamente',
            'data' => $course
        ], 201);
    }

    public function show(Course $course)
    {
        return response()->json([
            'success' => true,
            'data' => $course
        ], 200);
    }

    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'hours' => 'sometimes|integer|min:1',
        ]);

        $course->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Curso actualizado exitosamente',
            'data' => $course
        ], 200);
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return response()->json([
            'success' => true,
            'message' => 'Curso eliminado exitosamente'
        ], 200);
    }
}