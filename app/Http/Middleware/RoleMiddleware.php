<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $roles  // This will now be a pipe-separated string
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, string $roles): Response
    {
        // First, check if the user is authenticated.
        if (!Auth::check()) {
            abort(403, 'Unauthorized access.');
        }

        // Get the user's role.
        $userRole = Auth::user()->role;

        // Split the roles string into an array.
        $requiredRoles = explode('|', $roles);

        // Check if the user's role is in the array of required roles.
        if (!in_array($userRole, $requiredRoles)) {
            abort(403, 'Unauthorized access.');
        }

        return $next($request);
    }
}