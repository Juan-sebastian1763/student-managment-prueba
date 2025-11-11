<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssignmentController extends Controller
{
    public function index()
    {
        $students = User::where('role', 'student')
            ->with('courses')
            ->paginate(10);

        $allStudents = User::where('role', 'student')->get();
        $allCourses = Course::all();
        
        $totalStudents = User::where('role', 'student')->count();
        $totalCourses = Course::count();
        $totalAssignments = DB::table('course_user')->count();

        return view('assignments.index', compact(
            'students',
            'allStudents',
            'allCourses',
            'totalStudents',
            'totalCourses',
            'totalAssignments'
        ));
    }

    public function assign(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id',
        ]);

        $user = User::findOrFail($validated['user_id']);
        
        if ($user->courses()->where('course_id', $validated['course_id'])->exists()) {
            return redirect()->back()
                ->with('error', 'El curso ya está asignado a este usuario');
        }

        $user->courses()->attach($validated['course_id']);

        return redirect()->back()
            ->with('success', 'Curso asignado exitosamente');
    }

    public function unassign(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id',
        ]);

        $user = User::findOrFail($validated['user_id']);
        $user->courses()->detach($validated['course_id']);

        return redirect()->back()
            ->with('success', 'Curso desasignado exitosamente');
    }
}