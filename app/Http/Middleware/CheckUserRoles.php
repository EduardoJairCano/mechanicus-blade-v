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

        foreach ($roles as $role) {
            if (auth()->user()->roleType() === $role) {
                return $next($request);
            }
        }

        return redirect('/');
    }
}
