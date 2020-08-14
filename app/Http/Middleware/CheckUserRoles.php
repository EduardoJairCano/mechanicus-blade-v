<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Get n types of roles for validation
        $roles = array_slice(func_get_args(), 2);

        if (auth()->user()->hasRole($roles)) {
            return $next($request);
        }

        return redirect('/');
    }
}
