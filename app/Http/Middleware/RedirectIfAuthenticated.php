<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth("admin")->check()) {
            return redirect()->route('dashboard.admin');
        }
        if (Auth("web")->check()) {
            return redirect()->route('dashboard.user');
        }
        return $next($request);
    }
}
