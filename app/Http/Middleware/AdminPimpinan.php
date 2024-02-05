<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminPimpinan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $user = auth()->user();

        if ($user && ($user->role === 'admin' || $user->role === 'pimpinan' || $user->role === 'kepala divisi')) {
            return $next($request);
        }

        return abort(403, 'Unauthorized action.');
    }
}
