<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function myCourses()
    {
        $courses = auth()->user()->courses;
        
        return view('student.my-courses', compact('courses'));
    }
}