<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        foreach ($guards as $guard) {
            $default_url = isset(RouteServiceProvider::GUARD_DEFAULT_PAGE[$guard]) ? 
            RouteServiceProvider::GUARD_DEFAULT_PAGE[$guard] : 
            RouteServiceProvider::HOME;
            
            if (Auth::guard($guard)->check()) {
                return redirect($default_url);
            }
        }

        return $next($request);
    }
}
