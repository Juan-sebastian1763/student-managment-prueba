<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;

class AssignmentController extends Controller
{
    public function index()
    {
        
        return redirect()->route('assignments.create');
    }

    public function create()
    {
        $students = User::all();
        $courses = Course::all();
        return view('admin.assignments.create', compact('students', 'courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:users,id',
            'course_ids' => 'required|array',
            'course_ids.*' => 'exists:courses,id',
        ]);

        $student = User::findOrFail($request->student_id);
        $student->courses()->syncWithoutDetaching($request->course_ids);

        return redirect()->route('assignments.create')->with('success', 'Cursos asignados exitosamente.');
    }

    public function edit($id)
    {
        
        abort(404);
    }

    public function update(Request $request, $id)
    {
        
        abort(404);
    }

    public function destroy($id)
    {
        abort(404);
    }
}