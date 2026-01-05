<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    $courses = \App\Models\Course::with('teacher', 'category')->latest()->take(3)->get();
    return view('front.index', compact('courses'));
})->name('front.index');

Route::get('/pricing', function () {
    return view('front.pricing');
})->name('front.pricing');


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::middleware(['auth', 'is_admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        $stats = [
            'users' => \App\Models\User::count(),
            'courses' => \App\Models\Course::count(),
            'categories' => \App\Models\Category::count(),
        ];
        return view('admin.dashboard', compact('stats'));
    })->name('dashboard');

    Route::resource('categories', CategoryController::class);

    Route::resource('courses', CourseController::class);

    Route::resource('users', UserController::class);

    Route::resource('lessons', LessonController::class);
});
