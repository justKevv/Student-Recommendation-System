<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckFirstLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        // Check if user is authenticated and is a student with first_login = true
        if ($user && $user->role === 'student' && $user->first_login) {
            // Allow access to onboarding routes and logout
            if ($request->routeIs('student.onboarding') ||
                $request->routeIs('student.password.onboarding.store') ||
                $request->routeIs('student.experience') ||
                $request->routeIs('student.experience.onboarding.store') ||
                $request->routeIs('student.experience.destroy') ||
                $request->routeIs('student.project') ||
                $request->routeIs('student.project.onboarding.store') ||
                $request->routeIs('student.project.destroy') ||
                $request->routeIs('logout')) {
                return $next($request);
            }

            // Redirect to onboarding for all other routes
            return redirect()->route('student.onboarding');
        }

        return $next($request);
    }
}
