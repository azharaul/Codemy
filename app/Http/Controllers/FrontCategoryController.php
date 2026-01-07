<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class FrontCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('courses')->get();
        return view('front.category.index', compact('categories'));
    }

    public function show(Category $category)
    {
        $courses = $category->courses()->latest()->get();
        return view('front.category.show', compact('category', 'courses'));
    }
}
