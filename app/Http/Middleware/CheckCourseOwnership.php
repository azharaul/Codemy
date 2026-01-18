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
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        
        $course = $request->route('course');

        if (!$user->hasActiveCourse($course->id)) {
            return redirect()->route('front.checkout', $course)->with('error', 'Anda harus membeli kursus ini terlebih dahulu.');
        }

        return $next($request);
    }
}
