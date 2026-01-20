<?php

use App\Models\User;
use App\Models\Course;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use \App\Http\Controllers\StudentController;
use App\Http\Controllers\CategoryController;
use \App\Http\Controllers\FrontHomeController;
use App\Http\Controllers\FrontCourseController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\FrontCategoryController;



Route::get('/', [FrontHomeController::class, 'index'])->name('front.index');




Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/my-courses', [StudentController::class, 'index'])->name('front.my_courses');
    Route::get('/checkout/{course}', [TransactionController::class, 'create'])->name('front.checkout');
    Route::post('/checkout/{course}', [TransactionController::class, 'store'])->name('front.checkout.store');
});

Route::middleware(['auth', 'check-course-ownership'])->group(function () {
    Route::get('/learning/{course}', [FrontCourseController::class, 'show'])->name('front.learning');
});

Route::get('/courses', [FrontCourseController::class, 'index'])->name('front.course.index');
Route::get('/category', [FrontCategoryController::class, 'index'])->name('front.category.index');
Route::get('/category/{category}', [FrontCategoryController::class, 'show'])->name('front.category.show');
Route::view('/about', 'front.about')->name('front.about');

Route::middleware(['auth', 'is_admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        $stats = [
            'users' => User::count(),
            'courses' => Course::count(),
            'categories' => Category::count(),
        ];
        return view('admin.dashboard', compact('stats'));
    })->name('dashboard');

    Route::resource('categories', CategoryController::class);

    Route::resource('courses', CourseController::class);

    Route::resource('users', UserController::class);

    Route::resource('lessons', LessonController::class);
});
