<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Si non authentifié, rediriger vers home
        if (!Auth::check()) {
            return redirect()->route('home');
        }

        // Si authentifié mais pas admin, rediriger vers dashboard user
        if (!Auth::user()->isAdmin()) {
            return redirect()->route('dashboard');
        }

        // Si admin, laisser passer
        return $next($request);
    }
}
