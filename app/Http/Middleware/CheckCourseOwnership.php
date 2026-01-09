<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckCourseOwnership
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Cek Login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        
        // 2. Ambil parameter kursus dari Route
        // Route kita: /learning/{course} -> jadi parameternya 'course' (ID)
        $course = $request->route('course');

        // 3. Cek apakah user terdaftar di kursus ini?
        if (!$course->students()->where('user_id', $user->id)->exists()) {
            return redirect()->route('front.checkout', $course)->with('error', 'Anda harus membeli kursus ini terlebih dahulu.');
        }

        return $next($request);
    }
}
