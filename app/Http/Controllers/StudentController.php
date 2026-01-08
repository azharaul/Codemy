<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // Ambil data courses milik user, urutkan dari yang terbaru (kapan masuk kelas)
        $courses = $user->courses()->with('teacher', 'category')->orderBy('course_students.created_at', 'desc')->get();

        return view('front.my_courses', compact('courses'));
    }
}
