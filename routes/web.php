<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\FrontCourseController;



Route::get('/', [\App\Http\Controllers\FrontHomeController::class, 'index'])->name('front.index');

Route::get('/pricing', function () {
    return view('front.pricing');
})->name('front.pricing');


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/my-courses', [\App\Http\Controllers\StudentController::class, 'index'])->name('front.my_courses');
    Route::get('/checkout/{course}', [TransactionController::class, 'create'])
        ->name('front.checkout');
    Route::post('/checkout/{course}', [TransactionController::class, 'store'])
        ->name('front.checkout.store');
});

Route::middleware(['auth', 'check-course-ownership'])->group(function () {
    Route::get('/learning/{course}', [FrontCourseController::class, 'show'])->name('front.learning');
});

Route::get('/courses', [FrontCourseController::class, 'index'])->name('front.course.index');
Route::get('/category', [App\Http\Controllers\FrontCategoryController::class, 'index'])->name('front.category.index');
Route::get('/category/{category}', [App\Http\Controllers\FrontCategoryController::class, 'show'])->name('front.category.show');
Route::view('/about', 'front.about')->name('front.about');

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
