<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class FrontHomeController extends Controller
{
    public function index()
    {
        $courses = Course::with('teacher', 'category')->latest()->take(3)->get();
        return view('front.index', compact('courses'));
    }
}
