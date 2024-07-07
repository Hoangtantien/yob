<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Court;
use App\Models\ProjectClass;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->type == 2) {
            
            return view('home-user');
        }
    
        $coaches = User::where('type', 2)->count();
        $students = Student::count();
        $classes = ProjectClass::count();
        $achievements = Achievement::count();
        $court = Court::count();
        return view(
            'home',
            [
                'coaches' => $coaches,
                'students' => $students,
                'classes' => $classes,
                'achievements' => $achievements,
                'court' => $court,
            ]
        );
    }
}
