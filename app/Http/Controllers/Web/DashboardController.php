<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        if ($user->isAdmin()) {
            return view('dashboard', [
                'totalUsers' => User::count(),
                'adminCount' => User::where('role', 'admin')->count(),
                'studentCount' => User::where('role', 'student')->count(),
                'totalCourses' => Course::count(),
                'totalHours' => Course::sum('hours'),
                'totalAssignments' => DB::table('course_user')->count(),
                'recentUsers' => User::latest()->take(5)->get(),
                'popularCourses' => Course::withCount('users')
                    ->orderBy('users_count', 'desc')
                    ->take(5)
                    ->get(),
            ]);
        }
        
        return view('dashboard', [
            'myCourses' => $user->courses,
        ]);
    }
}