<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('admin.dashboard');
});

